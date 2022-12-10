<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
$social         = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );
$social_options = $social->get_options();

$options = array(
	
	'slide_background'         => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slide background', 'psycheco' ),
		'desc'        => esc_html__( 'Select slide background color', 'psycheco' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'psycheco' ),
			'ls ms' => esc_html__( 'Light Muted', 'psycheco' ),
			'ds'    => esc_html__( 'Dark', 'psycheco' ),
			'ds ms' => esc_html__( 'Dark Muted', 'psycheco' ),
			'cs'    => esc_html__( 'Color', 'psycheco' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_background_overlay' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Show Color Overlay', 'psycheco' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'slide_align'              => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide Text Alignment', 'psycheco' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'psycheco' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'psycheco' ),
			'text-center' => esc_html__( 'Center', 'psycheco' ),
			'text-right'  => esc_html__( 'Right', 'psycheco' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_vertical_align'     => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Slide Vertical Alignment', 'psycheco' ),
		'desc'        => esc_html__( 'Select vertcial alignment for slider layers', 'psycheco' ),
		'choices'     => array(
			''                  => esc_html__( 'Middle (default)', 'psycheco' ),
			'align-items-start'    => esc_html__( 'Top', 'psycheco' ),
			'align-items-end' => esc_html__( 'Bottom', 'psycheco' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_image' => array(
		'label' => esc_html__( 'Slide Image', 'psycheco' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' ),
		'type'  => 'upload',
	),
	'image_animation'      => array(
		'type'    => 'select',
		'value'   => 'fadeInLeft',
		'label'   => esc_html__( 'Slide Image Animation type', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'psycheco' ),
		'choices' => psycheco_unyson_option_animations(),
	),
	'slide_layers'             => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Slide Layers', 'psycheco' ),
		'desc'            => esc_html__( 'Choose a tag and text inside it', 'psycheco' ),
		'box-options'     => array_merge( array(
				'layer_tag'            => array(
					'type'    => 'select',
					'value'   => 'h3',
					'label'   => esc_html__( 'Layer tag', 'psycheco' ),
					'desc'    => esc_html__( 'Select a tag for your ', 'psycheco' ),
					'choices' => array(
						'h2' => esc_html__( 'H2 tag', 'psycheco' ),
						'h3' => esc_html__( 'H3 tag', 'psycheco' ),
						'h4' => esc_html__( 'H4 tag', 'psycheco' ),
						'h5' => esc_html__( 'H5 tag', 'psycheco' ),
						'h6' => esc_html__( 'H6 tag', 'psycheco' ),
						'p'  => esc_html__( 'P tag', 'psycheco' ),
					
					),
				),
				'layer_animation'      => array(
					'type'    => 'select',
					'value'   => 'fadeIn',
					'label'   => esc_html__( 'Animation type', 'psycheco' ),
					'desc'    => esc_html__( 'Select one of predefined animations', 'psycheco' ),
					'choices' => psycheco_unyson_option_animations(),
				),
				'layer_text'           => array(
					'type'  => 'textarea',
					'value' => '',
					'label' => esc_html__( 'Layer text', 'psycheco' ),
					'desc'  => esc_html__( 'Text to appear in slide layer', 'psycheco' ),
				),
				'layer_font_family' => array(
					'type'    => 'select',
					'value'   => '',
					'label'   => esc_html__( 'Layer font family', 'psycheco' ),
					'desc'    => esc_html__( 'Select a font family for your layer', 'psycheco' ),
					'choices' => array(
						''                     => esc_html__( 'Inherited', 'psycheco' ),
						'heading-font'         => esc_html__( 'Heading Font', 'psycheco' ),
						'body-font'            => esc_html__( 'Body Font', 'psycheco' ),
						'saint-delafield-font' => esc_html__( 'Mrs Saint Delafield', 'psycheco' ),
					),
				),
				'layer_text_color'     => array(
					'type'    => 'select',
					'value'   => '',
					'label'   => esc_html__( 'Layer text color', 'psycheco' ),
					'desc'    => esc_html__( 'Select a color for your text in layer', 'psycheco' ),
					'choices' => array(
						''               => esc_html__( 'Inherited', 'psycheco' ),
						'color-main'     => esc_html__( 'First main color', 'psycheco' ),
						'color-main2'    => esc_html__( 'Second main color', 'psycheco' ),
						'color-darkgrey' => esc_html__( 'Dark grey color', 'psycheco' ),
						'color-dark'     => esc_html__( 'Dark color', 'psycheco' ),
						'color-light'    => esc_html__( 'Light color', 'psycheco' ),
					
					),
				),
				'layer_text_weight'    => array(
					'type'    => 'select',
					'value'   => '',
					'label'   => esc_html__( 'Layer text weight', 'psycheco' ),
					'desc'    => esc_html__( 'Select a weight for your text in layer', 'psycheco' ),
					'choices' => array(
						'fw-400' => esc_html__( 'Regular', 'psycheco' ),
						'fw-100' => esc_html__( 'Thin', 'psycheco' ),
						'fw-300' => esc_html__( 'Light', 'psycheco' ),
						'fw-500' => esc_html__( 'Medium', 'psycheco' ),
						'fw-600' => esc_html__( 'Semi Bold', 'psycheco' ),
						'fw-700' => esc_html__( 'Bold', 'psycheco' ),
						'fw-900' => esc_html__( 'Extra Bold', 'psycheco' ),
					
					),
				),
				'layer_text_transform' => array(
					'type'    => 'select',
					'value'   => '',
					'label'   => esc_html__( 'Layer text transform', 'psycheco' ),
					'desc'    => esc_html__( 'Select a text transformation for your layer', 'psycheco' ),
					'choices' => array(
						''                => esc_html__( 'None', 'psycheco' ),
						'text-lowercase'  => esc_html__( 'Lowercase', 'psycheco' ),
						'text-uppercase'  => esc_html__( 'Uppercase', 'psycheco' ),
						'text-capitalize' => esc_html__( 'Capitalize', 'psycheco' ),
					
					),
				),
				'class'                => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Additional Layer CSS class', 'psycheco' ),
				),
			)
		),
		'template'        => esc_html__( 'Slider Layer', 'psycheco' ),
		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'psycheco' ),
	),
	'slide_buttons'            => array(
		'label'         => esc_html__( 'Buttons', 'psycheco' ),
		'popup-title'   => esc_html__( 'Add/Edit Buttons', 'psycheco' ),
		'desc'          => esc_html__( 'Add button for slide', 'psycheco' ),
		'type'          => 'addable-popup',
		'template'      => '{{=label}}',
		'popup-options' => array(
			$button_options,
		)
	),
	'button_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeInUp',
		'label'   => esc_html__( 'Buttons Animation Type', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'psycheco' ),
		'choices' => psycheco_unyson_option_animations(),
	),
	$social_options,
	'social_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeInUp',
		'label'   => esc_html__( 'Social Buttons Animation Type', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'psycheco' ),
		'choices' => psycheco_unyson_option_animations(),
	),
	'class'                    => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Additional Slide CSS class', 'psycheco' ),
	),
);