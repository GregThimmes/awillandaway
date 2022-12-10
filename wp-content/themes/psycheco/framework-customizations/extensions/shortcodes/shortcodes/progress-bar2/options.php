<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = [
	'title'            => [
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Progress Bar Title', 'psycheco' ),
	],
	'percent'          => [
		'type'       => 'slider',
		'value'      => 80,
		'properties' => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'label'      => esc_html__( 'Count To', 'psycheco' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'psycheco' ),
	],
	'background_class' => [
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context Background Color', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'psycheco' ),
		'choices' => [
			'bg-maincolor'  => esc_html__( 'Color Main', 'psycheco' ),
			'bg-maincolor2' => esc_html__( 'Color Main 2', 'psycheco' ),
			'bg-success'    => esc_html__( 'Success', 'psycheco' ),
			'bg-info'       => esc_html__( 'Info', 'psycheco' ),
			'bg-warning'    => esc_html__( 'Warning', 'psycheco' ),
			'bg-danger'     => esc_html__( 'Danger', 'psycheco' ),

		],
	],
	'icon'             => [
		'type'  => 'icon-v2',
		'label' => esc_html__( 'Choose an Icon', 'psycheco' ),
	],
];