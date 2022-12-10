<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'horizontal_position' => array(
		'type'    => 'select',
		'value'   => 'heading-left',
		'label'   => esc_html__( 'Heading horizontal position', 'psycheco' ),
		'choices' => array(
			'heading-left'    => esc_html__( 'Left', 'psycheco' ),
			'heading-right' => esc_html__( 'Right', 'psycheco' ),
		),
	),
	'rotate_heading' => array(
		'type'  => 'switch',
		'value' => '',
		'label' => esc_html__('Rotate Heading', 'psycheco'),
		'desc'  => esc_html__('Show heading vertical', 'psycheco'),
		'left-choice' => array(
			'value' => '',
			'label' => esc_html__('No', 'psycheco'),
		),
		'right-choice' => array(
			'value' => 'rotate-heading',
			'label' => esc_html__('Yes', 'psycheco'),
		)
	),
	'heading_text'           => array(
		'type'  => 'textarea',
		'value' => '',
		'label' => esc_html__( 'Heading text', 'psycheco' ),
		'desc'  => esc_html__( 'Text to appear in header', 'psycheco' ),
	),
	'heading_text_color'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Heading text color', 'psycheco' ),
		'desc'    => esc_html__( 'Select a color for your text', 'psycheco' ),
		'choices' => array(
			''            => esc_html__( 'Inherited', 'psycheco' ),
			'color-light' => esc_html__( 'Light Color', 'psycheco' ),
			'color-main'  => esc_html__( 'Color Main', 'psycheco' ),
			'color-main2' => esc_html__( 'Color Main 2', 'psycheco' ),
			'color-dark'  => esc_html__( 'Dark Color', 'psycheco' ),
			'color-grey-theme'  => esc_html__( 'Grey Color', 'psycheco' ),
		),
	),
	'additional_class'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Additional CSS class', 'psycheco' ),
	),
);
