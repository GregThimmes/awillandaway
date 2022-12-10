<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 12,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'psycheco' ),
		'desc'       => esc_html__( 'Number of posts to display', 'psycheco' ),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'psycheco'),
		'desc'  => esc_html__('You can select one or more categories', 'psycheco'),
		'population' => 'taxonomy',
		'source' => 'category',
		'prepopulate' => 10,
		'limit' => 100,
	)
);