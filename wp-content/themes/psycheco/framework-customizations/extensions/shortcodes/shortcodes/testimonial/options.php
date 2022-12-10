<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
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
	'hide_quotes' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Hide Quotes', 'psycheco'),
		'left-choice' => array(
			'value' => 'show-quotes',
			'label' => esc_html__('Show', 'psycheco'),
		),
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__('Hide', 'psycheco'),
		),
	),
);