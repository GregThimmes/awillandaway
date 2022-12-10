<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ( defined( 'FW' ) ) && ! ( class_exists( 'MWT_Widget_Contact_Info' ) ) ) :

	class MWT_Widget_Contact_Info extends WP_Widget {

		/**
		 * Widget constructor.
		 */
		private $options;
		private $prefix;

		function __construct() {

			$widget_ops = array(
				'classname'   => 'widget_contact_info',
				'description' => esc_html__( 'Add icons with title', 'mwt' ),
			);

			$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

			parent::__construct( false, esc_html__( 'Theme - Contact Info', 'mwt' ), $widget_ops );

			//Create our options by using Unyson option types
			$this->options = array(
				'title' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Widget Title', 'mwt' ),
				),
				'contact_info' => array(
					'type'          => 'addable-popup',
					'label'         => esc_html__( 'Contact Info', 'mwt' ),
					'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'mwt' ),
					'desc'          => esc_html__( 'Create your accordion panels', 'mwt' ),
					'template'      => '{{=contact_title}}',
					'popup-options' => array(
						'contact_title'          => array(
							'type'  => 'text',
							'label' => esc_html__( 'Contact Title', 'mwt' )
						),
						'contact_content'        => array(
							'type'  => 'textarea',
							'label' => esc_html__( 'Contact Content', 'mwt' )
						),
						'contact_content_link'        => array(
							'type'  => 'text',
							'label' => esc_html__( 'Contact Content Link', 'mwt' )
						),
					)
				),
			);
			$this->prefix  = 'widget_contact_info';
		}

		function widget( $args, $instance ) {
			extract( wp_parse_args( $args ) );

			$title     = esc_attr( $instance['title'] );
			$title     = $before_title  . $title . $after_title;

			$params = array();

			foreach ( $instance as $key => $value ) {
				$params[ $key ] = $value;
			}

			$instance = $params;

			$filepath = MWT_WIDGETS_PLUGIN_PATH . '/widgets/contact-info/views/widget.php';

			if ( file_exists( $filepath ) ) {
				include( $filepath );
			} else {
				esc_html_e( 'View not found', 'mwt' );
			}
		}

		function update( $new_instance, $old_instance ) {
			return fw_get_options_values_from_input(
				$this->options,
				FW_Request::POST( fw_html_attr_name_to_array_multi_key( $this->get_field_name( $this->prefix ) ), array() )
			);
		}

		function form( $values ) {

			$prefix = $this->get_field_id( $this->prefix ); // Get unique prefix, preventing duplicated key
			$id     = 'fw-widget-options-' . $prefix;

			// Print our options
			echo '<div class="fw-force-xs fw-theme-admin-widget-wrap fw-framework-widget-options-widget" data-fw-widget-id="' . esc_attr( $id ) . '" id="' . esc_attr( $id ) . '">';

			echo fw()->backend->render_options( $this->options, $values, array(
				'id_prefix'   => $prefix . '-',
				'name_prefix' => $this->get_field_name( $this->prefix ),
			) );
			echo '</div>';

			return $values;
		}
	}

endif;