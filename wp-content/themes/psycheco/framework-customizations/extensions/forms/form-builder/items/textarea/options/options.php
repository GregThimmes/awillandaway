<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'psycheco' ),
		'set'   => 'theme-fa-icons',
	),
	'rows_number' => array(
		'type' => 'short-text',
		'value' => '5',
		'label' => esc_html__( 'Number of rows', 'psycheco' ),
		'desc' => esc_html__( 'Select number of rows for textarea', 'psycheco' ),
	),
);