<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar Title', 'psycheco' ),
	),
    'title_transform' => array(
        'type'    => 'select',
        'value'   => '',
        'label'   => esc_html__( 'Title Transform', 'psycheco' ),
        'choices' => array(
            ''                => esc_html__( 'None', 'psycheco' ),
            'text-lowercase'  => esc_html__( 'Lowercase', 'psycheco' ),
            'text-uppercase'  => esc_html__( 'Uppercase', 'psycheco' ),
            'text-capitalize' => esc_html__( 'Capitalize', 'psycheco' ),
        ),
    ),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'psycheco' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'psycheco' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context Background Color', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'psycheco' ),
		'choices' => array(
			'bg-maincolor' => esc_html__( 'Color Main', 'psycheco' ),
			'bg-maincolor2' => esc_html__( 'Color Main 2', 'psycheco' ),
			'bg-success' => esc_html__( 'Success', 'psycheco' ),
			'bg-info'    => esc_html__( 'Info', 'psycheco' ),
			'bg-warning' => esc_html__( 'Warning', 'psycheco' ),
			'bg-danger'  => esc_html__( 'Danger', 'psycheco' ),

		),
	),
);