<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tab_main_options' => array(
		'type' => 'tab',
		'title' => esc_html__('Main Options', 'psycheco'),
		'options' => array(
			'column_align'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Text alignment in column', 'psycheco' ),
				'desc'    => esc_html__( 'Select text alignment inside your column', 'psycheco' ),
				'choices' => array(
					''            => esc_html__( 'Inherit', 'psycheco' ),
					'text-left'   => esc_html__( 'Left', 'psycheco' ),
					'text-center' => esc_html__( 'Center', 'psycheco' ),
					'text-right'  => esc_html__( 'Right', 'psycheco' ),
				),
			),
			'column_padding'   => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Column padding', 'psycheco' ),
				'desc'    => esc_html__( 'Select optional internal column paddings', 'psycheco' ),
				'choices' => array(
					''     => esc_html__( 'No padding', 'psycheco' ),
					'p-10' => esc_html__( '10px', 'psycheco' ),
					'p-15' => esc_html__( '15px', 'psycheco' ),
					'p-20' => esc_html__( '20px', 'psycheco' ),
					'p-30' => esc_html__( '30px', 'psycheco' ),
					'p-40' => esc_html__( '40px', 'psycheco' ),
					'p-50' => esc_html__( '50px', 'psycheco' ),
					'p-60' => esc_html__( '60px', 'psycheco' ),
					'p-30 p-lg-90' => esc_html__( '90px', 'psycheco' ),
					'p-15 p-lg-60 p-xl-100' => esc_html__( '100px', 'psycheco' ),
				),
			),
			'background_color' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Background color', 'psycheco' ),
				'desc'    => esc_html__( 'Select background color', 'psycheco' ),
				'help'    => esc_html__( 'Select one of predefined background types', 'psycheco' ),
				'choices' => psycheco_unyson_option_get_backgrounds_array(),
			),
			'column_animation' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Animation type', 'psycheco' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'psycheco' ),
				'choices' => psycheco_unyson_option_animations(),
			),
			'column_additional_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Additional CSS class', 'psycheco' ),
				'desc'  => esc_html__( 'Add your custom CSS class to column. Useful for Customization', 'psycheco' ),
			),
		),
	),
	'tab_responsive' => array(
		'type' => 'tab',
		'title' => esc_html__('Responsive', 'psycheco'),
		'options' => array(
			'responsive_alignment' => array(
				'type' => 'tab',
				'title' => esc_html__('Alignment', 'psycheco'),
				'options' => array(
					'text_align_sm' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 576px screen', 'psycheco' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'psycheco' ),
							'text-sm-left'   => esc_html__( 'Left', 'psycheco' ),
							'text-sm-center' => esc_html__( 'Center', 'psycheco' ),
							'text-sm-right'  => esc_html__( 'Right', 'psycheco' ),
						),
					),
					'text_align_md' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 768px screen', 'psycheco' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'psycheco' ),
							'text-md-left'   => esc_html__( 'Left', 'psycheco' ),
							'text-md-center' => esc_html__( 'Center', 'psycheco' ),
							'text-md-right'  => esc_html__( 'Right', 'psycheco' ),
						),
					),
					'text_align_lg' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 992px screen', 'psycheco' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'psycheco' ),
							'text-lg-left'   => esc_html__( 'Left', 'psycheco' ),
							'text-lg-center' => esc_html__( 'Center', 'psycheco' ),
							'text-lg-right'  => esc_html__( 'Right', 'psycheco' ),
						),
					),
					'text_align_xl' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Text align above 1200px screen', 'psycheco' ),
						'choices' => array(
							''   => esc_html__( 'Inherit', 'psycheco' ),
							'text-xl-left'   => esc_html__( 'Left', 'psycheco' ),
							'text-xl-center' => esc_html__( 'Center', 'psycheco' ),
							'text-xl-right'  => esc_html__( 'Right', 'psycheco' ),
						),
					),
				),
			),
			'responsive_visibility' => array(
				'type' => 'tab',
				'title' => esc_html__('Visibility', 'psycheco'),
				'options' => psycheco_unyson_option_responsive_options_array(),
			),
		),
	),
);
