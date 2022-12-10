<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Signature', 'psycheco' ),
	'description' => esc_html__( 'Add a signature', 'psycheco' ),
	'tab'         => esc_html__( 'Content Elements', 'psycheco' )
);