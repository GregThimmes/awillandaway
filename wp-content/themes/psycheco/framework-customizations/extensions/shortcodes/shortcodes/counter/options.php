<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'counter_options' => array(
		'type'    => 'group',
		'options' => array(
			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'psycheco' ),
				'desc'  => esc_html__( 'Choose value to count to', 'psycheco' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'psycheco' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'psycheco' ),
			),
			'count_color'             => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Count text color', 'psycheco' ),
				'desc'    => esc_html__( 'Select a color for your text', 'psycheco' ),
				'choices' => array(
					''                 => esc_html__( 'Inherited', 'psycheco' ),
					'color-light'      => esc_html__( 'Light Color', 'psycheco' ),
					'color-main'       => esc_html__( 'Color Main', 'psycheco' ),
					'color-main2'      => esc_html__( 'Color Main 2', 'psycheco' ),
					'color-dark'       => esc_html__( 'Dark Color', 'psycheco' ),
					'color-grey-theme' => esc_html__( 'Grey Color', 'psycheco' ),
				),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'psycheco' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'psycheco' ),
			),
			'content'                 => array(
				'type'  => 'text',
				'label' => esc_html__( 'Content', 'psycheco' ),
				'desc'  => esc_html__( 'Enter the desired content', 'psycheco' ),
			),
			'text_align'              => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Text alignment', 'psycheco' ),
				'value'   => 'text-left',
				'choices' => array(
					'text-left'   => esc_html__( 'Left', 'psycheco' ),
					'text-center' => esc_html__( 'Center', 'psycheco' ),
					'text-right'  => esc_html__( 'Right', 'psycheco' ),
				),
			),
			'border'                  => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Border Type', 'psycheco' ),
				'value'   => '',
				'choices' => array(
					''             => esc_html__( 'Default', 'psycheco' ),
					'counter-border-left'  => esc_html__( 'Border Left', 'psycheco' ),
					'counter-border-right' => esc_html__( 'Border Right', 'psycheco' ),
				),
			),
		),
	),
	'link'            => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional teaser link', 'psycheco' ),
	),
	'class'           => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'psycheco' ),
	),
);