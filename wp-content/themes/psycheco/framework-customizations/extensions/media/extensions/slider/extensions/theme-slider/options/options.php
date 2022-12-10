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
	'nav' => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show slides navigation', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'Hide', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Show', 'psycheco' ),
		),
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