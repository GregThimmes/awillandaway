<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'psycheco' ),
		'set'   => 'theme-fa-icons',
	),
	'icon_style' => array(
		'type'    => 'image-picker',
		'value'   => '',
		'label'   => esc_html__( 'Icon Style', 'psycheco' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'psycheco' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'psycheco' ),
		'choices' => array(
			'' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'color-darkgrey' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'color-main' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
			'color-main2' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_04.png',
			'color-main3' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_05.png',
		),

		'blank' => false, // (optional) if true, images can be deselected
	),
	'icon_font_size' => array(
		'type'    => 'select',
		'label'   => esc_html__('Icon Font Size', 'psycheco'),
		'value'   => 'fs-20',
		'choices' => array(
			'' => esc_html__('Inherit', 'psycheco'),
			'fs-12' => esc_html__('12px', 'psycheco'),
			'fs-14' => esc_html__('14px', 'psycheco'),
			'fs-16' => esc_html__('16px', 'psycheco'),
			'fs-18' => esc_html__('18px', 'psycheco'),
			'fs-20' => esc_html__('20px', 'psycheco'),
			'fs-24' => esc_html__('24px', 'psycheco'),
			'fs-30' => esc_html__('30px', 'psycheco'),
			'fs-37' => esc_html__('37px', 'psycheco'),
			'fs-40' => esc_html__('40px', 'psycheco'),
			'fs-50' => esc_html__('50px', 'psycheco'),
			'fs-56' => esc_html__('56px', 'psycheco'),
		),
	),
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'psycheco' ),
		'desc'  => esc_html__( 'Title near icon', 'psycheco' ),
	),
	'text'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Text', 'psycheco' ),
		'desc'  => esc_html__( 'Text near title', 'psycheco' ),
	),
	'class'       => array(
		'type'  => 'text',
		'label' => esc_html__( 'Optional additional CSS class', 'psycheco' ),
	),
);