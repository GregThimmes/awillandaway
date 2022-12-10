<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy              = $ext_services_settings['taxonomy_name'];

$options = array(
	'number' => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 120,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		
		),
		'label'      => esc_html__( 'Items number', 'psycheco' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'psycheco' ),
	),
);