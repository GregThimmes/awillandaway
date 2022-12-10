<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );

$options = array(
	'icons'      => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Icons in list', 'psycheco' ),
		'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'psycheco' ),
		'desc'          => esc_html__( 'Add your icons with descriptions', 'psycheco' ),
		'template'      => '{{=text}}',
		'popup-options' => $icon->get_options(),
	),
	'list_style' => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Icons list style', 'psycheco' ),
		'desc'        => esc_html__( 'Select icon list style', 'psycheco' ),
		'choices'     => array(
			''  => esc_html__( 'Default', 'psycheco' ),
			'2' => esc_html__( 'Bordered', 'psycheco' ),
		),
		'no-validate' => false,
	),
);