<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'class'  => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slider Additional CSS class', 'psycheco' ),
		'desc'  => esc_html__( 'Optional CSS class for slider section', 'psycheco' ),
	),
	'dots' => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show slide dots', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'Hide', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Show', 'psycheco' ),
		),
	),
	'scroll_link' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_scroll_link' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show scroll link', 'psycheco' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'psycheco' ),
				),
				'right-choice' => array(
					'value' => 'scroll_link',
					'label' => esc_html__( 'Yes', 'psycheco' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'scroll_link' => array(
				'scroll_text'  => array(
					'type'  => 'text',
					'value' => 'Scroll',
					'label' => esc_html__( 'Scroll link text', 'psycheco' ),
				),
				'scroll_id'  => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Scroll ID', 'psycheco' ),
					'desc'  => esc_html__('The ID of the section to navigate to', 'psycheco')
				),
			),
		),
	),
	'speed'  => array(
		'type'  => 'slider',
		'value' => 5000,
		'properties' => array(
			'min' => 2000,
			'max' => 10000,
			'step' => 200,

		),
		'label' => esc_html__('Slider speed', 'psycheco'),
		'desc'  => esc_html__('In milliseconds', 'psycheco'),
	),

);