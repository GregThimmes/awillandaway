<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

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
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'psycheco' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'psycheco' ),
				'image'       => esc_html__( 'Featured image for your tab', 'psycheco' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'psycheco' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'psycheco' ),
				'set'   => 'theme-fa-icons',
			),
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