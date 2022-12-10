<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$events = fw()->extensions->get( 'events' );
if ( empty( $events ) ) {
	return;
}


$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Events', 'psycheco' ),
		'description' => esc_html__( 'Events regular', 'psycheco' ),
		'tab'         => esc_html__( 'Widgets', 'psycheco' )
	)
);