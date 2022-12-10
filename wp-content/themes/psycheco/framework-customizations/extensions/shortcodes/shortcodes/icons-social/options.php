<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-popup',
		'value' => array(
			array(
				'icon'       => 'fa fa-facebook',
				'icon_class' => 'border-ico',
				'icon_url'   => '#',
			),
		),
		'label'           => esc_html__( 'Social Buttons', 'psycheco' ),
		'desc'            => esc_html__( 'Optional social buttons appear in copyright section and header', 'psycheco' ),
		'template'        => '{{=icon}}',
		'popup-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'psycheco' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'psycheco' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'psycheco' ),
				'choices'     => array(
					''                                    => esc_html__( 'Default', 'psycheco' ),
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'psycheco' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'psycheco' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'psycheco' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'psycheco' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'psycheco' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'psycheco' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'psycheco' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'psycheco' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'psycheco' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'psycheco' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'psycheco' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '#',
				'label' => esc_html__( 'Icon Link', 'psycheco' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'psycheco' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'psycheco' ),
		'sortable'        => true,
	)
);