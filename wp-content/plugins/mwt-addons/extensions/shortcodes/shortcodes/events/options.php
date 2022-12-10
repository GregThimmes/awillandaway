<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,

		),
		'label'      => esc_html__( 'Items number', 'psycheco' ),
		'desc'       => esc_html__( 'Number of events to display', 'psycheco' ),
	),
    'nav'           => array(
        'type'         => 'switch',
        'value'        => 'true',
        'label'        => esc_html__( 'Show Navigation', 'psycheco' ),
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'psycheco' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'psycheco' ),
        ),
    ),
    'margin'        => array(
        'label'   => esc_html__( 'Horizontal item margin (px)', 'psycheco' ),
        'desc'    => esc_html__( 'Select horizontal item margin', 'psycheco' ),
        'value'   => '30',
        'type'    => 'select',
        'choices' => array(
            '0'  => esc_html__( '0', 'psycheco' ),
            '1'  => esc_html__( '1px', 'psycheco' ),
            '2'  => esc_html__( '2px', 'psycheco' ),
            '10' => esc_html__( '10px', 'psycheco' ),
            '30' => esc_html__( '30px', 'psycheco' ),
        )
    ),
    'responsive_lg' => array(
        'label'   => esc_html__( 'Columns on large screens', 'psycheco' ),
        'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'psycheco' ),
        'value'   => '4',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'psycheco' ),
            '2' => esc_html__( '2', 'psycheco' ),
            '3' => esc_html__( '3', 'psycheco' ),
            '4' => esc_html__( '4', 'psycheco' ),
            '6' => esc_html__( '6', 'psycheco' ),
        )
    ),
    'responsive_md' => array(
        'label'   => esc_html__( 'Columns on middle screens', 'psycheco' ),
        'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'psycheco' ),
        'value'   => '3',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'psycheco' ),
            '2' => esc_html__( '2', 'psycheco' ),
            '3' => esc_html__( '3', 'psycheco' ),
            '4' => esc_html__( '4', 'psycheco' ),
            '6' => esc_html__( '6', 'psycheco' ),
        )
    ),
    'responsive_sm' => array(
        'label'   => esc_html__( 'Columns on small screens', 'psycheco' ),
        'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'psycheco' ),
        'value'   => '2',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'psycheco' ),
            '2' => esc_html__( '2', 'psycheco' ),
            '3' => esc_html__( '3', 'psycheco' ),
            '4' => esc_html__( '4', 'psycheco' ),
            '6' => esc_html__( '6', 'psycheco' ),
        )
    ),
    'responsive_xs' => array(
        'label'   => esc_html__( 'Columns on extra small screens', 'psycheco' ),
        'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'psycheco' ),
        'value'   => '1',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1', 'psycheco' ),
            '2' => esc_html__( '2', 'psycheco' ),
            '3' => esc_html__( '3', 'psycheco' ),
            '4' => esc_html__( '4', 'psycheco' ),
            '6' => esc_html__( '6', 'psycheco' ),
        )
    ),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'psycheco' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'psycheco' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	)
);