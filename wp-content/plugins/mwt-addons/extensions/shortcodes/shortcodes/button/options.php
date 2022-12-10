<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'psycheco' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'psycheco' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'psycheco' ),
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'psycheco' ),
		'desc'  => esc_html__( 'Where should your button link to', 'psycheco' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'psycheco' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'psycheco' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'psycheco' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'psycheco' ),
		'value'   => 'btn btn-maincolor',
		'type'    => 'select',
		'choices' => array(
			'btn btn-maincolor'          => esc_html__( 'Main Color', 'psycheco' ),
			'btn btn-maincolor2'         => esc_html__( 'Main Color2 ', 'psycheco' ),
			'btn btn-maincolor3'         => esc_html__( 'Main Color3 ', 'psycheco' ),
			'btn btn-dark'               => esc_html__( 'Dark Color', 'psycheco' ),
			'btn btn-outline-maincolor'  => esc_html__( 'Outline Main Color', 'psycheco' ),
			'btn btn-outline-maincolor2' => esc_html__( 'Outline Main Color 2', 'psycheco' ),
			'btn btn-outline-maincolor3' => esc_html__( 'Outline Main Color 3', 'psycheco' ),
			'btn btn-outline-dark'       => esc_html__( 'Dark Outline Color', 'psycheco' ),
			'btn-link'                   => esc_html__( 'Simple Link', 'psycheco' ),
		)
	),
	'size'        => array(
		'label'   => esc_html__( 'Button Size', 'psycheco' ),
		'desc'    => esc_html__( 'Choose a size for your button', 'psycheco' ),
		'value'   => 'btn-medium',
		'type'    => 'select',
		'choices' => array(
			'btn-small'  => esc_html__( 'Button Small', 'psycheco' ),
			'btn-medium' => esc_html__( 'Button Medium', 'psycheco' ),
			'btn-big'    => esc_html__( 'Button Big', 'psycheco' ),
		)
	),
	'wide_button' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Wide Button', 'psycheco' ),
		'desc'         => esc_html__( 'Switch to create wider button', 'psycheco' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'btn-wide',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'class'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'psycheco' ),
	),
);