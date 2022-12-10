<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();

$options = array(
	'author_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Author Image', 'psycheco' ),
		'images_only' => true,
	),
	'author_name'             => array(
		'type'  => 'text',
		'label' => esc_html__( 'Author Name', 'psycheco' ),
	),
	'author_position'             => array(
		'type'  => 'text',
		'label' => esc_html__( 'Author Position', 'psycheco' ),
	),
	'signature_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Signature Image', 'psycheco' ),
		'images_only' => true,
	),
);