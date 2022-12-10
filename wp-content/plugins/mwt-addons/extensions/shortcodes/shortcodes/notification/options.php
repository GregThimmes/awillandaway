<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'psycheco' ),
		'desc'  => esc_html__( 'Notification message', 'psycheco' ),
		'type'  => 'textarea',
		'value' => esc_html__( 'Message!', 'psycheco' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'psycheco' ),
		'desc'    => esc_html__( 'Notification type', 'psycheco' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'psycheco' ),
			'info'    => esc_html__( 'Information', 'psycheco' ),
			'warning' => esc_html__( 'Alert', 'psycheco' ),
			'danger'  => esc_html__( 'Error', 'psycheco' ),
		)
	),
);