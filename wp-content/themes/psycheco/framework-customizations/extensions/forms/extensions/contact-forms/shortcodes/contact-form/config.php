<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'psycheco' ),
	'description' => esc_html__( 'Build contact forms', 'psycheco' ),
	'tab'         => esc_html__( 'Content Elements', 'psycheco' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);