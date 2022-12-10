<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'psycheco' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'psycheco' ),
		'choices' => array(
			''            => esc_html__( 'Default', 'psycheco' ),
			'text-left'   => esc_html__( 'Left', 'psycheco' ),
			'text-center' => esc_html__( 'Center', 'psycheco' ),
			'text-right'  => esc_html__( 'Right', 'psycheco' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'psycheco' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'psycheco' ),
		'box-options' => array(
			'heading_icon' => array(
				'type'         => 'icon-v2',
				'preview_size' => 'medium',
				'modal_size'   => 'medium',
				'label'        => esc_html__( 'Optional icon', 'psycheco' ),
			),
			'heading_tag'  => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'psycheco' ),
				'desc'    => esc_html__( 'Select a tag for your', 'psycheco' ),
				'choices' => array(
					'h1' => esc_html__( 'H1 tag', 'psycheco' ),
					'h2' => esc_html__( 'H2 tag', 'psycheco' ),
					'h3' => esc_html__( 'H3 tag', 'psycheco' ),
					'h4' => esc_html__( 'H4 tag', 'psycheco' ),
					'h5' => esc_html__( 'H5 tag', 'psycheco' ),
					'h6' => esc_html__( 'H6 tag', 'psycheco' ),
					'p'  => esc_html__( 'p tag', 'psycheco' ),
				),
			),
			'big_font_size' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Big Font Size', 'psycheco' ),
				'desc'         => esc_html__( 'Increase font size for heading tag', 'psycheco' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'psycheco' ),
				),
				'right-choice' => array(
					'value' => 'tag-big',
					'label' => esc_html__( 'Yes', 'psycheco' ),
				),
			),
			'heading_text'           => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'psycheco' ),
				'desc'  => esc_html__( 'Text to appear in header', 'psycheco' ),
			),
			'heading_font_family' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading font family', 'psycheco' ),
				'desc'    => esc_html__( 'Select a font family for your text', 'psycheco' ),
				'choices' => array(
					''                     => esc_html__( 'Inherited', 'psycheco' ),
					'heading-font'         => esc_html__( 'Heading Font', 'psycheco' ),
					'body-font'            => esc_html__( 'Body Font', 'psycheco' ),
					'saint-delafield-font' => esc_html__( 'Mrs Saint Delafield', 'psycheco' ),
				),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'psycheco' ),
				'desc'    => esc_html__( 'Select a color for your text', 'psycheco' ),
				'choices' => array(
					''            => esc_html__( 'Inherited', 'psycheco' ),
					'color-light' => esc_html__( 'Light Color', 'psycheco' ),
					'color-main'  => esc_html__( 'Color Main', 'psycheco' ),
					'color-main2' => esc_html__( 'Color Main 2', 'psycheco' ),
					'color-main3' => esc_html__( 'Color Main 3', 'psycheco' ),
					'color-main4' => esc_html__( 'Color Main 4', 'psycheco' ),
					'color-dark'  => esc_html__( 'Dark Color', 'psycheco' ),
					'color-grey'  => esc_html__( 'Grey Color', 'psycheco' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => 'fw-600',
				'label'   => esc_html__( 'Heading text weight', 'psycheco' ),
				'desc'    => esc_html__( 'Select a weight for your text', 'psycheco' ),
				'choices' => array(
					'fw-100' => esc_html__( 'Thin', 'psycheco' ),
					'fw-300' => esc_html__( 'Light', 'psycheco' ),
					'fw-400' => esc_html__( 'Regular', 'psycheco' ),
					'fw-500' => esc_html__( 'Medium', 'psycheco' ),
					'fw-600' => esc_html__( 'Semi Bold', 'psycheco' ),
					'fw-700' => esc_html__( 'Bold', 'psycheco' ),
					'fw-900' => esc_html__( 'Black Bold', 'psycheco' ),
				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'psycheco' ),
				'desc'    => esc_html__( 'Select a weight for your text', 'psycheco' ),
				'choices' => array(
					''                => esc_html__( 'None', 'psycheco' ),
					'text-lowercase'  => esc_html__( 'Lowercase', 'psycheco' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'psycheco' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'psycheco' ),
				
				),
			),
			'heading_text_link'      => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading link', 'psycheco' ),
				'desc'  => esc_html__( 'Add a link to your special heading', 'psycheco' ),
			),
			'class' => array(
				'type'  => 'text',
				'label' => esc_html__('Enter your custom classes', 'psycheco'),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
