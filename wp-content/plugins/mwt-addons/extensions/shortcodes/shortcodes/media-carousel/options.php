<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();


$options = array(

	'items'         => array(
		'type'            => 'addable-popup',
		'value'           => '',
		'label'           => esc_html__( 'Carousel items', 'psycheco' ),
		'popup-options'     => array(
			'image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Image', 'psycheco' ),
				'images_only' => true,
			),
			'url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Image link', 'psycheco' ),
			),
			'image_title' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Title Image', 'psycheco' ),
				'desc'  => esc_html__( 'Add title below image', 'psycheco' ),
			),
			'title_size'            => array(
				'type'    => 'select',
				'value'   => 'fs-30',
				'label'   => esc_html__( 'Title Size', 'psycheco' ),
				'desc'    => esc_html__( 'Select a size for title', 'psycheco' ),
				'choices' => array(
					'' => esc_html__('Inherit', 'psycheco'),
					'fs-16' => esc_html__('16px', 'psycheco'),
					'fs-20' => esc_html__('20px', 'psycheco'),
					'fs-30' => esc_html__('30px', 'psycheco'),
					'fs-40' => esc_html__('40px', 'psycheco'),
					'fs-50' => esc_html__('50px', 'psycheco'),
				),
			),
			'image_excerpt' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Text Image', 'psycheco' ),
				'desc'  => esc_html__( 'Add text below title', 'psycheco' ),
			),
			'image_buttons'        => array(
				'label'         => esc_html__( 'Buttons', 'psycheco' ),
				'popup-title'   => esc_html__( 'Add/Edit Buttons', 'psycheco' ),
				'desc'          => esc_html__( 'Add button for signature', 'psycheco' ),
				'type'          => 'addable-popup',
				'limit'         => 2, // limit the number of boxes that can be added
				'template'      => '{{=label}}',
				'popup-options' => array(
					$button_options,
				)
			),
			'background_color' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Background color', 'psycheco' ),
				'desc'    => esc_html__( 'Select background color', 'psycheco' ),
				'help'    => esc_html__( 'Select one of predefined background types', 'psycheco' ),
				'choices' => psycheco_unyson_option_get_backgrounds_array(),
			),
		),
		'template'        => '{{=image_title}}',
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'psycheco' ),
		'sortable'        => true,
	),
	'loop'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Loop carousel', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'nav'           => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Arrows', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'autoplay'      => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Autoplay', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'responsive_lg' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => esc_html__( 'Items count on ', 'psycheco' ) . '<' . esc_html__( '1200px', 'psycheco' ),
		'choices'     => array(
			'4' => '4',
			'3' => '3',
			'2' => '2',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'1' => '1',

		),
		'no-validate' => false,
	),
	'responsive_md' => array(
		'type'        => 'select',
		'value'       => '4',
		'label'       => esc_html__( 'Items count on 992px-1200px', 'psycheco' ),
		'choices'     => array(
			'3' => '3',
			'4' => '4',
			'2' => '2',
			'5' => '5',
			'6' => '6',
			'1' => '1',

		),
		'no-validate' => false,
	),
	'responsive_sm' => array(
		'type'        => 'select',
		'value'       => '3',
		'label'       => esc_html__( 'Items count on 768px-992px', 'psycheco' ),
		'choices'     => array(
			'3' => '3',
			'2' => '2',
			'1' => '1',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'responsive_xs' => array(
		'type'        => 'select',
		'value'       => '2',
		'label'       => esc_html__( 'Items count on ', 'psycheco' ) . '>' . esc_html__( '768px', 'psycheco' ),
		'choices'     => array(
			'2' => '2',
			'1' => '1',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',

		),
		'no-validate' => false,
	),
	'margin'        => array(
		'type'        => 'select',
		'value'       => '30',
		'label'       => esc_html__( 'Margin between items', 'psycheco' ),
		'choices'     => array(
			'30' => '30px',
			'0'  => '0px',
			'5'  => '5px',
			'10' => '10px',
			'15' => '15px',
			'20' => '20px',

		),
		'no-validate' => false,
	),

);