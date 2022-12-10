<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$ext_portfolio_settings = fw()->extensions->get( 'portfolio' )->get_settings();
$taxonomy = $ext_portfolio_settings['taxonomy_name'];

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
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'psycheco' ),
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
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'psycheco'),
		'desc'  => esc_html__('You can select one or more categories', 'psycheco'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);