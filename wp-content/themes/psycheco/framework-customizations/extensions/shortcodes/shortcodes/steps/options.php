<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$icon           = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );

$options = array(
	'steps' => array(
		'type'            => 'addable-popup',
		'value'           => '',
		'label'           => esc_html__( 'Steps', 'psycheco' ),
		'popup-options'   => array(
			'icon'             => array(
				'type'  => 'icon-v2',
				'label' => esc_html__( 'Choose an Icon', 'psycheco' ),
			),
			'icon_style'       => array(
				'type'    => 'image-picker',
				'value'   => '',
				'label'   => esc_html__( 'Icon Style', 'psycheco' ),
				'desc'    => esc_html__( 'Select one of predefined icon styles.', 'psycheco' ),
				'choices' => array(
					''                 => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/1.png',
					'bordered'         => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/2.png',
					'rounded bordered' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/3.png',
					'round bordered'   => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/4.png',
					'bg-'              => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/5.png',
					'rounded bg-'      => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/6.png',
					'round bg-'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon-box/static/img/7.png',
				),
				'blank'   => false,
			),
			'icon_color'       => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Icon color', 'psycheco' ),
				'value'   => 'color-main',
				'choices' => array(
					'color-light' => esc_html__( 'Light', 'psycheco' ),
					'color-grey'  => esc_html__( 'Grey', 'psycheco' ),
					'color-dark'  => esc_html__( 'Dark', 'psycheco' ),
					'color-main'  => esc_html__( 'Accent', 'psycheco' ),
					'color-main2' => esc_html__( 'Accent 2', 'psycheco' ),
					'color-main3' => esc_html__( 'Accent 3', 'psycheco' ),
					'color-main4' => esc_html__( 'Accent 4', 'psycheco' ),
				),
			),
			'icon_font_size'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Icon Font Size', 'psycheco' ),
				'value'   => 'fs-20',
				'choices' => array(
					''      => esc_html__( 'Inherit', 'psycheco' ),
					'fs-12' => esc_html__( '12px', 'psycheco' ),
					'fs-14' => esc_html__( '14px', 'psycheco' ),
					'fs-16' => esc_html__( '16px', 'psycheco' ),
					'fs-18' => esc_html__( '18px', 'psycheco' ),
					'fs-20' => esc_html__( '20px', 'psycheco' ),
					'fs-24' => esc_html__( '24px', 'psycheco' ),
					'fs-28' => esc_html__( '28px', 'psycheco' ),
					'fs-30' => esc_html__( '30px', 'psycheco' ),
					'fs-36' => esc_html__( '36px', 'psycheco' ),
					'fs-40' => esc_html__( '40px', 'psycheco' ),
					'fs-50' => esc_html__( '50px', 'psycheco' ),
					'fs-56' => esc_html__( '56px', 'psycheco' ),
				),
			),
			'title'            => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title of the Box', 'psycheco' ),
			),
			'content'          => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'psycheco' ),
				'desc'  => esc_html__( 'Enter the desired content', 'psycheco' ),
			),
			'link'             => array(
				'type'  => 'text',
				'label' => esc_html__( 'Optional teaser link', 'psycheco' ),
			),
			'class'            => array(
				'type'  => 'text',
				'label' => esc_html__( 'Optional additional CSS class', 'psycheco' ),
			),
			'button'           => array(
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
			)
		),
		'template'        => '{{-title }}',
		'limit'           => 4, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'psycheco' ),
	),
);