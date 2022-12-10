<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layout' => array(
		'label'   => esc_html__('Choose layout', 'psycheco'),
		'type'    => 'select',
		'value'   => 'accordion-default',
		'choices' => array(
			'accordion-default' => esc_html__('Background', 'psycheco'),
			'accordion-layout2' => esc_html__('Border', 'psycheco'),
			'accordion-layout4' => esc_html__('Shadow', 'psycheco'),
			'accordion-layout3' => esc_html__('Unstyled', 'psycheco'),
		),
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'psycheco' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'psycheco' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'psycheco' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'psycheco' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'psycheco' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'psycheco' ),
				'image'       => esc_html__( 'Image for your panel.', 'psycheco' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'psycheco' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'psycheco' ),
				'set'   => 'theme-fa-icons',
			),
		)
	),
	'id'   => array( 'type' => 'unique' ),
);