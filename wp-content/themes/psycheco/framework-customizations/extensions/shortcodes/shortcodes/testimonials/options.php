<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'               => array(
		'label' => esc_html__( 'Title', 'psycheco' ),
		'desc'  => esc_html__( 'Optional Testimonials Title', 'psycheco' ),
		'type'  => 'text',
	),
	'layout' => array(
		'label'   => esc_html__('Choose testimonials layout', 'psycheco'),
		'type'    => 'select',
		'value'   => '1',
		'choices' => array(
			'1'  => esc_html__('Default', 'psycheco'),
			'2' => esc_html__('Second', 'psycheco'),
			'3' => esc_html__('Third', 'psycheco'),
		),
	),
	'testimonials'        => array(
		'label'         => esc_html__( 'Testimonials', 'psycheco' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'psycheco' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'psycheco' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'content'       => array(
				'label' => esc_html__( 'Quote', 'psycheco' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'psycheco' ),
				'type'  => 'textarea',
			),
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'psycheco' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'psycheco' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'psycheco' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'psycheco' ),
				'type'  => 'text'
			),
			'author_job'    => array(
				'label' => esc_html__( 'Position', 'psycheco' ),
				'desc'  => esc_html__( 'Can be used for a job description', 'psycheco' ),
				'type'  => 'text'
			),
			'site_name'     => array(
				'label' => esc_html__( 'Website Name', 'psycheco' ),
				'desc'  => esc_html__( 'Linktext for the above Link', 'psycheco' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'psycheco' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'psycheco' ),
				'type'  => 'text'
			),
			'quote_date'      => array(
				'label' => esc_html__( 'Date', 'psycheco' ),
				'type'  => 'text'
			)
		)
	)
);