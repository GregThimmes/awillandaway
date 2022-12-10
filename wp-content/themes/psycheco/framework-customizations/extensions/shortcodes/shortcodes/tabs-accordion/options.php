<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

//get accordion to add in tab:
$accordion_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'accordion' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'psycheco' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'psycheco' ),
		'desc'          => esc_html__( 'Create your tabs', 'psycheco' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'psycheco' )
			),
			'tab_subtitle'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Sub Title', 'psycheco' )
			),
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon', 'psycheco' ),
				'set'   => 'theme-fa-icons',
			),
			'icon_color' => array(
				'type'    => 'select',
				'label'   => esc_html__('Icon color', 'psycheco'),
				'value' => 'color-main',
				'choices' => array(
					'color-darkgrey' => esc_html__('Darkgrey', 'psycheco'),
					'color-main' => esc_html__('Accent', 'psycheco'),
					'color-main2' => esc_html__('Accent second', 'psycheco'),
				),
			),
			$accordion_shortcode->get_options(),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'psycheco' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'psycheco' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);