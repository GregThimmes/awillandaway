<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}

$ext_portfolio_settings = fw()->extensions->get( 'portfolio' )->get_settings();
$taxonomy = $ext_portfolio_settings['taxonomy_name'];

$options = array(
	'layout'        => array(
		'label'   => esc_html__( 'Portfolio Layout', 'psycheco' ),
		'desc'    => esc_html__( 'Choose projects layout', 'psycheco' ),
		'value'   => 'isotope',
		'type'    => 'select',
		'choices' => array(
			'carousel' => esc_html__( 'Carousel', 'psycheco' ),
			'isotope'  => esc_html__( 'Masonry Grid', 'psycheco' ),
		)
	),
	'item_layout'   => array(
		'label'   => esc_html__( 'Item layout', 'psycheco' ),
		'desc'    => esc_html__( 'Choose Item layout', 'psycheco' ),
		'value'   => 'item-regular',
		'type'    => 'select',
		'choices' => array(
			'item-regular'   => esc_html__( 'Regular (just image)', 'psycheco' ),
			'item-title'     => esc_html__( 'Image with title', 'psycheco' ),
			'item-extended'  => esc_html__( 'Image with title and excerpt', 'psycheco' ),
			'item-extended2' => esc_html__( 'Image with title and excerpt 2', 'psycheco' ),
		)
	),
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 120,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.

		),
		'label'      => esc_html__( 'Items number', 'psycheco' ),
		'desc'       => esc_html__( 'Number of portfolio projects tu display', 'psycheco' ),
	),
	'margin'        => array(
		'label'   => esc_html__( 'Horizontal item margin (px)', 'psycheco' ),
		'desc'    => esc_html__( 'Select horizontal item margin', 'psycheco' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'psycheco' ),
			'1'  => esc_html__( '1px', 'psycheco' ),
			'2'  => esc_html__( '2px', 'psycheco' ),
			'5'  => esc_html__( '5px', 'psycheco' ),
			'10' => esc_html__( '10px', 'psycheco' ),
			'30' => esc_html__( '30px', 'psycheco' ),
			'50' => esc_html__( '50px', 'psycheco' ),
			'60' => esc_html__( '60px', 'psycheco' ),
		)
	),
	'vertical_margin'        => array(
		'label'   => esc_html__( 'Vertical item margin (px)', 'psycheco' ),
		'desc'    => esc_html__( 'Select vertical item margin Masonry Grid', 'psycheco' ),
		'value'   => '30',
		'type'    => 'select',
		'choices' => array(
			'0'  => esc_html__( '0', 'psycheco' ),
			'1'  => esc_html__( '1px', 'psycheco' ),
			'2'  => esc_html__( '2px', 'psycheco' ),
			'5'  => esc_html__( '5px', 'psycheco' ),
			'10' => esc_html__( '10px', 'psycheco' ),
			'30' => esc_html__( '30px', 'psycheco' ),
			'50' => esc_html__( '50px', 'psycheco' ),
			'60' => esc_html__( '60px', 'psycheco' ),
		)
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on wide screens', 'psycheco' ),
		'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'psycheco' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'psycheco' ),
			'2' => esc_html__( '2', 'psycheco' ),
			'3' => esc_html__( '3', 'psycheco' ),
			'4' => esc_html__( '4', 'psycheco' ),
			'6' => esc_html__( '6', 'psycheco' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Columns on middle screens', 'psycheco' ),
		'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'psycheco' ),
		'value'   => '3',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'psycheco' ),
			'2' => esc_html__( '2', 'psycheco' ),
			'3' => esc_html__( '3', 'psycheco' ),
			'4' => esc_html__( '4', 'psycheco' ),
			'6' => esc_html__( '6', 'psycheco' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Columns on small screens', 'psycheco' ),
		'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'psycheco' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'psycheco' ),
			'2' => esc_html__( '2', 'psycheco' ),
			'3' => esc_html__( '3', 'psycheco' ),
			'4' => esc_html__( '4', 'psycheco' ),
			'6' => esc_html__( '6', 'psycheco' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Columns on extra small screens', 'psycheco' ),
		'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'psycheco' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'1' => esc_html__( '1', 'psycheco' ),
			'2' => esc_html__( '2', 'psycheco' ),
			'3' => esc_html__( '3', 'psycheco' ),
			'4' => esc_html__( '4', 'psycheco' ),
			'6' => esc_html__( '6', 'psycheco' ),
		)
	),
	'show_filters'  => array(
		'type'         => 'switch',
		'value'        => false,
		'label'        => esc_html__( 'Show filters', 'psycheco' ),
		'desc'         => esc_html__( 'Hide or show categories filters', 'psycheco' ),
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'loop'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Loop carousel', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Dots', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'nav'           => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Show Arrows', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'autoplay'      => array(
		'type'         => 'switch',
		'value'        => 'false',
		'label'        => esc_html__( 'Autoplay', 'psycheco' ),
		'left-choice'  => array(
			'value' => 'false',
			'label' => esc_html__( 'No', 'psycheco' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'psycheco' ),
		),
	),
	'cat' => array(
		'type'  => 'multi-select',
		'label' => esc_html__('Select categories', 'psycheco'),
		'desc'  => esc_html__('You can select one or more categories', 'psycheco'),
		'population' => 'taxonomy',
		'source' => $taxonomy,
		'prepopulate' => 100,
		'limit' => 100,
	)
);