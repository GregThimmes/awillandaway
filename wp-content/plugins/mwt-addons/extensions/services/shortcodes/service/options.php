<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$post_type             = $ext_services_settings['post_type'];

$options = array(
	'service'          => array(
		'type'       => 'multi-select',
		'value'      => array(),
		'label'      => esc_html__( 'Service', 'mwt' ),
		'desc'       => esc_html__( 'Select service to display', 'mwt' ),
		'population' => 'posts',
		'source'     => $post_type,
		'limit'      => 1,
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background Color', 'psycheco' ),
		'desc'    => esc_html__( 'Select background color', 'psycheco' ),
		'help'    => esc_html__( 'Select one of predefined background types', 'psycheco' ),
		'choices' => psycheco_unyson_option_get_backgrounds_array(),
	),
	'image_right'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Show Image Right', 'psycheco' ),
		'value'        => '',
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'row-reverse',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
);