<?php

class FW_Option_Type_Form_Builder_Item_Date_Picker extends FW_Option_Type_Form_Builder_Item {
	/**
	 * The item type
	 * @return string
	 */
	public function get_type() {
		return 'date-picker';
	}
	
	/**
	 * The boxes that appear on top of the builder and can be dragged down or clicked to create items
	 * @return array
	 */
	public function get_thumbnails() {
		return array(
			array(
				'html' =>
					'<div class="item-type-icon-title">' .
					'    <div class="item-type-icon"><span class="dashicons dashicons-calendar-alt"></span></div>' .
					'    <div class="item-type-title">' . esc_html__( 'Date Picker', 'psycheco' ) . '</div>' .
					'</div>',
			)
		);
	}
	
	/**
	 * Enqueue item type scripts and styles (in backend)
	 */
	public function enqueue_static() {
		$uri = fw_get_template_customizations_directory_uri( '/extensions/forms/includes/builder-items/date-picker/static' );
		
		wp_enqueue_style(
			'fw-form-builder-item-type-date-picker',
			esc_url( $uri ) . '/css/admin.css',
			array(),
			fw()->theme->manifest->get_version()
		);
		
		wp_enqueue_script(
			'fw-form-builder-item-type-date-picker',
			esc_url( $uri ) . '/js/admin.js',
			array(),
			fw()->theme->manifest->get_version(),
			true
		);
		
		wp_localize_script(
			'fw-form-builder-item-type-date-picker',
			'fw_form_builder_item_type_date_picker',
			array(
				'l10n'     => array(
					'item_title'      => esc_html__( 'Date', 'psycheco' ),
					'label'           => esc_html__( 'Label', 'psycheco' ),
					'toggle_required' => esc_html__( 'Toggle mandatory field', 'psycheco' ),
					'edit'            => esc_html__( 'Edit', 'psycheco' ),
					'delete'          => esc_html__( 'Delete', 'psycheco' ),
					'edit_label'      => esc_html__( 'Edit Label', 'psycheco' ),
				),
				'options'  => $this->get_options(),
				'defaults' => array(
					'type'    => $this->get_type(),
					'options' => fw_get_options_values_from_input( $this->get_options(), array() )
				)
			)
		);
		
		fw()->backend->enqueue_options_static( $this->get_options() );
	}
	
	/**
	 * Render item html for frontend form
	 *
	 * @param array             $item        Attributes from Backbone JSON
	 * @param null|string|array $input_value Value submitted by the user
	 *
	 * @return string HTML
	 */
	public function frontend_render( array $item, $input_value ) {
		$options = $item['options'];
		$attr    = array(
			'type'        => 'text',
			'name'        => $item['shortcode'],
			'placeholder' => $options['placeholder'],
			'value'       => is_null( $input_value ) ? '' : $input_value,
			'id'          => 'id-date-' . fw_unique_increment(),
		);
		if ( $options['required'] ) {
			$attr['required'] = 'required';
		}
		
		return fw_render_view(
			$this->locate_path(
				'/views/view.php',
				// Use this view by default
				get_template_directory() . '/framework-customizations/extensions/forms/includes/builder-items/date-picker/view.php'
			),
			array(
				'item'        => $item,
				'input_value' => $input_value,
				'attr'        => $attr,
			)
		);
	}
	
	/**
	 * Validate item on frontend form submit
	 *
	 * @param array             $item        Attributes from Backbone JSON
	 * @param null|string|array $input_value Value submitted by the user
	 *
	 * @return null|string Error message
	 */
	public function frontend_validate( array $item, $input_value ) {
		$options = $item['options'];
		
		$messages = array(
			'required'            => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				esc_html__( 'This {label} field is required', 'psycheco' )
			),
			'not_existing_choice' => str_replace(
				array( '{label}' ),
				array( $options['label'] ),
				esc_html__( '{label}: Submitted data contains not existing choice', 'psycheco' )
			),
		);
		
		if ( $options['required'] && empty( $input_value ) ) {
			return $messages['required'];
		}
	}
	
	private function get_options() {
		return array(
			array(
				'g1'   => array(
					'type'    => 'group',
					'options' => array(
						array(
							'label' => array(
								'type'  => 'text',
								'label' => esc_html__( 'Label', 'psycheco' ),
								'desc'  => esc_html__( 'The label of the field that will be displayed to the users', 'psycheco' ),
								'value' => esc_html__( 'Select Time', 'psycheco' ),
							)
						),
						array(
							'required' => array(
								'type'  => 'switch',
								'label' => esc_html__( 'Mandatory Field?', 'psycheco' ),
								'desc'  => esc_html__( 'If this field is mandatory for the user', 'psycheco' ),
								'value' => true,
							)
						),
						array(
							'placeholder' => array(
								'type'  => 'text',
								'label' => esc_html__( 'Placeholder', 'psycheco' ),
							)
						),
						array(
							'data_format' => array(
								'type'    => 'radio',
								'value'   => 'M/D/Y hh:m a',
								'label'   => esc_html__( 'Field Type', 'psycheco' ),
								'choices' => array(
									'M/D/Y hh:m A' => esc_html__( 'Date and Time', 'psycheco' ),
									'M/D/Y'        => esc_html__( 'Date', 'psycheco' ),
									'hh:m A'       => esc_html__( 'Time', 'psycheco' ),
								),
								'inline'  => true,
							)
						),
					),
				),
				'icon' => array(
					'type'  => 'icon',
					'label' => esc_html__( 'Icon', 'psycheco' ),
					'set'   => 'theme-fa-icons',
				),
			),
		);
	}
}

FW_Option_Type_Builder::register_item_type( 'FW_Option_Type_Form_Builder_Item_Date_Picker' );