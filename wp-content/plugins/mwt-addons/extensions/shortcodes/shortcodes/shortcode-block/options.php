<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'  => array(
		'label' => esc_html__( 'Shortcode Code', 'psycheco' ),
		'type'  => 'text',
		'value' => ''
	),
	'custom_class'  => array(
		'label' => esc_html__( 'Shortcode Custom Class', 'psycheco' ),
		'type'  => 'text',
		'value' => ''
	),
);