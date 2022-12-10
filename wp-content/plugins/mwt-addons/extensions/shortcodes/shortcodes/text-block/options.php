<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'psycheco' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'psycheco' ),
		'reinit' => true,
		'teeny' => false,
	),
);
