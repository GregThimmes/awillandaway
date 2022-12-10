<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Theme Google font.
 *
 * @return string
 */

if ( ! function_exists( 'psycheco_google_font_url' ) ) :
	function psycheco_google_font_url() {
        $options = new Psycheco_Options();
		// Default Theme Fonts
		$fonts = $options->default_fonts_array;


		//checking fonts from customizer if Unyson exists
		if ( function_exists( 'fw_get_google_fonts' ) ) {
			//grabbing all available fonts
			$google_fonts = fw_get_google_fonts();

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			//including fonts from theme in main fonts array
			if ( $font_body_enabled ) {
				$fonts[ $font_body['family'] ] = $font_body;
				// adding font variations to main fonts array to create link to Google Fonts below
				if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
					$fonts[ $font_body['family'] ]['variants'] = $google_fonts[ $font_body['family'] ]['variants'];
				}
			}
			if ( $font_headings_enabled ) {
				$fonts[ $font_headings['family'] ] = $font_headings;
				if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
					$fonts[ $font_headings['family'] ]['variants'] = $google_fonts[ $font_headings['family'] ]['variants'];
				}
			}
		}

		$fonts_url = '//fonts.googleapis.com/css?family=';
		$subsets   = array();
		foreach ( $fonts as $font => $styles ) {
			if ( ! empty ( $styles['variants'] ) ) {

				$fonts_url .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
				$subsets[] = $styles['subset'];
			}

		}
		$fonts_url = substr( $fonts_url, 0, - 1 );
		$fonts_url .= '&subset=' . implode( ',', array_unique( $subsets ) );

		return urldecode( $fonts_url );
	}
endif;

if ( ! function_exists( 'psycheco_add_font_styles_in_head' ) ) :
	function psycheco_add_font_styles_in_head() {
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {

			$font_body_options = fw_get_db_customizer_option( 'body_font_picker_switch' );
			$font_body_enabled = (boolean) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option( 'h_font_picker_switch' );
			$font_headings_enabled = (boolean) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			$output = "";
			if ( $font_body_enabled ) {
				$body_variation = $font_body['variation'] == 'regular' ? 400 : $font_body['variation'];
				$output .= "body, cite, .body-font, .accordion-layout2 .card-header a,
				 .page_title.title2 .breadcrumb, .progress2 .progress-percent {
								font-family : \"{$font_body['family']}\", sans-serif !important;
								font-weight: {$body_variation};
								font-size: {$font_body['size']}px;
								line-height: {$font_body['line-height']}px;
								letter-spacing: {$font_body['letter-spacing']}px;
							}";
			}
			if ( $font_headings_enabled ) {
				$heading_variation = $font_headings['variation'] == 'regular' ? 400 : $font_headings['variation'];

				$output .= "h1, h2, h3, h4, h5, h6, blockquote, .sf-menu > li > a, .nav-link, type='submit'], button,
				            .btn, .widget_nav_menu li a, .progress-title, .progress-bar span, .breadcrumb, .pricing-plan .plan-features,
			                .post-adds, .alert, .heading-font {
								font-family : \"{$font_headings['family']}\", sans-serif !important;
								letter-spacing: {$font_headings['letter-spacing']}px;
								font-weight: {$heading_variation};

							}";
			}

			return ( wp_kses( $output, false ) );

		} else {
			return false;
		}
	}
endif; //psycheco_add_font_styles_in_head()

if ( ! function_exists( 'psycheco_custom' ) ) :
	function psycheco_custom() {
		if ( function_exists( 'fw_get_db_customizer_option' ) ) {
			$option = fw_get_db_customizer_option( 'hide_term_title' );
			$output = '/* Customizer options */ ';
			if ( fw_get_db_customizer_option( 'hide_term_title' ) ) {
				$output .= ' span.taxonomy-name-title { display: none; }';
			}
			return ( wp_kses( $output, false ) );
		}
		else {
			return false;
		}
	}
endif; // psycheco_custom()


if ( ! function_exists( 'psycheco_is_active_widgets_in_main_sidebar_exists' ) ) :
	/**
	 * Define is sidebar that must be shown has active widgets
	 */
	function psycheco_is_active_widgets_in_main_sidebar_exists() {
		//default value
		$return = true;

		//if Unyson exists
		if ( function_exists( 'fw_ext_sidebars_show' ) ) {
			//if custom sidebar is set for current page
			if ( fw_ext_sidebars_show( 'blue' ) ) {
				if ( fw_ext_sidebars_show( 'blue' ) !== '1' ) {
					$return = true;
				} else {
					$return = false;
				}
			//if no custom sidebar but Unyson exists
			} else {
				//if no default sidebar
				if ( ! is_active_sidebar( 'sidebar-main' ) ) {
					$return = false;
				} else {
					$return = true;
				}
			}
		//no Unyson and empty sidebar
		} else {
			if ( ! is_active_sidebar( 'sidebar-main' ) ) {
				$return = false;
			} else {
				$return = true;
			}
		}
		return $return;
	}
