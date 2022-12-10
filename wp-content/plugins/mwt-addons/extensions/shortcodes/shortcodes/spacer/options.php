<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$dividers_height = array( '-10', '-30', '-50', '-80', '-100', '0', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60','65', '70', '80', '90', '95', '100', '105', '120', '125', '140', '145' );

$breakpoints = array( 'sm', 'md', 'lg', 'xl' );

$choices = array( '' => '-' );
foreach ( $dividers_height as $height ) {
	$choices[$height] = $height . esc_html__( 'px', 'psycheco' );
}

$height_options = array(
	'all' => array(
		'type' => 'select',
		'value' => '',
		'label' => esc_html__( 'Height', 'psycheco' ),
		'choices' => $choices,
	)
);

foreach ( $breakpoints as $breakpoint) {
	$choices = array( '' => '-' );
	foreach ( $dividers_height as $height ) {
		$choices[$height] = $height . esc_html__( 'px', 'psycheco' );
	}
	$height_options[$breakpoint] = array(
		'type' => 'select',
		'value' => '',
		'label' => esc_html__( 'Height on ', 'psycheco' ) . strtoupper( $breakpoint ) . esc_html__( ' screens', 'psycheco' ),
		'choices' => $choices,
	);
}

$options = array_merge( array(
	'unique_id' => array(
		'type' => 'unique',
		'length' => 7
	),
), $height_options );
