<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

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
			'lightbox' => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Open link in lightbox', 'psycheco' ),
				'desc'         => esc_html__( 'If your link is a video link you can open it in lightbox', 'psycheco' ),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'psycheco' )
				),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'psycheco' )
				),
			),
			'title' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Title and Alt text', 'psycheco' ),
			),
		),
		'template'        => '{{=image.url}}',
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
	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Dots', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'center'        => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Center carousel', 'psycheco' ),
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
	'owl_animation'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Owl Fade Animation', 'psycheco' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'fadeOut',
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
			'50' => '50px',
			'80' => '80px',
			'100' => '100px',

		),
		'no-validate' => false,
	),
	'class'     => array(
		'label' => esc_html__( 'Custom Class', 'psycheco' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'psycheco' ),
		'type'  => 'text',
		'value' => '',
	),

);