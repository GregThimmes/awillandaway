<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'number'        => array(
		'type'       => 'slider',
		'value'      => 6,
		'properties' => array(
			'min'  => 1,
			'max'  => 120,
			'step' => 1, // Set slider step. Always > 0. Could be fractional.
		
		),
		'label'      => esc_html__( 'Items number', 'psycheco' ),
		'desc'       => esc_html__( 'Number of posts to display', 'psycheco' ),
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
			'10' => esc_html__( '10px', 'psycheco' ),
			'30' => esc_html__( '30px', 'psycheco' ),
			'60' => esc_html__( '60px', 'psycheco' ),
		)
	),
	'layout'        => array(
		'label'   => esc_html__( 'Post Layout', 'psycheco' ),
		'desc'    => esc_html__( 'Choose post layout', 'psycheco' ),
		'value'   => 'carousel',
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
			'item-regular'  => esc_html__( 'Regular (just image)', 'psycheco' ),
			'item-regular2' => esc_html__( 'Regular 2 (just image)', 'psycheco' ),
			'item-title'    => esc_html__( 'Image with title', 'psycheco' ),
			'item-extended' => esc_html__( 'Image with title and excerpt', 'psycheco' ),
		)
	),
	'read_more'     => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'hide_read_more' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show Read More Button', 'psycheco' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'Hide', 'psycheco' ),
				),
				'right-choice' => array(
					'value' => 'read_more',
					'label' => esc_html__( 'Show', 'psycheco' ),
				),
			),
		),
		'choices' => array(
			''          => array(),
			'read_more' => array(
				'text' => array(
					'type'  => 'text',
					'label' => esc_html__( 'Read More Label', 'psycheco' ),
					'desc'  => esc_html__( 'This is the text that appears on your button', 'psycheco' ),
					'value' => esc_html__( 'Read More', 'psycheco' ),
				),
			),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Columns on large screens', 'psycheco' ),
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
	'dots'          => array(
		'type'         => 'switch',
		'value'        => 'true',
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
	'cat'           => array(
		'type'        => 'multi-select',
		'label'       => esc_html__( 'Select categories', 'psycheco' ),
		'desc'        => esc_html__( 'You can select one or more categories', 'psycheco' ),
		'population'  => 'taxonomy',
		'source'      => 'category',
		'prepopulate' => 10,
		'limit'       => 100,
	)
);