endif; //psycheco_is_active_widgets_in_main_sidebar_exists

if ( ! function_exists( 'psycheco_get_columns_classes' ) ) :
	/**
	 * Define a sidebar position for manage main column CSS class, sidebar CSS class and visibility of sidebar.
	 * return array
	 */
	function psycheco_get_columns_classes( $full_width = false ) {
		//additional classes to columns
		$main_column_class = ' column-main';
		$sidebar_class = ' column-sidebar';

		//default values
		$column_classes = array(
			'main_column_class' => 'col-12 col-xs-12 col-lg-7 col-xl-8' . $main_column_class,
			'sidebar_class'     => 'col-12 col-xs-12 col-lg-5 col-xl-4' . $sidebar_class,
			'position'          => 'right'
		);
		if ( is_page() ) {
			$column_classes['main_column_class'] = "col-12"  . $main_column_class;
			$column_classes['sidebar_class']     = false;
			$column_classes['position']          = 'full';

			//if no Unyson installed - return - no sidebar on pages by default
			if ( ! function_exists( 'fw_ext_sidebars_show' ) ) {
				return $column_classes;
			}
		}

		//check for unyson
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {

			//full width
			if ( in_array( fw_ext_sidebars_get_current_position(), array( 'full' ) ) ) {

				$column_classes['main_column_class'] = "col-12"  . $main_column_class;
				$column_classes['sidebar_class']     = false;
                $column_classes['position']          = 'full';
				//making 10 columns width on single post if no sidebar
				if ( is_single() ) {
					$column_classes['main_column_class'] = "col-12 col-xs-12 col-xl-10 offset-xl-1" . $main_column_class;
					$column_classes['sidebar_class']     = false;
                    $column_classes['position']          = 'full';
				}

				//left sidebar
			} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'left' ) ) ) {

				$column_classes['main_column_class'] = "col-12 col-xs-12 col-lg-7 col-xl-8 order-lg-2" . $main_column_class;
				$column_classes['sidebar_class']     = "col-12 col-xs-12 col-lg-5 col-xl-4 order-lg-1" . $sidebar_class;
                $column_classes['position']          = 'left';

			} elseif ( in_array( fw_ext_sidebars_get_current_position(), array( 'right' ) ) ) {

				$column_classes['main_column_class'] = "col-12 col-xs-12 col-lg-7 col-xl-8" . $main_column_class;
				$column_classes['sidebar_class']     = "col-12 col-xs-12 col-lg-5 col-xl-4" . $sidebar_class;
                $column_classes['position']          = 'right';

			}
			//no catching right sidebar. Right sidebar is default
			else {

				//default - right sidebar
				$column_classes['main_column_class'] = "col-12 col-xs-12 col-lg-7 col-xl-8" . $main_column_class;
				$column_classes['sidebar_class']     = "col-12 col-xs-12 col-lg-5 col-xl-4" . $sidebar_class;
                $column_classes['position']          = 'right';

				//default for page is fullwidth - do we need this?
				if ( is_page() ) {
					$column_classes['main_column_class'] = "col-12" . $main_column_class;
					$column_classes['sidebar_class']     = false;
                    $column_classes['position']          = 'full';
				}

			}
		}

		if ( $full_width || !psycheco_is_active_widgets_in_main_sidebar_exists() ) {
			$column_classes['main_column_class'] = "col-12" . $main_column_class;
			$column_classes['sidebar_class']     = false;
            $column_classes['position']          = 'full';
		}

		return $column_classes;

	}

endif; //psycheco_get_columns_classes()

