<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );
unset( $button_options['class'] );

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'psycheco' ),
		'options' => array(
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
					'item-regular'  => esc_html__( 'Regular (just image)', 'psycheco' ),
					'item-title'    => esc_html__( 'Image with title', 'psycheco' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'psycheco' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'psycheco' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'psycheco' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'psycheco' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'psycheco' ),
				),
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
				)
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
			'button' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'value'   => false,
				'picker'  => array(
					'show_button' => array(
						'type'         => 'switch',
						'label'        => esc_html__( 'Show button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__( 'No', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => 'button',
							'label' => esc_html__( 'Yes', 'psycheco' ),
						),
					),
				),
				'choices' => array(
					''       => array(),
					'button' => $button_options,
				),
			),
			'items_per_page' => array(
				'type'  => 'select',
				'value' => '12',
				'label' => esc_html__( 'Items Per Page', 'psycheco' ),
				'choices' => array(
					'2' =>  esc_html__('2 Items', 'psycheco'),
					'3' =>  esc_html__('3 Items', 'psycheco'),
					'4' =>  esc_html__('4 Items', 'psycheco'),
					'6' =>  esc_html__('6 Items', 'psycheco'),
					'8' =>  esc_html__('8 Items', 'psycheco'),
					'9' =>  esc_html__('9 Items', 'psycheco'),
					'12' =>  esc_html__('12 Items', 'psycheco'),
					'16' =>  esc_html__('16 Items', 'psycheco'),
					'24' =>  esc_html__('24 Items', 'psycheco'),
					'30' =>  esc_html__('30 Items', 'psycheco'),
					'40' =>  esc_html__('40 Items', 'psycheco'),
					'50' =>  esc_html__('50 Items', 'psycheco'),
				),
			)

		)
	)
);