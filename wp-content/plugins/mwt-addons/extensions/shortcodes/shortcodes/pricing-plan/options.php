<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();

$options = array(
	'tab_main' => array(
		'type' => 'tab',
		'title' => esc_html__('Info', 'psycheco'),
		'options' => array(
			'image'            => array(
				'type'  => 'upload',
				'label' => esc_html__( 'Choose price image', 'psycheco' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' )
			),
			'title'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Pricing plan title', 'psycheco' ),
			),
			'title_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Title text color', 'psycheco' ),
				'desc'    => esc_html__( 'Select a color for your title', 'psycheco' ),
				'choices' => array(
					''            => esc_html__( 'Inherited', 'psycheco' ),
					'color-light' => esc_html__( 'Light Color', 'psycheco' ),
					'color-main'  => esc_html__( 'Color Main', 'psycheco' ),
					'color-main2' => esc_html__( 'Color Main 2', 'psycheco' ),
					'color-main3' => esc_html__( 'Color Main 3', 'psycheco' ),
					'color-main4' => esc_html__( 'Color Main 4', 'psycheco' ),
					'color-dark'  => esc_html__( 'Dark Color', 'psycheco' ),
					'color-grey'  => esc_html__( 'Grey Color', 'psycheco' ),
				),
			),
			'description'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Plan description', 'psycheco' ),
			),
			'currency'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Currency Sign', 'psycheco' ),
			),
			'price'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Whole price', 'psycheco' ),
				'desc' => esc_html__( 'Price before decimal divider', 'psycheco' ),
			),
			'price_after'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Text after price', 'psycheco' ),
				'desc' => esc_html__( 'Price after decimal divider, including divider (dot, coma etc.), for example ".99", or text "per month"', 'psycheco' ),
			),
            'features'         => array(
				'type'            => 'addable-box',
				'value'           => '',
				'label'           => esc_html__( 'Pricing plan features', 'psycheco' ),
				'box-options'     => array(
					'feature_name'   => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Feature name', 'psycheco' ),
					),
					'feature_checked' => array(
						'type'        => 'select',
						'value'       => '',
						'label'       => esc_html__( 'Default, checked or unchecked', 'psycheco' ),
						'choices'     => array(
							'default' => esc_html__( 'Default', 'psycheco' ),
							'enabled' => esc_html__( 'Enabled', 'psycheco' ),
							'disabled' => esc_html__( 'Disabled', 'psycheco'),
						),
						'no-validate' => false,
					),
				),
				'template'        => '{{=feature_name}}',
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'psycheco' ),
				'sortable'        => true,
			),
			'featured' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Default or featured plan', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__(' Default', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'plan-featured',
					'label' => esc_html__(' Featured', 'psycheco'),
				),
			),
			'layout' => array(
				'label'   => esc_html__('Choose layout', 'psycheco'),
				'type'    => 'select',
				'value'   => '1',
				'choices' => array(
					'1'  => esc_html__('Default', 'psycheco'),
					'2' => esc_html__('Second', 'psycheco'),
					'3' => esc_html__('Third', 'psycheco'),
				),
			)
		),
	),
	'tab_button' => array(
		'type' => 'tab',
		'options' => array(
			'price_buttons'     => array(
				'type'        => 'addable-box',
				'value'       => '',
				'label'       => esc_html__( 'Price Buttons', 'psycheco' ),
				'desc'        => esc_html__( 'Add a button, to price table', 'psycheco' ),
				'template'    => 'Button',
				'box-options' => array(
					$button_options
				),
				'limit'           => 1, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add', 'psycheco' ),
			),
		),
		'title' => esc_html__('Button', 'psycheco'),
	),


);