if ( ! function_exists( 'psycheco_get_columns_classes_for_unyson_extended' ) ) :
	/**
	 * Define a sidebar position for manage main column CSS class, sidebar CSS class and visibility of sidebar.
	 * return array
	 */
	function psycheco_get_columns_classes_for_unyson_extended( $full_width = false ) {

		// Sidebar Position

		// default
		$sidebar_position = apply_filters( 'psycheco_default_sidebar_position', 'right' );

		// get position
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$unyson_position = fw_ext_sidebars_get_current_position();
			if ( null != $unyson_position ) {
				$sidebar_position = $unyson_position;
			}
		}

		// is unyson sidebar
		$unyson_sidebar = false;
		if ( function_exists( 'fw_ext_sidebars_get_current_preset' ) ) {
			$unyson_sidebar = fw_ext_sidebars_get_current_preset();
		}

		// is sidebar empty ( no widgets )
		$empty = false;
		if ( apply_filters( 'psycheco_check_for_widgets', true ) ) {
			if ( is_array( $unyson_sidebar ) ) {
				if ( array_key_exists( 'sidebars', (array) $unyson_sidebar ) ) {
					if ( array_key_exists( 'blue', $unyson_sidebar['sidebars'] ) ) {
						$sidebars_widgets = wp_get_sidebars_widgets();
						if ( is_array( $sidebars_widgets ) ) {
							if ( empty( $sidebars_widgets[ $unyson_sidebar['sidebars']['blue'] ] ) ) {
								$empty = true;
							}
						}
					}
				}
			} elseif ( ! is_active_sidebar( 'sidebar-main' ) ) {
				$empty = true;
			}
		}

		// URL parameter
		if ( isset( $_GET['sidebar_position'] ) && ! $empty ) {
			$sidebar_position = esc_attr ( $_GET['sidebar_position'] );
		}

		// direct forbidden
		if ( $empty || is_page() || $full_width || 'attachment' == get_post_type() ) {
			$sidebar_position = 'full';
		}


		// Content/Sidebar width

		$s = apply_filters( 'psycheco_sidebar_width', 4 );             // sidebar width

		$c = 12 - $s;       // content width


		// Content/Sidebar Classes

		// Sidebar Right
		$column_classes['main_column_class'] = 'col-sm-7 col-md-' . $c . ' col-lg-' . $c;
		$column_classes['sidebar_class']     = 'col-sm-5 col-md-' . $s . ' col-lg-' . $s;

		// Sidebar Left
		if ( 'left' == $sidebar_position ) {
			$column_classes['main_column_class'] = 'col-sm-7 col-md-' . $c . ' col-lg-' . $c . ' col-sm-push-5 col-md-push-' . $s . ' col-lg-push-' . $s;
			$column_classes['sidebar_class']     = 'col-sm-5 col-md-' . $s . ' col-lg-' . $s . ' col-sm-pull-7 col-md-pull-' . $c . ' col-lg-pull-' . $c;
		}

		// No Sidebar
		if ( 'full' == $sidebar_position ) {
			$column_classes['main_column_class'] = 'col-sm-12';
			$column_classes['sidebar_class']     = false;
		}

		return $column_classes;

	}

endif; //psycheco_get_columns_classes_for_unyson_extended()


/**
 * Find out if blog has more than one category.
 *
 * @return boolean true if blog has more than 1 category
 */
if ( ! function_exists( 'psycheco_categorized_blog' ) ) :
	function psycheco_categorized_blog() {
		if ( false === ( $all_categories = get_transient( 'psycheco_category_count' ) ) ) {
			// Create an array of all the categories that are attached to posts
			$all_categories = get_categories( array(
				'hide_empty' => 1,
			) );

			// Count the number of categories that are attached to the posts
			$all_categories = count( $all_categories );

			set_transient( 'psycheco_category_count', $all_categories );
		}

		if ( 1 !== (int) $all_categories ) {
			// This blog has more than 1 category so psycheco_categorized_blog should return true
			return true;
		} else {
			// This blog has only 1 category so psycheco_categorized_blog should return false
			return false;
		}
	}
endif; //psycheco_categorized_blog()


//get predefined template part from theme options
if ( ! function_exists( 'psycheco_get_predefined_template_part' ) ) :
	/**
	 * Return proper template part from options or default.
	 * string $template_part_name
	 */
	function psycheco_get_predefined_template_part( $template_part_name, $default_value = '1' ) {
		$template_part_name = sanitize_title_with_dashes( $template_part_name );
		$options = psycheco_get_options();

		$option_value = $options['page_' . $template_part_name];
		if ( $option_value ) {
			$template_part = $template_part_name . '-' . $option_value;
		} else {
			$template_part = $template_part_name . '-' . $default_value;
		}

		//hide breadcrumbs and override header for certain page - for demo and custom pages
		if ( is_page() && function_exists( 'fw_get_db_post_option' ) ) {
			global $post;
			//show or hide breadcrumbs
			if ( 'title' == $template_part_name && fw_get_db_post_option( $post->ID, 'hide_title' ) ) {
				//non-existent part
				$template_part = $template_part_name . '-999';
			}

			//custom header for certain page
			if ( 'header' == $template_part_name && fw_get_db_post_option( $post->ID, 'header' ) ) {
				$template_part = $template_part_name . '-' . fw_get_db_post_option( $post->ID, 'header' );
			}

			//custom footer for certain page
			if ( 'footer' == $template_part_name && fw_get_db_post_option( $post->ID, 'footer' ) ) {
				$template_part = $template_part_name . '-' . fw_get_db_post_option( $post->ID, 'footer' );
			}
		}

		//get template part from URL - for demo
		if ( isset( $_GET[ $template_part_name ] ) ) {
			$template_part = esc_attr( $template_part_name ) . '-' . ( int ) $_GET[ $template_part_name ];
		}

		return $template_part;
	}
