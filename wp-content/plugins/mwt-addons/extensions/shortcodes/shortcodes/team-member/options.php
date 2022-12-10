<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'psycheco' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'psycheco' ),
		'desc'  => esc_html__( 'Name of the person', 'psycheco' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'psycheco' ),
		'desc'  => esc_html__( 'Job title of the person.', 'psycheco' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'psycheco' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'psycheco' ),
		'type'  => 'textarea',
		'value' => ''
	),
	$icons_social->get_options(),
);