<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'  => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'psycheco' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' )
	),
	'url'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Insert Video URL', 'psycheco' ),
		'desc'  => esc_html__( 'Insert Video URL to embed this video', 'psycheco' )
	),
	'width'  => array(
		'type'  => 'text',
		'label' => esc_html__( 'Video Width', 'psycheco' ),
		'desc'  => esc_html__( 'Enter a value for the width', 'psycheco' ),
		'value' => 300
	),
	'height' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Video Height', 'psycheco' ),
		'desc'  => esc_html__( 'Enter a value for the height', 'psycheco' ),
		'value' => 200
	)
);
