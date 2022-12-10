<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'psycheco' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'psycheco' ),
				'desc'  => esc_html__( 'Set image width', 'psycheco' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'psycheco' ),
				'desc'  => esc_html__( 'Set image height', 'psycheco' ),
				'value' => 200
			)
		)
	),
	'image2'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Second Image', 'psycheco' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' )
	),
	'size2'             => array(
		'type'    => 'group',
		'options' => array(
			'width2'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'psycheco' ),
				'desc'  => esc_html__( 'Set image width', 'psycheco' ),
				'value' => 300
			),
			'height2' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'psycheco' ),
				'desc'  => esc_html__( 'Set image height', 'psycheco' ),
				'value' => 200
			)
		)
	),
	'image_layout' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Second image to:', 'psycheco' ),
		'choices' => array(
			''           => esc_html__( 'Default', 'psycheco' ),
			'img-right'  => esc_html__( 'Right', 'psycheco' ),
			'img-left'   => esc_html__( 'Left', 'psycheco' ),
		),
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'psycheco' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'psycheco' )
			),
			'target' => array(
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
		)
	),
	'blob_effect' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Show Blob Animation', 'psycheco' ),
		'right-choice' => array(
			'value' => 'img-blob-effect',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
	),
	'class' => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Additional CSS class', 'psycheco' ),
	),
);