endif; //psycheco_get_predefined_template_part()

//get ids of showing widgets
if ( ! function_exists( 'psycheco_get_showing_widgets_ids' ) ) :
	/**
	 * Return array of id's of all widgets that are showing.
	 */

	function psycheco_get_showing_widgets_ids() {
		$showing_widgets     = wp_get_sidebars_widgets();
		$showing_widgets_ids = array();
		foreach ( $showing_widgets as $sidebar_name => $sidebar_widgets ) {
			foreach ( $sidebar_widgets as $sidebar_widget_id ) {
				if ( $sidebar_name !== 'wp_inactive_widgets' ) {
					$showing_widgets_ids[] = $sidebar_widget_id;
				}
			}
		}
		return $showing_widgets_ids;
	}
endif; //psycheco_get_showing_widgets_ids

//returning first taxonomy of displayed archive or taxonomy
if ( ! function_exists( 'psycheco_get_posts_single_taxonomy_name' ) ) :
	function psycheco_get_posts_single_taxonomy_name() {
		$queried_object = get_queried_object();
		$taxonomy_name = '';
		if ( is_tax() ) {
			$taxonomy_name = $queried_object->taxonomy;
		} elseif ( is_singular()) {
			$taxonomies_array = get_object_taxonomies( $queried_object );
			$taxonomy_name = $taxonomies_array[0];
		} else {
			$taxonomies_array = get_object_taxonomies( $queried_object->name );
			$taxonomy_name = $taxonomies_array[0];
		}
		return $taxonomy_name;
	}
endif; //psycheco_get_posts_single_taxonomy_name

//get all unique categories for all showing posts
if ( ! function_exists( 'psycheco_get_post_categories' ) ) :
	function psycheco_get_post_categories( $taxonomy_name = 'category' ) {
		//get all terms for filter
		if ( have_posts() ) :

			$all_categories = array();
			$categories     = array();
			// Start the Loop.
			while ( have_posts() ) : the_post();
				$all_categories[] = get_the_terms( get_the_ID(), $taxonomy_name );
			endwhile;
			wp_reset_postdata();

			foreach ( $all_categories as $post_categories ) :
				foreach ( $post_categories as $category ) :
					$categories[] = $category;
				endforeach;
			endforeach;

			$categories = array_unique( $categories, SORT_REGULAR );

			return $categories;

		endif; //have_posts
	}
endif; //psycheco_get_post_categories

//get all taxonomies slug for single post. Used inside loop
if ( ! function_exists( 'psycheco_get_categories_slugs_for_single_post' ) ) :
	function psycheco_get_categories_slugs_for_single_post( $taxonomy_name = 'category' ) {
		$term_objects      = get_the_terms( get_the_ID(), $taxonomy_name );
		$item_filter_class = '';
		foreach ( $term_objects as $term_object ) {
			$item_filter_class .= ' ' . $term_object->slug;
		}

		return $item_filter_class;
	}
endif; //psycheco_get_categories_slugs_for_single_post

//get icon styled css class
if ( ! function_exists( 'psycheco_get_unyson_icon_styled_class' ) ) :
	function psycheco_get_unyson_icon_styled_class( $atts ) {
		if ( !defined( 'FW' ) ) {
			return '';
		}
		$class = $atts['icon_font_size'];
		$style_cololr_divider = ' ';

		if( strstr( $atts['icon_style'], 'bg-' ) ) {
			//main colors
			$atts['icon_color'] = str_replace( 'color-main', 'maincolor', $atts['icon_color'] );
			//darkgrey colors
			$atts['icon_color'] = str_replace( 'color-', '', $atts['icon_color'] );

			$style_cololr_divider = '';
		}

		return trim( $class . ' ' . $atts['icon_style'] . $style_cololr_divider . $atts['icon_color'] );
	}
endif; //psycheco_get_unyson_icon_styled_class


