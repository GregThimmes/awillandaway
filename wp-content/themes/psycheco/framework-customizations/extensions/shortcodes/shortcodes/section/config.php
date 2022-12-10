<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__( 'Layout Elements', 'psycheco' ),
		'title'       => esc_html__( 'Section', 'psycheco' ),
		'description' => esc_html__( 'Add a Section', 'psycheco' ),
		'title_template' => '{{ if (!o.section_name) { }} {{- title}} {{ } }} {{ if (o.section_name) { }} {{- o.section_name}} {{ } }}',
		'type'        => 'section', // WARNING: Do not edit this
	)
);