<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_Team extends FW_Extension {

	private $post_type = 'fw-team';
	private $slug = 'member';
	private $taxonomy_slug = 'team';
	private $taxonomy_name = 'fw-team-category';

	/**
	 * @internal
	 */
	public function _init() {
		$this->define_slugs();

		add_action( 'init', array( $this, '_action_register_post_type' ) );
		add_action( 'init', array( $this, '_action_register_taxonomy' ) );

		if ( is_admin() ) {
			$this->save_permalink_structure();
			$this->add_admin_actions();
			$this->add_admin_filters();
		}
	}

	private function define_slugs() {
		$this->slug = apply_filters(
			'fw_ext_team_post_slug',
			$this->get_db_data( 'permalinks/post', $this->slug )
		);

		$this->taxonomy_slug = apply_filters(
			'fw_ext_team_taxonomy_slug',
			$this->get_db_data( 'permalinks/taxonomy', $this->taxonomy_slug )
		);
	}

	private function add_admin_actions() {
		add_action( 'admin_init', array( $this, '_action_add_permalink_in_settings' ) );
		add_action( 'admin_menu', array( $this, '_action_admin_rename_team' ) );
		add_action( 'restrict_manage_posts', array( $this, '_action_admin_add_team_edit_page_filter' ) );
		// listing screen
		add_action( 'manage_' . $this->post_type . '_posts_custom_column',
			array(
				$this,
				'_action_admin_manage_custom_column'
			),
			10,
			2 );

		// add / edit screen
		add_action( 'do_meta_boxes', array( $this, '_action_admin_featured_image_label' ) );

		add_action( 'admin_enqueue_scripts', array( $this, '_action_admin_add_static' ) );

		add_action( 'admin_head', array( $this, '_action_admin_initial_nav_menu_meta_boxes' ), 999 );
	}

	private function save_permalink_structure() {

		if ( ! isset( $_POST['permalink_structure'] ) && ! isset( $_POST['category_base'] ) ) {
			return;
		}

		$post = FW_Request::POST( 'fw_ext_team_member_slug',
			apply_filters( 'fw_ext_team_post_slug', $this->slug )
		);

		$taxonomy = FW_Request::POST( 'fw_ext_team_team_slug',
			apply_filters( 'fw_ext_team_taxonomy_slug', $this->taxonomy_slug )
		);


		$this->set_db_data( 'permalinks/post', $post );
		$this->set_db_data( 'permalinks/taxonomy', $taxonomy );
	}

	/**
	 * @internal
	 **/
	public function _action_add_permalink_in_settings() {
		add_settings_field(
			'fw_ext_team_member_slug',
			esc_html__( 'Team member base', 'mwt' ),
			array( $this, '_member_slug_input' ),
			'permalink',
			'optional'
		);

		add_settings_field(
			'fw_ext_team_team_slug',
			esc_html__( 'Team category base', 'mwt' ),
			array( $this, '_team_slug_input' ),
			'permalink',
			'optional'
		);
	}

	/**
	 * @internal
	 */
	public function _member_slug_input() {
		?>
		<input type="text" name="fw_ext_team_member_slug" value="<?php echo esc_attr( $this->slug ); ?>">
		<code>/my-member</code>
		<?php
	}

	/**
	 * @internal
	 */
	public function _team_slug_input() {
		?>
		<input type="text" name="fw_ext_team_team_slug" value="<?php echo esc_attr( $this->taxonomy_slug ); ?>">
		<code>/my-team</code>
		<?php
	}

	public function add_admin_filters() {
		add_filter( 'parse_query', array( $this, '_filter_admin_filter_team_by_team_category' ), 10, 2 );
		add_filter( 'months_dropdown_results', array( $this, '_filter_admin_remove_select_by_date_filter' ) );
		add_filter( 'manage_edit-' . $this->post_type . '_columns',
			array(
				$this,
				'_filter_admin_manage_edit_columns'
			),
			10,
			1 );

		add_filter( 'fw_post_options', array( $this, '_filter_admin_add_post_options' ), 10, 2 );
		add_filter( 'fw_taxonomy_options', array( $this, '_filter_admin_add_taxonomy_options' ), 10, 2 );
	}

	/**
	 * @internal
	 */
	public function _action_admin_add_static() {
		$team_listing_screen  = array(
			'only' => array(
				array(
					'post_type' => $this->post_type,
					'base'      => array( 'edit' )
				)
			)
		);
		$team_add_edit_screen = array(
			'only' => array(
				array(
					'post_type' => $this->post_type,
					'base'      => 'post'
				)
			)
		);

		if ( fw_current_screen_match( $team_listing_screen ) ) {
			wp_enqueue_style(
				'fw-extension-' . $this->get_name() . '-listing',
				$this->get_declared_URI( '/static/css/admin-listing.css' ),
				array(),
				fw()->manifest->get_version()
			);
		}

		if ( fw_current_screen_match( $team_add_edit_screen ) ) {
			wp_enqueue_style(
				'fw-extension-' . $this->get_name() . '-add-edit',
				$this->get_declared_URI( '/static/css/admin-add-edit.css' ),
				array(),
				fw()->manifest->get_version()
			);
			wp_enqueue_script(
				'fw-extension-' . $this->get_name() . '-add-edit',
				$this->get_declared_URI( '/static/js/admin-add-edit.js' ),
				array( 'jquery' ),
				fw()->manifest->get_version(),
				true
			);
		}
	}

	/**
	 * @internal
	 */
	public function _action_register_post_type() {

		$post_names = apply_filters( 'fw_ext_team_post_type_name',
			array(
				'singular' => esc_html__( 'Team member', 'mwt' ),
				'plural'   => esc_html__( 'Team members', 'mwt' )
			) );

		register_post_type( $this->post_type,
			array(
				'labels'             => array(
					'name'               => $post_names['plural'], //esc_html__( 'Team', 'mwt' ),
					'singular_name'      => $post_names['singular'], //esc_html__( 'Team member', 'mwt' ),
					'add_new'            => esc_html__( 'Add New', 'mwt' ),
					'add_new_item'       => sprintf( esc_html__( 'Add New %s', 'mwt' ), $post_names['singular'] ),
					'edit'               => esc_html__( 'Edit', 'mwt' ),
					'edit_item'          => sprintf( esc_html__( 'Edit %s', 'mwt' ), $post_names['singular'] ),
					'new_item'           => sprintf( esc_html__( 'New %s', 'mwt' ), $post_names['singular'] ),
					'all_items'          => sprintf( esc_html__( 'All %s', 'mwt' ), $post_names['plural'] ),
					'view'               => sprintf( esc_html__( 'View %s', 'mwt' ), $post_names['singular'] ),
					'view_item'          => sprintf( esc_html__( 'View %s', 'mwt' ), $post_names['singular'] ),
					'search_items'       => sprintf( esc_html__( 'Search %s', 'mwt' ), $post_names['plural'] ),
					'not_found'          => sprintf( esc_html__( 'No %s Found', 'mwt' ), $post_names['plural'] ),
					'not_found_in_trash' => sprintf( esc_html__( 'No %s Found In Trash', 'mwt' ), $post_names['plural'] ),
					'parent_item_colon'  => '' /* text for parent types */
				),
				'description'        => esc_html__( 'Create a team item', 'mwt' ),
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				/* queries can be performed on the front end */
				'has_archive'        => true,
				'rewrite'            => array(
					'slug' => $this->slug
				),
				'menu_position'      => 4,
				'show_in_nav_menus'  => true,
				'menu_icon'          => 'dashicons-businessman',
				'hierarchical'       => false,
				'query_var'          => true,
				/* Sets the query_var key for this post type. Default: true - set to $post_type */
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
					'excerpt',
				),
				'capabilities'       => array(
					'edit_post'              => 'edit_pages',
					'read_post'              => 'edit_pages',
					'delete_post'            => 'edit_pages',
					'edit_posts'             => 'edit_pages',
					'edit_others_posts'      => 'edit_pages',
					'publish_posts'          => 'edit_pages',
					'read_private_posts'     => 'edit_pages',
					'read'                   => 'edit_pages',
					'delete_posts'           => 'edit_pages',
					'delete_private_posts'   => 'edit_pages',
					'delete_published_posts' => 'edit_pages',
					'delete_others_posts'    => 'edit_pages',
					'edit_private_posts'     => 'edit_pages',
					'edit_published_posts'   => 'edit_pages',
				),
			) );

	}

	/**
	 * @internal
	 */
	public function _action_register_taxonomy() {

		$category_names = apply_filters( 'fw_ext_team_category_name',
			array(
				'singular' => esc_html__( 'Category', 'mwt' ),
				'plural'   => esc_html__( 'Categories', 'mwt' )
			) );

		$labels = array(
			'name'              => sprintf( _x( 'Team %s', 'taxonomy general name', 'mwt' ),
				$category_names['plural'] ),
			'singular_name'     => sprintf( _x( 'Team %s', 'taxonomy singular name', 'mwt' ),
				$category_names['singular'] ),
			'search_items'      => sprintf( esc_html__( 'Search %s', 'mwt' ), $category_names['plural'] ),
			'all_items'         => sprintf( esc_html__( 'All %s', 'mwt' ), $category_names['plural'] ),
			'parent_item'       => sprintf( esc_html__( 'Parent %s', 'mwt' ), $category_names['singular'] ),
			'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'mwt' ), $category_names['singular'] ),
			'edit_item'         => sprintf( esc_html__( 'Edit %s', 'mwt' ), $category_names['singular'] ),
			'update_item'       => sprintf( esc_html__( 'Update %s', 'mwt' ), $category_names['singular'] ),
			'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'mwt' ), $category_names['singular'] ),
			'new_item_name'     => sprintf( esc_html__( 'New %s Name', 'mwt' ), $category_names['singular'] ),
			'menu_name'         => sprintf( esc_html__( '%s', 'mwt' ), $category_names['plural'] )
		);
		$args   = array(
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'rewrite'           => array(
				'slug' => $this->taxonomy_slug
			),
		);

		register_taxonomy( $this->taxonomy_name, esc_attr( $this->post_type ), $args );
	}

	/**
	 * @internal
	 *
	 * @param array $options
	 * @param string $post_type
	 *
	 * @return array
	 */
	public function _filter_admin_add_post_options( $options, $post_type ) {
		//get social icon shortcode options
		$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
		$member_social_icons  = array();

		if ( ! empty( $shortcodes_extension ) ) {

			$member_list_icons = $shortcodes_extension->get_shortcode( 'icons_list' )->get_options();
			$member_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
			$member_skills = $shortcodes_extension->get_shortcode( 'progress_bar' )->get_options();
			$contact_form = $shortcodes_extension->get_shortcode( 'contact_form' )->get_options();

			if ( $post_type === $this->post_type ) {

				$options[] = array(
					'member_meta_tab' => array(
						'title'   => esc_html__( 'Member Meta', 'mwt' ),
						'type'    => 'box',
						'options' => array(
							'tab_position' => array(
								'title'   => esc_html__( 'Member position', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									'position' => array(
										'title'   => esc_html__( 'Member position name', 'mwt' ),
										'type'    => 'text',
									)
								),
							),
							'tab_social_icons' => array(
								'title'   => esc_html__( 'Social links', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									'hide_social' => array(
										'type'  => 'switch',
										'label' => esc_html__( 'Hide Social links', 'mwt' ),
										'desc'  => esc_html__( 'Hide social links from a single team member', 'mwt' ),
										'value' => true,
									),
									$member_social_icons,
								),
							),
							'tab_contacts' => array(
								'title'   => esc_html__( 'Member Contacts', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									$member_list_icons,
								),
							),
							'tab_bio' => array(
								'title'   => esc_html__( 'Member Bio Tab', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									'bio' => array(
										'type'  => 'wp-editor',
										'value' => '',
										'label' => esc_html__('Member Bio', 'mwt'),
										'wpautop' => true,
										'editor_type' => false, // tinymce, html
									)
								),
							),
							'tab_skills' => array(
								'title'   => esc_html__( 'Skills Tab', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									'skills' => array(
										'type'            => 'addable-box',
										'value'           => '',
										'label'           => esc_html__( 'Skills progress bars', 'mwt' ),
										'desc'            => esc_html__( 'Display skills as a progress bar', 'mwt' ),
										'template'        => '{{=title}}',
										'box-options'     => array(
											$member_skills,
										),
									),
								),
							),
							'tab_form' => array(
								'title'   => esc_html__( 'Contact Form Tab', 'mwt' ),
								'type'    => 'tab',
								'options' => array(
									$contact_form,
								),
							),
						),
					),
					'additional_content_box' => array(
						'title'   => esc_html__( 'Below tabs content', 'mwt' ),
						'type'    => 'box',
						'options'    => array(
							'additional_content' => array(
								'type'        => 'wp-editor',
								'value'       => '',
								'label'       => esc_html__( 'Text below member meta tabs', 'mwt' ),
								'wpautop'     => true,
								'size'        => 'large',
								'editor_type' => false, // tinymce, html
							),
						),
					),
				);
			}
		}

		return $options;
	}

	/**
	 * @internal
	 *
	 * @param array $options
	 * @param string $post_type
	 *
	 * @return array
	 */
	public function _filter_admin_add_taxonomy_options( $options, $taxonomy_name ) {
		if ( $taxonomy_name === $this->taxonomy_name ) {
            // put here options for taxonomy
		}
		return $options;
	}

	/**
	 * internal
	 */
	public function _action_admin_rename_team() {
		global $menu;

		foreach ( $menu as $key => $menu_item ) {
			if ( $menu_item[2] == 'edit.php?post_type=' . $this->post_type ) {
				$menu[ $key ][0] = esc_html__( 'Team', 'mwt' );
			}
		}
	}

	/**
	 * Change the title of Featured Image Meta box
	 * @internal
	 */
	public function _action_admin_featured_image_label() {
		remove_meta_box( 'postimagediv', $this->post_type, 'side' );
		add_meta_box(
			'postimagediv',
			esc_html__( 'Team Member Photo', 'mwt' ),
			'post_thumbnail_meta_box',
			$this->post_type,
			'side'
		);
	}

	/**
	 * @internal
	 *
	 * @param string $column_name
	 * @param int $id
	 */
	public function _action_admin_manage_custom_column( $column_name, $id ) {

		switch ( $column_name ) {
			case 'image':
				if ( get_the_post_thumbnail( intval( $id ) ) ) {
					$value = '<a href="' . get_edit_post_link( $id,
							true ) . '" title="' . esc_attr( esc_html__( 'Edit this item', 'mwt' ) ) . '">' .
					         wp_get_attachment_image( get_post_thumbnail_id( intval( $id ) ),
						         array( 150, 100 ),
						         true ) .
					         '</a>';
				} else {
					$value = '<img src="' . $this->get_declared_URI( '/static/images/no-image.png' ) . '"/>';
				}
				echo wp_kses_post( $value );
				break;

			default:
				break;
		}
	}

	/**
	 * @internal
	 */
	public function _action_admin_initial_nav_menu_meta_boxes() {
		$screen = array(
			'only' => array(
				'base' => 'nav-menus'
			)
		);
		if ( ! fw_current_screen_match( $screen ) ) {
			return;
		}

		if ( get_user_option( 'fw-metaboxhidden_nav-menus' ) !== false ) {
			return;
		}

		$user              = wp_get_current_user();
		$hidden_meta_boxes = get_user_meta( $user->ID, 'metaboxhidden_nav-menus' );

		if ( $key = array_search( 'add-' . $this->taxonomy_name, $hidden_meta_boxes[0] ) ) {
			unset( $hidden_meta_boxes[0][ $key ] );
		}

		update_user_option( $user->ID, 'metaboxhidden_nav-menus', $hidden_meta_boxes[0], true );
		update_user_option( $user->ID, 'fw-metaboxhidden_nav-menus', 'updated', true );
	}

	/**
	 * @internal
	 */
	public function _action_admin_add_team_edit_page_filter() {
		$screen = fw_current_screen_match( array(
			'only' => array(
				'base'      => 'edit',
				'id'        => 'edit-' . $this->post_type,
				'post_type' => $this->post_type,
			)
		) );

		if ( ! $screen ) {
			return;
		}

		$terms = get_terms( $this->taxonomy_name );

		if ( empty( $terms ) || is_wp_error( $terms ) ) {
			echo '<select name="' . $this->get_name() . '-filter-by-team-category"><option value="0">' . esc_html__( 'View all categories',
					'mwt' ) . '</option></select>';

			return;
		}

		$get = FW_Request::GET( $this->get_name() . '-filter-by-team-category' );
		$id  = ( ! empty( $get ) ) ? (int) $get : 0;

		$dropdown_options = array(
			'selected'        => $id,
			'name'            => $this->get_name() . '-filter-by-team-category">',
			'taxonomy'        => $this->taxonomy_name,
			'show_option_all' => esc_html__( 'View all categories', 'mwt' ),
			'hide_empty'      => true,
			'hierarchical'    => 1,
			'show_count'      => 0,
			'orderby'         => 'name',
		);

		wp_dropdown_categories( $dropdown_options );
	}

	/**
	 * @internal
	 *
	 * @param array $columns
	 *
	 * @return array
	 */
	public function _filter_admin_manage_edit_columns( $columns ) {
		$new_columns          = array();
		$new_columns['cb']    = $columns['cb']; // checkboxes for all team page
		$new_columns['image'] = esc_html__( 'Feat. Image', 'mwt' );

		return array_merge( $new_columns, $columns );
	}

	/**
	 * @internal
	 *
	 * @param WP_Query $query
	 *
	 * @return WP_Query
	 */
	public function _filter_admin_filter_team_by_team_category( $query ) {
		$screen = fw_current_screen_match( array(
			'only' => array(
				'base'      => 'edit',
				'id'        => 'edit-' . $this->post_type,
				'post_type' => $this->post_type,
			)
		) );

		if ( ! $screen || ! $query->is_main_query() ) {
			return $query;
		}

		$filter_value = FW_Request::GET( $this->get_name() . '-filter-by-team-category' );

		if ( empty( $filter_value ) ) {
			return $query;
		}

		$filter_value = (int) $filter_value;

		$query->set( 'tax_query',
			array(
				array(
					'taxonomy' => $this->taxonomy_name,
					'field'    => 'id',
					'terms'    => $filter_value,
				)
			) );

		return $query;
	}

	/**
	 * @internal
	 *
	 * @param array $filters
	 *
	 * @return array
	 */
	public function _filter_admin_remove_select_by_date_filter( $filters ) {
		$screen = array(
			'only' => array(
				'base' => 'edit',
				'id'   => 'edit-' . $this->post_type,
			)
		);

		if ( ! fw_current_screen_match( $screen ) ) {
			return $filters;
		}

		return array();
	}

	/**
	 * @internal
	 *
	 * @return string
	 */
	public function _get_link() {
		return self_admin_url( 'edit.php?post_type=' . $this->post_type );
	}

	public function get_settings() {

		$response = array(
			'post_type'     => $this->post_type,
			'slug'          => $this->slug,
			'taxonomy_slug' => $this->taxonomy_slug,
			'taxonomy_name' => $this->taxonomy_name
		);

		return $response;
	}

	public function get_image_sizes() {
		return $this->get_config( 'image_sizes' );
	}

	public function get_post_type_name() {
		return $this->post_type;
	}

	public function get_taxonomy_name() {
		return $this->taxonomy_name;
	}
}