//get icon array for special header for Unyson builder
if ( ! function_exists( 'psycheco_get_unyson_icon_type_v2_array' ) ) :
	function psycheco_get_unyson_icon_type_v2_array( $atts, $key ) {
		if ( !defined( 'FW' ) ) {
			return array(
				'icon_html' => '',
				'icon_type' => false,
			);
		}
		$icon_array = $atts[$key];
		$icon_html  = '';
		$icon_type = false;
		if ( $icon_array['type'] === 'icon-font' ) {
			if($icon_array['icon-class'] !== '') {
				$icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
				$icon_type = 'icon';
			}
		} elseif ($icon_array['type'] === 'custom-upload') {
			$icon_html = '<img src="' . $icon_array['url'] . '" alt="' . esc_attr( $icon_array['type'] ) . '" class="special-heading-image">';
			$icon_type = 'image';
		}
		return array(
			'icon_html' => $icon_html,
			'icon_type' => $icon_type,
		);
	}
endif; //psycheco_get_unyson_icon_type_v2_array

if ( ! function_exists( 'psycheco_get_unyson_icon_type_v2_array_for_special_heading' ) ) :
	function psycheco_get_unyson_icon_type_v2_array_for_special_heading( $atts, $key ) {

		if ( !defined( 'FW' ) ) {
			return false;
		}
		if ( empty( $atts['headings'][$key]['heading_icon'] ) ) {
			return false;
		}
		$icon_array = $atts['headings'][$key]['heading_icon'];
		$icon_html  = '';
		$icon_type = false;
		if ( $icon_array['type'] === 'icon-font' ) {
			if($icon_array['icon-class'] !== '') {
				$icon_html = '<i class="' . $icon_array['icon-class'] . '"></i>';
				$icon_type = 'icon';
			}
		} elseif ($icon_array['type'] === 'custom-upload') {
			$icon_html = '<img src="' . $icon_array['url'] . '" alt="' . esc_attr( $atts['headings'][$key]['heading_text'] ) . '" class="special-heading-image">';
			$icon_type = 'image';
		}
		return array(
			'icon_html' => $icon_html,
			'icon_type' => $icon_type,
		);
	}
endif; //psycheco_get_unyson_icon_type_v2_array_for_special_heading

//get the excerpt for page on search page even if only Unyson builder used - using in loop
if ( ! function_exists( 'psycheco_get_excerpt_for_page_with_unyson_builder' ) ) :
	function psycheco_get_excerpt_for_page_with_unyson_builder() {
		$excerpt = apply_filters( 'the_excerpt', get_the_excerpt() );
		if ( empty( $excerpt ) ) {
			$content = get_the_content();
			$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
			$content = preg_replace( '+<h6 class=\"d-none\">.*</h6>+', '', $content );
			$content = str_replace( array( '</p>', '</h1>', '</h2>', '</h3>', '</h4>', '</h5>', '</h6>' ), ' ', apply_filters( 'the_content', $content ) );
			$content = strip_tags( $content );
			$excerpt = substr( $content, 0, 200) . ' [...]';
		}
		return $excerpt;
	}
endif; //psycheco_get_excerpt_for_page_with_unyson_builder

// check if is WooCommerce Page. Need for Customizer setting.
if ( ! function_exists( 'psycheco_is_shop' ) ) :
	function psycheco_is_shop() {
		$res = false;
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$res = true;
			}
		}
		return $res;
	}
endif; //psycheco_is_shop

// check if is WooCommerce Products Page. Need for Customizer setting.
if ( ! function_exists( 'psycheco_is_woocommerce_page' ) ) :
	function psycheco_is_woocommerce_page() {
		$res = false;
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_woocommerce() || is_product_category() || is_product_tag() ) {
				$res = true;
			}
		}
		return $res;
	}
endif; //psycheco_is_woocommerce_page

if ( ! function_exists( 'psycheco_var_export' ) ) :
	function psycheco_var_export( $var ) {
		echo '<pre>';
		var_export( $var );
		echo '</pre>';
	}
endif; //psycheco_var_export

if ( ! function_exists( 'psycheco_get_root_colors_inline_styles_string' ) ) {
	/**
 * Get ":root" colors inline styles string.
 */
	function psycheco_get_root_colors_inline_styles_string ()	{
		$colors = psycheco_get_theme_colors();
		$psycheco_colors_string = '';
		
		// Accent colors from customizer
		foreach ( $colors as $color_name => $color_value ) {
			$psycheco_colors_string .= '--' . $color_name . ':' . sanitize_hex_color( $color_value ) . ';';
			$rgb_color = new Psycheco_Color( $colors[ $color_name ] );
			$psycheco_colors_string .= '--' . $color_name . 'RGB:' . $rgb_color->rgbString() . ';';
		}
		return $psycheco_colors_string;
	}
}