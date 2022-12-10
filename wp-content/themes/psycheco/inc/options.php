<?php

//Main theme options class
class Psycheco_Options {
	public $self;
	public $customizer_options;
	public $default_fonts_array;
	
	public function __construct() {
		
		//singleton
		if( $this->self ) {
			return $this->self;
		} else {
			$this->self = $this;
		}
		
		//set default fonts property
		$this->default_fonts_array = $this->set_default_fonts_array();
		
		//all customizer options here
		//default values needs for theme without unyson istalled
		$default_options = $this->get_default_options_array();
		$customizer_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option() : array();
		
		//additional option array keys that we are using in theme for check
		//if Unyson installed
		$customizer_options['fw'] = defined( 'FW' ) ? true : false;
		//if WooCommerce installed
		$customizer_options['woo'] = class_exists( 'WooCommerce' ) ? true : false;
		
		//customizer options overwriting default options
		$this->customizer_options = wp_parse_args( $customizer_options, $default_options );
	}
	
	//get option value from whole options array
	public function get_customizer_option( $option_name, $default_value = '' ) {
		return ( !empty( $this->customizer_options[$option_name] ) ) ? $this->customizer_options[$option_name] : $default_value;
	}
	
	//theme default fonts for include
	public function set_default_fonts_array() {
		//put default google fonts here
		return array(
			'Lato' => array(
				'google_font'    => true,
				'subset'         => 'latin',
				'variation'      => '400',
				'variants'       => array( '100', '300', '400', '700', '900' ),
				'family'         => 'Lato',
				'style'          => false,
				'weight'         => false,
				'size'           => '16',
				'line-height'    => '26',
				'letter-spacing' => '0',
				'color'          => false,
			),
			'Playfair Display' => array(
				'google_font'    => true,
				'subset'         => 'latin-ext',
				'variation'      => '400',
				'variants'       => array( '400', '500', '600', '700', '900' ),
				'family'         => 'Playfair Display',
				'style'          => false,
				'weight'         => false,
				'size'           => '16',
				'line-height'    => '24',
				'letter-spacing' => '0',
				'color'          => false,
			),
			'Mrs Saint Delafield' => array(
				'google_font'    => true,
				'subset'         => 'latin',
				'variation'      => '400',
				'variants'       => array( '400' ),
				'family'         => 'Mrs Saint Delafield',
				'style'          => false,
				'weight'         => false,
				'size'           => '16',
				'line-height'    => '24',
				'letter-spacing' => '0',
				'color'          => false,
			),
			'Poppins' => array(
				'google_font'    => true,
				'subset'         => 'latin',
				'variants'       => array( '900' ),
				'family'         => 'Poppins',
				'color'          => false,
			),
		);
	}
	
	//theme default configuration options
	public function get_default_options_array() {
		return array (
			'logo_image' =>
				array (
					'attachment_id' => '4225',
					'url' =>  PSYCHECO_THEME_URI . '/img/logo.png',
				),
			'logo_text' => 'PsycheCo',
			'logo_image_breadcrumbs' =>
				array (
				),
			'page_header' => '4',
			'header_absolute' =>
				array (
					'enabled' => '',
					'yes' =>
						array (
							'header_absolute_background_color' => 'ls',
							'header_absolute_background_image' => '',
						),
				),
			'header_is_fluid' => true,
			'header_background_color' => 'ls',
			'header_background_image' => '',
			'header_background_cover' => false,
			'header_parallax' => false,
			'header_background_overlay' => false,
			'header_background_gradientradial' => false,
			'header_border_top' => '',
			'header_border_bottom' => '',
			'header_section_class' => '',
			'header_section_id' => '',
			'topline_is_fluid' => true,
			'topline_background_color' => 'ls ms',
			'topline_background_image' => '',
			'topline_background_cover' => false,
			'topline_parallax' => false,
			'topline_background_overlay' => false,
			'topline_background_gradientradial' => false,
			'topline_border_top' => '',
			'topline_border_bottom' => '',
			'topline_section_class' => '',
			'topline_section_id' => '',
			'toplogo_is_fluid' => false,
			'toplogo_background_color' => 'ls',
			'toplogo_background_image' => '',
			'toplogo_background_cover' => false,
			'toplogo_parallax' => false,
			'toplogo_background_overlay' => false,
			'toplogo_background_gradientradial' => false,
			'toplogo_border_top' => '',
			'toplogo_border_bottom' => 's-borderbottom',
			'toplogo_section_class' => '',
			'toplogo_section_id' => '',
			'page_title' => '1',
			'hide_term_title' => true,
			'title_is_fluid' => false,
			'title_background_color' => 'ds',
			'title_top_padding' => 's-pt-25',
			'title_bottom_padding' => 's-pb-25',
			'title_background_image' => '',
			'title_background_cover' => true,
			'title_parallax' => false,
			'title_background_overlay' => false,
			'title_background_gradientradial' => false,
			'title_border_top' => '',
			'title_border_bottom' => '',
			'title_section_class' => '',
			'title_section_id' => '',
			'page_footer' => '1',
			'footer_is_fluid' => false,
			'footer_background_color' => 'ds',
			'footer_top_padding' => 's-pt-50',
			'footer_bottom_padding' => 's-pb-0',
			'footer_columns_padding' => 'c-gutter-50',
			'footer_columns_vertical_margins' => '',
			'footer_background_image' => '',
			'footer_background_cover' => false,
			'footer_parallax' => false,
			'footer_background_overlay' => false,
			'footer_background_gradientradial' => false,
			'footer_border_top' => '',
			'footer_border_bottom' => '',
			'footer_is_align_vertical' => false,
			'footer_section_class' => '',
			'footer_section_id' => '',
			'page_copyright' => '1',
			'copyright_text' => '© COPYRIGHT 2021 ALL RIGHTS RESERVED',
			'copyright_is_fluid' => false,
			'copyright_background_color' => 'ds',
			'copyright_top_padding' => 's-pt-30',
			'copyright_bottom_padding' => 's-pb-30',
			'copyright_columns_padding' => '',
			'copyright_columns_vertical_margins' => '',
			'copyright_background_image' => '',
			'copyright_background_cover' => false,
			'copyright_parallax' => false,
			'copyright_background_overlay' => false,
			'copyright_background_gradientradial' => false,
			'copyright_border_top' => 's-bordertop',
			'copyright_border_bottom' => '',
			'copyright_is_align_vertical' => false,
			'copyright_section_class' => '',
			'copyright_section_id' => '',
			'body_font_picker_switch' =>
				array (
					'main_font_enabled' => '',
					'main_font_options' =>
						array (
							'main_font' =>
								array (
									'google_font' => true,
									'subset' => 'latin-ext',
									'variation' => 'regular',
									'family' => 'Roboto',
									'style' => false,
									'weight' => false,
									'size' => 14,
									'line-height' => 24,
									'letter-spacing' => 0,
									'color' => false,
								),
						),
				),
			'h_font_picker_switch' =>
				array (
					'h_font_enabled' => '',
					'h_font_options' =>
						array (
							'h_font' =>
								array (
									'google_font' => true,
									'subset' => 'latin-ext',
									'variation' => 'regular',
									'family' => 'Roboto',
									'style' => false,
									'weight' => false,
									'size' => false,
									'line-height' => false,
									'letter-spacing' => 0,
									'color' => false,
								),
						),
				),
			'social_icons' =>
				array (
					0 =>
						array (
							'icon' => 'fa fa-facebook',
							'icon_class' => 'color-icon',
							'icon_url' => 'https://www.facebook.com/',
						),
					1 =>
						array (
							'icon' => 'fa fa-twitter',
							'icon_class' => 'color-icon',
							'icon_url' => 'https://twitter.com/',
						),
					2 =>
						array (
							'icon' => 'fa fa-instagram',
							'icon_class' => 'color-icon',
							'icon_url' => 'https://instagram.com/',
						),
					3 =>
						array (
							'icon' => 'fa fa-linkedin',
							'icon_class' => 'color-icon',
							'icon_url' => 'https://linkedin.com',
						),
					4 =>
						array (
							'icon' => 'fa fa-youtube-play',
							'icon_class' => 'color-icon',
							'icon_url' => 'https://youtube.com/',
						),
				),
			'layout' =>
				array (
					'boxed' => '',
					'boxed_options' =>
						array (
							'body_background_image' => '',
							'body_cover' => '',
							'boxed_extra_margins' => '',
						),
				),
			'version' => 'ls',
			'color_scheme_number' => '',
			'colorMain' => '#31b3b3',
			'colorMain2' => '#F69732',
			'colorMain3' => '#DE2F5F',
			'colorMain4' => '#7968ac',
			'darkgreyColor' => '#323232',
			'darkColor' => '#444444',
			'greyColor' => '#f5f5f5',
			'fontColor' => '#808080',
			'blog_slider_switch' =>
				array (
					'blog_slider_enabled' => 'yes',
					'yes' =>
						array (
							'slider_id' => '4550',
						),
				),
			'blog_posts_widget_switch' => 'yes',
			'preloader' =>
				array (
					'preloader_type' => 'image_custom',
					'css' =>
						array (
							'options' => 'css',
						),
					'image' =>
						array (
							'options' => 'image',
						),
					'image_custom' =>
						array (
							'options' =>
								array (
									'attachment_id' => '4591',
									'url' =>  PSYCHECO_THEME_URI . '/img/Preloader1.gif',
								),
						),
					'disabled' =>
						array (
							'options' => '',
						),
				),
			'preloader_custom_class' => '',
			'meta_address' => '',
			'copyright_text2' => 'Theme: Psycheco',
			'copyright_logo' => '',
			'blog_layout' => '1',
			'blog_hide_categories' => false,
			'blog_hide_author' => false,
			'blog_hide_date' => false,
			'blog_hide_comments_link' => false,
			'logo_image_inverse' =>
				array (
					'attachment_id' => '4225',
					'url' =>  PSYCHECO_THEME_URI . '/img/logo.png',
				),
			'404_background_color' => 'ls',
			'404_background_image' =>
				array (
					'type' => 'custom',
					'custom' => '4505',
					'predefined' => '',
					'data' =>
						array (
							'icon' => PSYCHECO_THEME_URI . '/img/404-bg.jpg',
							'css' =>
								array (
									'background-image' => PSYCHECO_THEME_URI . '/img/404-bg.jpg")',
								),
						),
				),
			'404_background_overlay' => false,
			'404_top_padding_lg' => '',
			'404_bottom_padding_lg' => '',
			'blog_hide_tags' => false,
			'share_facebook' => '1',
			'footer_top_padding_lg' => '',
			'footer_bottom_padding_lg' => '',
			'footer_top_padding_xl' => '',
			'footer_bottom_padding_xl' => '',
			'404_top_padding' => 's-pt-100',
			'404_bottom_padding' => 's-pb-100',
			'title_top_padding_lg' => 's-pt-lg-40',
			'title_bottom_padding_lg' => 's-pb-lg-55',
			'title_top_padding_xl' => '',
			'header_show_all_menu_items' => false,
			'header_disable_affix_xl' => false,
			'header_disable_affix_xs' => false,
			'topline_is_content_between' => false,
			'toplogo_is_content_between' => false,
			'title_is_content_between' => false,
			'title_horizontal_padding' => '',
			'title_top_padding_sm' => '',
			'title_bottom_padding_sm' => '',
			'title_top_padding_md' => '',
			'title_bottom_padding_md' => '',
			'title_bottom_padding_xl' => '',
			'footer_is_content_between' => false,
			'footer_horizontal_padding' => '',
			'footer_top_padding_sm' => 's-pt-sm-75',
			'footer_bottom_padding_sm' => 's-pb-sm-25',
			'footer_top_padding_md' => 's-pt-md-90',
			'footer_bottom_padding_md' => 's-pb-md-40',
			'copyright_is_content_between' => false,
			'copyright_horizontal_padding' => '',
			'copyright_top_padding_sm' => '',
			'copyright_bottom_padding_sm' => '',
			'copyright_top_padding_md' => '',
			'copyright_bottom_padding_md' => '',
			'copyright_top_padding_lg' => '',
			'copyright_bottom_padding_lg' => '',
			'copyright_top_padding_xl' => '',
			'copyright_bottom_padding_xl' => '',
			'404_is_fluid' => false,
			'404_background_cover' => true,
			'404_parallax' => false,
			'404_background_gradientradial' => false,
			'404_border_top' => '',
			'404_border_bottom' => '',
			'404_is_content_between' => false,
			'404_section_class' => '',
			'404_section_id' => '',
			'404_horizontal_padding' => '',
			'404_top_padding_sm' => '',
			'404_bottom_padding_sm' => '',
			'404_top_padding_md' => '',
			'404_bottom_padding_md' => '',
			'404_top_padding_xl' => 's-pt-xl-120',
			'404_bottom_padding_xl' => 's-pb-xl-140',
			'share_twitter' => '1',
			'share_google_plus' => '1',
			'share_pinterest' => '1',
			'share_linkedin' => '1',
			'share_tumblr' => '1',
			'share_reddit' => '1',
			'logo_subtext' => '',
			'post_hide_tags' => false,
			'error_text' => 'SORRY, PAGE NOT FOUND!',
			'404_button_label' => 'Go Home',
			'blog_hide_read_more' =>
				array (
					'hide_read_more' => 'read_more',
					'read_more' =>
						array (
							'text' => 'Read More',
						),
				),
			'back_button_label' => 'Go Back',
			'header_buttons' =>
				array (
					0 =>
						array (
							'label' => 'Book an Appointment',
							'link' => '#',
							'target' => '_self',
							'color' => 'btn btn-outline-maincolor',
							'wide_button' => '',
							'class' => '',
						),
				),
			'topline-icons' =>
				array (
					0 =>
						array (
							'icon' => 'fa fa-phone',
							'icon_style' => 'color-main',
							'icon_font_size' => 'fs-14',
							'title' => '1-888-123-45',
							'text' => '',
						),
					1 =>
						array (
							'icon' => 'fa fa-map-marker',
							'icon_style' => 'color-main2',
							'icon_font_size' => 'fs-14',
							'title' => '1263 SHEILA LANE, RENO, NV 89501 ',
							'text' => '',
						),
					2 =>
						array (
							'icon' => 'fa fa-envelope',
							'icon_style' => 'color-main3',
							'icon_font_size' => 'fs-14',
							'title' => ' PSYCHECO@EXAMPLE.COM',
							'text' => '',
						),
				),
			'404_image' =>
				array (
					'attachment_id' => '4503',
					'icon' => PSYCHECO_THEME_URI . '/img/404.jpg',
				),
			'search_text' => 'You can search what interested:',
		);
	}
}


///////////////////
//options helpers//
///////////////////
if ( !function_exists( 'psycheco_get_options' ) ) :
	/**
	 * Get all theme options in one array
	 * @return array
	 */
	function psycheco_get_options() {
		$options = new Psycheco_Options();
		$options = $options->customizer_options;
		return $options;
	}
endif; //psycheco_get_options

if ( !function_exists( 'psycheco_get_option' ) ) :
	/**
	 * Get single option
	 * @param $option_name
	 * @param string $default_value
	 *
	 * @return mixed|string
	 */
	function psycheco_get_option( $option_name, $default_value = '' ) {
		$options = new Psycheco_Options();
		$option_value = $options->get_customizer_option( $option_name, $default_value );
		return $option_value;
	}
endif; //psycheco_get_option


if ( !function_exists( 'psycheco_get_default_section_option_value' ) ) :
	/**
	 * Get default section option value for customizer options
	 * used in psycheco_get_section_options_array
	 * @param string $option_name
	 * @param string $default_value
	 *
	 * @return mixed|string
	 */
	function psycheco_get_default_section_option_value( $option_name, $default_value = '' ) {
		$options_class = new Psycheco_Options();
		$defaults = $options_class->get_default_options_array();
		$option_value = ( !empty ( $defaults[$option_name] ) ) ? $defaults[$option_name] : $default_value;
		return $option_value;
	}
endif; //psycheco_get_default_section_option_value

if ( !function_exists( 'psycheco_get_switch_option_type' ) ) :
	function psycheco_get_switch_option_type( $switch_array, $option_name, $value = false ) {
		$value = psycheco_get_default_section_option_value( $option_name, $value );
		
		return array_merge($switch_array, array(
			'value' => $value,
			'left-choice' => array(
				'value' => false,
				'label' => esc_html__('No', 'psycheco'),
				'color' => '', // #HEX
			),
			'right-choice' => array(
				'value' => true,
				'label' => esc_html__('Yes', 'psycheco'),
				'color' => '', // #HEX
			),
		) );
	}
endif; //psycheco_get_switch_option_type

//check if header absolute enabled
if ( ! function_exists( 'psycheco_check_header_absolute_enabled' ) ) :
	
	function psycheco_check_header_absolute_enabled() {
		$options = psycheco_get_options();
		if( $options['header_absolute']['enabled'] == 'yes' ) {
			return false;
		} else {
			return true;
		}
	}

endif;

//section options array for any section
if ( !function_exists( 'psycheco_get_section_options_array' ) ) :
	/**
	 * Get any section options
	 * @param string $prefix
	 * @param array $excluded_keys
	 *
	 * @return array
	 */
	function psycheco_get_section_options_array( $prefix = '', $excluded_keys = array() ) {
		
		$psycheco_check_header_absolute_enabled = ( 'header_' == $prefix ) ? 'psycheco_check_header_absolute_enabled' : '__return_true';
		
		
		$options = array(
			$prefix . 'is_fluid' => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Full Width', 'psycheco' ),
				'type'  => 'switch',
			), $prefix . 'is_fluid'
			),
			$prefix . 'background_color' => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'background_color', 'ls' ),
				'label'   => esc_html__( 'Background color', 'psycheco' ),
				'help'    => esc_html__( 'Select one of predefined background colors',
					'psycheco' ),
				'choices' => array(
					'ls'     => esc_html__( 'Light', 'psycheco' ),
					'ls ms'  => esc_html__( 'Light Grey', 'psycheco' ),
					'ds'     => esc_html__( 'Dark Grey', 'psycheco' ),
					'ds ms'  => esc_html__( 'Dark Muted', 'psycheco' ),
					'cs'     => esc_html__( 'Main Color', 'psycheco' ),
					'cs cs2'     => esc_html__( 'Second Color', 'psycheco' ),
				),
				'wp-customizer-args' => array(
					'active_callback' => $psycheco_check_header_absolute_enabled,
				),
			),
			
			$prefix . 'columns_padding'  => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value($prefix . 'columns_padding', '' ),
				'label'   => esc_html__( 'Columns gutter (padding)', 'psycheco' ),
				'help'    => esc_html__( 'Choose columns horizontal padding value (gutter)',
					'psycheco' ),
				'choices' => array(
					'' => esc_html__( 'Inherited - default', 'psycheco' ),
					'c-gutter-0'  => esc_html__( '0', 'psycheco' ),
					'c-gutter-1'  => esc_html__( '1px', 'psycheco' ),
					'c-gutter-2'  => esc_html__( '2px', 'psycheco' ),
					'c-gutter-5'  => esc_html__( '5px', 'psycheco' ),
					'c-gutter-10' => esc_html__( '10px', 'psycheco' ),
					'c-gutter-20' => esc_html__( '20px', 'psycheco' ),
					'c-gutter-25' => esc_html__( '25px', 'psycheco' ),
					'c-gutter-30' => esc_html__( '30px', 'psycheco' ),
					'c-gutter-40' => esc_html__( '40px', 'psycheco' ),
					'c-gutter-45' => esc_html__( '45px', 'psycheco' ),
					'c-gutter-50' => esc_html__( '50px', 'psycheco' ),
					'c-gutter-60' => esc_html__( '60px', 'psycheco' ),
					'c-gutter-70' => esc_html__( '70px', 'psycheco' ),
					'c-gutter-80' => esc_html__( '80px', 'psycheco' ),
					'c-gutter-100' => esc_html__( '100px', 'psycheco' ),
					'c-gutter-130' => esc_html__( '130px', 'psycheco' ),
				),
			),
			$prefix . 'columns_vertical_margins'  => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'columns_vertical_margins', '' ),
				'label'   => esc_html__( 'Column vertical margins', 'psycheco' ),
				'help'    => esc_html__( 'Choose columns vertical margins value',
					'psycheco' ),
				'choices' => array(
					''  => esc_html__( 'Top and bottom: 0 - default ', 'psycheco' ),
					'c-my-1'  => esc_html__( 'Top and bottom: 1px', 'psycheco' ),
					'c-my-2'  => esc_html__( 'Top and bottom: 2px', 'psycheco' ),
					'c-my-5'  => esc_html__( 'Top and bottom: 5px', 'psycheco' ),
					'c-my-10' => esc_html__( 'Top and bottom: 10px', 'psycheco' ),
					'c-my-15' => esc_html__( 'Top and bottom: 15px', 'psycheco' ),
					'c-my-20' => esc_html__( 'Top and bottom: 20px', 'psycheco' ),
					'c-my-25' => esc_html__( 'Top and bottom: 25px', 'psycheco' ),
					'c-my-30' => esc_html__( 'Top and bottom: 30px', 'psycheco' ),
					'c-my-40' => esc_html__( 'Top and bottom: 30px', 'psycheco' ),
					'c-my-50' => esc_html__( 'Top and bottom: 50px', 'psycheco' ),
					'c-my-60' => esc_html__( 'Top and bottom: 60px', 'psycheco' ),
					'c-mb-1'  => esc_html__( 'Bottom: 1px', 'psycheco' ),
					'c-mb-2'  => esc_html__( 'Bottom: 2px', 'psycheco' ),
					'c-mb-5'  => esc_html__( 'Bottom: 5px', 'psycheco' ),
					'c-mb-10' => esc_html__( 'Bottom: 10px', 'psycheco' ),
					'c-mb-15' => esc_html__( 'Bottom: 15px', 'psycheco' ),
					'c-mb-20' => esc_html__( 'Bottom: 20px', 'psycheco' ),
					'c-mb-25' => esc_html__( 'Bottom: 25px', 'psycheco' ),
					'c-mb-30' => esc_html__( 'Bottom: 30px', 'psycheco' ),
					'c-mb-40' => esc_html__( 'Bottom: 40px', 'psycheco' ),
					'c-mb-50' => esc_html__( 'Bottom: 50px', 'psycheco' ),
					'c-mb-60' => esc_html__( 'Bottom: 60px', 'psycheco' ),
					'c-mt-1'  => esc_html__( 'Top: 1px', 'psycheco' ),
					'c-mt-2'  => esc_html__( 'Top: 2px', 'psycheco' ),
					'c-mt-5'  => esc_html__( 'Top: 5px', 'psycheco' ),
					'c-mt-10' => esc_html__( 'Top: 10px', 'psycheco' ),
					'c-mt-15' => esc_html__( 'Top: 15px', 'psycheco' ),
					'c-mt-20' => esc_html__( 'Top: 20px', 'psycheco' ),
					'c-mt-25' => esc_html__( 'Top: 25px', 'psycheco' ),
					'c-mt-30' => esc_html__( 'Top: 30px', 'psycheco' ),
					'c-mt-40' => esc_html__( 'Top: 30px', 'psycheco' ),
					'c-mt-50' => esc_html__( 'Top: 50px', 'psycheco' ),
					'c-mt-60' => esc_html__( 'Top: 60px', 'psycheco' ),
				),
			),
			$prefix . 'background_image' => array(
				'label'   => esc_html__( 'Background Image', 'psycheco' ),
				'help'    => esc_html__( 'Choose the background image for section', 'psycheco' ),
				'type'    => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			$prefix . 'background_cover' => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Background Cover', 'psycheco' ),
				'desc'    => esc_html__( 'Stretch the image', 'psycheco' ),
				'help'    => esc_html__( 'Adds "background-size:cover" CSS rule', 'psycheco' ),
				'type'  => 'switch'
			), $prefix . 'background_cover'
			),
			$prefix . 'parallax'  => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Parallax', 'psycheco' ),
				'help'    => esc_html__( 'Adds background parallax effect on section background image', 'psycheco' ),
				'type'  => 'switch',
			),
				$prefix . 'parallax'
			
			),
			$prefix . 'background_overlay' => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Background Color Overlay', 'psycheco' ),
				'help'    => esc_html__( 'Adds semitransparent color overlay on section', 'psycheco' ),
				'type'  => 'switch',
			),
				$prefix . 'background_overlay'
			
			),
			$prefix . 'background_gradientradial' => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Background Radial Overlay', 'psycheco' ),
				'help'    => esc_html__( 'Adds semitransparent light radial overlay on section', 'psycheco' ),
				'type'  => 'switch',
			),
				$prefix . 'background_gradientradial'
			),
			$prefix . 'border_top'      => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'border_top', '' ),
				'label'   => esc_html__( 'Top border', 'psycheco' ),
				'desc'    => esc_html__( 'Will be hidden if overlay option is used','psycheco' ),
				'help'    => esc_html__( 'Top border will be hidden if overlay option is used', 'psycheco' ),
				'choices' => array(
					''   => esc_html__( 'None', 'psycheco' ),
					's-bordertop'   => esc_html__( 'Full Width','psycheco' ),
					's-bordertop-container'  => esc_html__( 'Container Width', 'psycheco' ),
				),
			),
			$prefix . 'border_bottom'      => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'border_bottom' ,'' ),
				'label'   => esc_html__( 'Bottom border', 'psycheco' ),
				'choices' => array(
					''   => esc_html__( 'None', 'psycheco' ),
					's-borderbottom'   => esc_html__( 'Full Width','psycheco' ),
					's-borderbottom-container'  => esc_html__( 'Container Width', 'psycheco' ),
				),
			),
			$prefix . 'is_align_vertical'  => psycheco_get_switch_option_type( array(
				'label' => esc_html__( 'Vertical align content', 'psycheco' ),
				'help'  => esc_html__( 'Align columns content vertically on wide screens', 'psycheco' ),
				'type'  => 'switch',
			),
				$prefix . 'is_align_vertical'
			),
			$prefix . 'section_class' => array(
				'type'  => 'text',
				'value' => psycheco_get_default_section_option_value( $prefix . 'section_class', '' ),
				'label' => esc_html__( 'Additional CSS class', 'psycheco' ),
				'desc'  => esc_html__( 'Add your custom CSS class to section. Useful for Customization', 'psycheco' ),
			),
			$prefix . 'section_id' => array(
				'type'  => 'text',
				'value' => psycheco_get_default_section_option_value( $prefix . 'section_id', '' ),
				'label' => esc_html__( 'ID attribute', 'psycheco' ),
				'desc'  => esc_html__( 'Add ID attribute to section. Useful for single page menu', 'psycheco' ),
			),
		);
		
		if ( $excluded_keys ) {
			foreach ( $excluded_keys as $key ) {
				unset( $options[$prefix . $key] );
			}
		}
		
		return $options;
	}
endif; //psycheco_get_section_options_array

if ( !function_exists( 'psycheco_get_section_options' ) ) :
	/**
	 * Prepare section HTML attributes
	 * @param array $options
	 * @param string $prefix
	 *
	 * @return array
	 */
	function psycheco_get_section_options( $options, $prefix = '') {
		$section_class_values = array(
			$prefix . 'background_color'         => $prefix . 'background_color',
			$prefix . 'horizontal_padding'       => $prefix . 'horizontal_padding',
			$prefix . 'top_padding'              => $prefix . 'top_padding',
			$prefix . 'bottom_padding'           => $prefix . 'bottom_padding',
			$prefix . 'columns_padding'          => $prefix . 'columns_padding',
			$prefix . 'columns_vertical_margins' => $prefix . 'columns_vertical_margins',
			$prefix . 'border_top'               => $prefix . 'border_top',
			$prefix . 'border_bottom'            => $prefix . 'border_bottom',
			$prefix . 'columns_vertical_margins' => $prefix . 'columns_vertical_margins',
			$prefix . 'section_class'            => $prefix . 'section_class',
			//responsive options
			$prefix . 'hidden_xs'                => $prefix . 'hidden_xs',
			$prefix . 'hidden_sm'                => $prefix . 'hidden_sm',
			$prefix . 'hidden_md'                => $prefix . 'hidden_md',
			$prefix . 'hidden_lg'                => $prefix . 'hidden_lg',
			$prefix . 'hidden_xl'                => $prefix . 'hidden_xl',
			$prefix . 'top_padding_sm'           => $prefix . 'top_padding_sm',
			$prefix . 'bottom_padding_sm'        => $prefix . 'bottom_padding_sm',
			$prefix . 'top_padding_md'           => $prefix . 'top_padding_md',
			$prefix . 'bottom_padding_md'        => $prefix . 'bottom_padding_md',
			$prefix . 'top_padding_lg'           => $prefix . 'top_padding_lg',
			$prefix . 'bottom_padding_lg'        => $prefix . 'bottom_padding_lg',
			$prefix . 'top_padding_xl'           => $prefix . 'top_padding_xl',
			$prefix . 'bottom_padding_xl'        => $prefix . 'bottom_padding_xl',
		);
		
		//array with section attributes
		$array = array(
			'section_class' => '',
			'section_container_class_suffix' => '',
			'section_row_class_suffix' => '',
			'section_id' => '',
			'section_background_image' => '',
		);
		
		//skip top border if color overlay or radial gradient is active
		if( !empty( $options[$prefix . 'background_overlay'] ) || !empty( $options[$prefix . 'background_gradientradial'] ) ) {
			unset( $section_class_values[$prefix . 'border_top'] );
		}
		
		//if background is set for absolute header - making topline, toplogo, header and title section with same background
		if(
			( $prefix === 'topline_' ||  $prefix === 'header_' || $prefix === 'title_' )
			&&
			( !empty( $options['header_absolute']['enabled'] ) )
		) {
			$options[$prefix . 'background_color'] = $options['header_absolute']['yes']['header_absolute_background_color'];
		}
		
		//if is page and Unyson is installed - overriding global header and footer options from page settings
		if	( is_page() )  {
			if( $prefix === 'header_' && function_exists( 'fw_get_db_post_option' ) ) {
				$page_options = fw_get_db_post_option( get_the_ID(), 'header_page' );
				if ( ! empty( $page_options['header_page_styles'] ) ) {
					$options = array_merge( $options, $page_options['header_page_custom_styles'] );
				}
			}
			if( $prefix === 'footer_' && function_exists( 'fw_get_db_post_option' ) ) {
				$page_options = fw_get_db_post_option( get_the_ID(), 'footer_page' );
				if ( ! empty( $page_options['footer_page_styles'] ) ) {
					$options = array_merge( $options, $page_options['footer_page_custom_styles'] );
				}
			}
		}
		
		//building CSS class
		foreach ( $options as $key => $value ) {
			if( in_array( $key, $section_class_values ) ) {
				$array['section_class'] .= ' ' . $value;
			}
		}
		
		//additional CSS classes
		$array['section_class'] .= ( !empty( $options[$prefix . 'parallax'] ) ) ? ' s-parallax' : '';
		$array['section_class'] .= ( !empty( $options[$prefix . 'background_cover'] ) ) ? ' cover-background' : '';
		$array['section_class'] .= ( !empty( $options[$prefix . 'background_overlay'] ) ) ? ' s-overlay' : '';
		$array['section_class'] .= ( !empty( $options[$prefix . 'background_gradientradial'] ) ) ? ' gradientradial-background' : '';
		
		//container CSS class
		$array['section_container_class_suffix'] .= ( !empty( $options[$prefix . 'is_fluid'] ) ) ? '-fluid' : '';
		
		//row CSS class
		$array['section_row_class_suffix'] .= ( !empty( $options[$prefix . 'is_align_vertical'] ) ) ? ' align-items-center' : '';
		
		//ID attribute
		$array['section_id'] .= ( !empty( $options[$prefix . 'section_id'] ) ) ? $options[$prefix . 'section_id'] : '';
		
		//bg image
		if ( !empty( $options[$prefix . 'background_image'] ) && !empty( $options[$prefix . 'background_image']['data']['icon'] ) ) {
			$array['section_background_image'] = 'background-image:url(' . $options[$prefix . 'background_image']['data']['icon'] . ');';
		}
		
		return $array;
	}
endif; //psycheco_get_section_options


//default padding values that are set in variables_template SCSS file
if ( !function_exists( 'psycheco_unyson_option_section_padding_choices ' ) ) :
	function psycheco_unyson_option_section_padding_choices ( $prefix = '' ) {
		$padding_values = array( 0, 1, 2, 3, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 120, 125, 120, 130, 135, 140, 145, 150, 155, 165, 170, 180, 195, 240 );
		$breakpoins = array('xs', 'sm', 'md', 'lg', 'xl');
		
		$array = array( '' => esc_html__( 'Inherit', 'psycheco' ) );
		foreach ( $padding_values as $value ) {
			$array[ $prefix . $value ] = esc_html__( $value . 'px', 'psycheco' );
		}
		return $array;
	}
endif; //psycheco_unyson_option_section_padding_choices

//background options
if ( !function_exists( 'psycheco_unyson_option_get_section_padding_array' ) ) :
	function psycheco_unyson_option_get_section_padding_array( $prefix = '' ) {
		return array(
			$prefix . 'horizontal_padding'      => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value($prefix . 'horizontal_padding', '' ),
				'label'   => esc_html__( 'Horizontal padding', 'psycheco' ),
				'help'    => esc_html__( 'Choose horizontal padding value for section',
					'psycheco' ),
				'choices' => array(
					' '                => esc_html__( 'Default', 'psycheco' ),
					'container-px-0'   => esc_html__( 'None', 'psycheco' ),
					'container-px-5'   => esc_html__( '5px', 'psycheco' ),
					'container-px-20'   => esc_html__( '20px', 'psycheco' ),
					'container-px-30'   => esc_html__( '30px', 'psycheco' ),
					'container-px-45'   => esc_html__( '45px', 'psycheco' ),
				),
			),
			$prefix . 'top_padding'      => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value($prefix . 'top_padding', 's-pt-60' ),
				'label'   => esc_html__( 'Top padding', 'psycheco' ),
				'help'    => esc_html__( 'Choose top padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pt-' ),
			),
			$prefix . 'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'bottom_padding', 's-pb-60' ),
				'label'   => esc_html__( 'Bottom padding', 'psycheco' ),
				'help'    => esc_html__( 'Choose bottom padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pb-' ),
			),
			$prefix . 'top_padding_sm' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Top padding above 576px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose top padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pt-sm-' ),
			),
			$prefix . 'bottom_padding_sm' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Bottom padding above 576px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose bottom padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pb-sm-' ),
			),
			$prefix . 'top_padding_md' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Top padding above 768px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose top padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pt-md-' ),
			),
			$prefix . 'bottom_padding_md' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Bottom padding above 768px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose bottom padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pb-md-' ),
			),
			$prefix . 'top_padding_lg' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Top padding above 992px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose top padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pt-lg-' ),
			),
			$prefix . 'bottom_padding_lg' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Bottom padding above 992px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose bottom padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pb-lg-' ),
			),
			$prefix . 'top_padding_xl' => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'top_padding_xl', 's-pt-xl-120' ),
				'label'   => esc_html__( 'Top padding above 1200px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose top padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pt-xl-' ),
			),
			$prefix . 'bottom_padding_xl' => array(
				'type'    => 'select',
				'value'   => psycheco_get_default_section_option_value( $prefix . 'bottom_padding_xl', 's-pb-xl-120' ),
				'label'   => esc_html__( 'Bottom padding above 1200px screen', 'psycheco' ),
				'help'    => esc_html__( 'Choose bottom padding value for section',
					'psycheco' ),
				'choices' => psycheco_unyson_option_section_padding_choices( 's-pb-xl-' ),
			),
		);
	}
endif; //psycheco_unyson_option_get_section_padding_array



//animations
if ( !function_exists( 'psycheco_unyson_option_animations' ) ) :
	function psycheco_unyson_option_animations() {
		return array(
			''               => esc_html__( 'None', 'psycheco' ),
			'slideDown'      => esc_html__( 'slideDown', 'psycheco' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'psycheco' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'psycheco' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'psycheco' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'psycheco' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'psycheco' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'psycheco' ),
			'slideRight'     => esc_html__( 'slideRight', 'psycheco' ),
			'slideUp'        => esc_html__( 'slideUp', 'psycheco' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'psycheco' ),
			'expandUp'       => esc_html__( 'expandUp', 'psycheco' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'psycheco' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'psycheco' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'psycheco' ),
			'hatch'          => esc_html__( 'hatch', 'psycheco' ),
			'tossing'        => esc_html__( 'tossing', 'psycheco' ),
			'pulse'          => esc_html__( 'pulse', 'psycheco' ),
			'floating'       => esc_html__( 'floating', 'psycheco' ),
			'bounce'         => esc_html__( 'bounce', 'psycheco' ),
			'pullUp'         => esc_html__( 'pullUp', 'psycheco' ),
			'pullDown'       => esc_html__( 'pullDown', 'psycheco' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'psycheco' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'psycheco' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'psycheco' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'psycheco' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'psycheco' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'psycheco' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'psycheco' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'psycheco' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'psycheco' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'psycheco' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'psycheco' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'psycheco' ),
		);
	}
endif; //psycheco_unyson_option_animations

//responsive options
if ( !function_exists( 'psycheco_unyson_option_responsive_options_array' ) ) :
	function psycheco_unyson_option_responsive_options_array() {
		return array(
			'hidden-xs' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Hide on Extra small screens (below 576px)', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('Show', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'hidden-xs',
					'label' => esc_html__('Hide', 'psycheco'),
				),
			),
			'hidden-sm' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Hide on Small screens (between 576px and 767px)', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('Show', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'hidden-sm',
					'label' => esc_html__('Hide', 'psycheco'),
				),
			),
			'hidden-md' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Hide on Medium screens (between 768px and 991px)', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('Show', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'hidden-md',
					'label' => esc_html__('Hide', 'psycheco'),
				),
			),
			'hidden-lg' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Hide on Large screens (between 992px and 1199px)', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('Show', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'hidden-lg',
					'label' => esc_html__('Hide', 'psycheco'),
				),
			),
			'hidden-xl' => array(
				'type'  => 'switch',
				'value' => '',
				'label' => esc_html__('Hide on Extra Large screens (above 1200px)', 'psycheco'),
				'left-choice' => array(
					'value' => '',
					'label' => esc_html__('Show', 'psycheco'),
				),
				'right-choice' => array(
					'value' => 'hidden-xl',
					'label' => esc_html__('Hide', 'psycheco'),
				),
			),
		);
	}
endif; //psycheco_unyson_option_responsive_options_array



//background options
if ( !function_exists( 'psycheco_unyson_option_get_backgrounds_array' ) ) :
	function psycheco_unyson_option_get_backgrounds_array() {
		return array(
			''         => esc_html__( 'Transparent (No Background)', 'psycheco' ),
			'light-bg'  => esc_html__( 'Light', 'psycheco' ),
			'hero-bg'  => esc_html__( 'Highlight', 'psycheco' ),
			'muted-bg' => esc_html__( 'Muted', 'psycheco' ),
			'ds ms'    => esc_html__( 'Dark Grey', 'psycheco' ),
			'ds'       => esc_html__( 'Dark', 'psycheco' ),
			'cs'       => esc_html__( 'Main color', 'psycheco' ),
			'cs cs2'   => esc_html__( 'Second Main color', 'psycheco' ),
			'bordered' => esc_html__( 'Transparent background with border', 'psycheco' ),
			'light-bg box-shadow' => esc_html__( 'Light background with shadow', 'psycheco' ),
			'hero-bg box-shadow' => esc_html__( 'Highlight background with shadow', 'psycheco' ),
		);
	}
endif; //psycheco_unyson_option_get_backgrounds_array



//get responsive CSS classes from options array
if ( !function_exists( 'psycheco_unyson_options_get_responsive_css_classes' ) ) :
	function psycheco_unyson_options_get_responsive_css_classes( $options ) {
		$css_class = '';
		$css_class .= ( !empty( $options['hidden_xs'] ) ) ? ' ' . $options['hidden_xs'] : '';
		$css_class .= ( !empty( $options['hidden_sm'] ) ) ? ' ' . $options['hidden_sm'] : '';
		$css_class .= ( !empty( $options['hidden_md'] ) ) ? ' ' . $options['hidden_md'] : '';
		$css_class .= ( !empty( $options['hidden_lg'] ) ) ? ' ' . $options['hidden_lg'] : '';
		$css_class .= ( !empty( $options['hidden_xl'] ) ) ? ' ' . $options['hidden_xl'] : '';
		return trim ( $css_class );
	}
endif; //psycheco_unyson_options_get_responsive_css_classes

//get divider class
if ( !function_exists( 'psycheco_unyson_options_get_divider_css_classes' ) ) :
	function psycheco_unyson_options_get_divider_css_classes( $options ) {
		$css_class = '';
		$css_class .= ( $options['all'] !== '' ) ? ' divider-' . $options['all'] : '';
		$css_class .= ( $options['sm'] !== '' ) ? ' divider-sm-' . $options['sm'] : '';
		$css_class .= ( $options['md'] !== '' ) ? ' divider-md-' . $options['md'] : '';
		$css_class .= ( $options['lg'] !== '' ) ? ' divider-lg-' . $options['lg'] : '';
		$css_class .= ( $options['xl'] !== '' ) ? ' divider-xl-' . $options['xl'] : '';
		
		return trim ( $css_class );
	}
endif; //psycheco_unyson_options_get_responsive_css_classes

//detecting is topline is visible
if ( !function_exists( 'psycheco_topline_is_visible' ) ) :
	function psycheco_topline_is_visible() {
		$header = psycheco_get_option( 'page_header' );
		//array with headers where topline is not shown
		return ( ! in_array( $header, array( '2', '3', '4', '100', '101', '102', '103' ) ) );
	}
endif; //psycheco_topline_is_visible

//detecting is toplogo is visible
if ( !function_exists( 'psycheco_toplogo_is_visible' ) ) :
	function psycheco_toplogo_is_visible() {
		$header = psycheco_get_option( 'page_header' );
		return ( ! in_array( $header, array( '1',  '2',  '3', '4' ) ) );
	}
endif; //psycheco_toplogo_is_visible

//detecting is copyright secondary text option is visible
if ( !function_exists( 'psycheco_copyright_secondary_text_is_visible' ) ) :
	function psycheco_copyright_secondary_text_is_visible() {
		$copyright = psycheco_get_option( 'page_copyright' );
		//array with copyright where secondary text is visible
		return ( in_array( $copyright, array( '2', '4' ) ) );
	}
endif; //psycheco_copyright_secondary_text_is_visible

//detecting is copyright logo option is visible
if ( !function_exists( 'psycheco_copyright_logo_is_visible' ) ) :
	function psycheco_copyright_logo_is_visible() {
		$copyright = psycheco_get_option( 'page_copyright' );
		return ( in_array( $copyright, array( '3' ) ) );
	}
endif; //psycheco_copyright_logo_is_visible

//detecting is title option is visible
if ( !function_exists( 'psycheco_title_text_is_visible' ) ) :
	function psycheco_title_text_is_visible() {
		$title = psycheco_get_option( 'page_title' );
		return ( in_array( $title, array( '2' ) ) );
	}
endif; //psycheco_title_text_is_visible

//detecting if shared buttons section is visible
if ( !function_exists( 'psycheco_shared_buttons_options_is_visible' ) ) :
	function psycheco_shared_buttons_options_is_visible() {
		return function_exists( 'mwt_share_this' );
	}
endif; //psycheco_shared_buttons_options_is_visible

//predefined headers array
if ( !function_exists( 'psycheco_get_predefined_headers_array' ) ) :
	function psycheco_get_predefined_headers_array() {
		return array(
			'1'  => esc_html__( 'Default - Logo, menu, buttons and top info', 'psycheco' ),
			'2'  => esc_html__( 'Logo, menu and buttons', 'psycheco' ),
			'3'  => esc_html__( 'Narrow header with top logo and info', 'psycheco' ),
			'4'  => esc_html__( 'Header with logo and menu', 'psycheco' ),
			'100' => esc_html__( 'Left push header', 'psycheco' ),
			'101' => esc_html__( 'Left slide header', 'psycheco' ),
			'102' => esc_html__( 'Right push header', 'psycheco' ),
			'103' => esc_html__( 'Right slide header', 'psycheco' ),
		);
	}
endif; //psycheco_get_predefined_headers_array

//header options array for customizer and for page options

if ( !function_exists( 'psycheco_get_header_options_array_for_customizer_and_page' ) ) :
	function psycheco_get_header_options_array_for_customizer_and_page( $defaults ) {
		$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
		$header_buttons  = array();
		if ( ! empty( $shortcodes_extension ) ) {
			$header_buttons = $shortcodes_extension->get_shortcode( 'button' )->get_options();
		}
		return array(
			'header_layout'           => array(
				'title'   => esc_html__( 'Header Layout', 'psycheco' ),
				//type tab for page options
				'type' => 'tab',
				'options' => array(
					'page_header' => array(
						'type'    => 'select',
						'value'   => $defaults['page_header'],
						'label'   => esc_html__( 'Template Header', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined theme headers', 'psycheco' ),
						'help'    => esc_html__( 'You can select one of predefined theme headers', 'psycheco' ),
						'choices' => psycheco_get_predefined_headers_array(),
						'blank'   => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'header_absolute' => array(
						'label' => false,
						'desc'  => false,
						'type'  => 'multi-picker',
						'picker' => array(
							'enabled' => array(
								'label' => esc_html__('Position Absolute', 'psycheco'),
								'type'  => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Enabled', 'psycheco')
								),
								'left-choice' => array(
									'value' => '',
									'label' => esc_html__('Disabled', 'psycheco')
								),
								'desc'  => esc_html__( 'Make header transparent and positioned inside slider or title section', 'psycheco' ),
								'help'  => esc_html__( 'Adds "position:absolute" CSS rule on header', 'psycheco' ),
								'wp-customizer-args' => array(
									'active_callback' => '__return_true',
								),
							),
						
						),
						'choices' => array(
							'yes' => array(
								'header_absolute_background_color' => array(
									'type'    => 'select',
									'value'   => 'ls',
									'label'   => esc_html__( 'Background color', 'psycheco' ),
									'desc'    => esc_html__( 'This value will override selected background for Header and Title sections', 'psycheco' ),
									'help'    => esc_html__( 'Select one of predefined background colors',
										'psycheco' ),
									'choices' => array(
										'ls'     => esc_html__( 'Light', 'psycheco' ),
										'ls ms'  => esc_html__( 'Light Grey', 'psycheco' ),
										'ds'     => esc_html__( 'Dark Grey', 'psycheco' ),
										'ds ms'  => esc_html__( 'Dark Muted', 'psycheco' ),
										'cs'     => esc_html__( 'Main color', 'psycheco' ),
										'cs cs2' => esc_html__( 'Second Main color', 'psycheco' ),
									),
									'wp-customizer-args' => array(
										'active_callback' => '__return_true',
									),
								),
								'header_absolute_background_image' => array(
									'label'   => esc_html__( 'Background Image', 'psycheco' ),
									'help'    => esc_html__( 'Choose the background image for section', 'psycheco' ),
									'type'    => 'background-image',
									'choices' => array(//	in future may will set predefined images
									),
									'wp-customizer-args' => array(
										'active_callback' => '__return_true',
									),
								),
							),
						),
					),
					'header_show_all_menu_items' => array(
						'type'    => 'switch',
						'value'   => false,
						'label'   => esc_html__( 'Always show all menu items', 'psycheco' ),
						'desc'    => esc_html__( 'Prevent hiding menu items that do not feet in menu width to sub-menus', 'psycheco' ),
						'help'    => esc_html__( 'This option will not work if header with centered logo layout used', 'psycheco' ),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__( 'Yes', 'psycheco' )
						),
						'left-choice'  => array(
							'value' => false,
							'label' => esc_html__( 'No', 'psycheco' )
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'header_disable_affix_xl' => array(
						'type'    => 'switch',
						'value'   => false,
						'label'   => esc_html__( 'Prevent sticky header on wide screens', 'psycheco' ),
						'desc'    => esc_html__( 'Prevent header to be fixed on wide screens', 'psycheco' ),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__( 'Yes', 'psycheco' )
						),
						'left-choice'  => array(
							'value' => false,
							'label' => esc_html__( 'No', 'psycheco' )
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'header_disable_affix_xs' => array(
						'type'    => 'switch',
						'value'   => false,
						'label'   => esc_html__( 'Prevent sticky header on small screens', 'psycheco' ),
						'desc'    => esc_html__( 'Prevent header to be fixed on small screens', 'psycheco' ),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__( 'Yes', 'psycheco' )
						),
						'left-choice'  => array(
							'value' => false,
							'label' => esc_html__( 'No', 'psycheco' )
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			'header_section_options'  => array(
				'title'   => esc_html__( 'Header Section Options', 'psycheco' ),
				//type tab for page options
				'type' => 'tab',
				'options' => psycheco_get_section_options_array( 'header_', array(
					'top_padding',
					'bottom_padding',
					'top_padding_sm',
					'bottom_padding_sm',
					'top_padding_md',
					'bottom_padding_md',
					'top_padding_lg',
					'bottom_padding_lg',
					'top_padding_xl',
					'bottom_padding_xl',
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		);
	}
endif; //psycheco_get_header_options_array_for_customizer_and_page

//predefined footers array
if ( !function_exists( 'psycheco_get_predefined_footers_array' ) ) :
	function psycheco_get_predefined_footers_array() {
		return array(
			'5' => esc_html__( '4 columns footer(first column highlight)', 'psycheco' ),
			'1' => esc_html__( '4 columns footer', 'psycheco' ),
			'2' => esc_html__( '3 columns footer', 'psycheco' ),
			'3' => esc_html__( '2 columns footer', 'psycheco' ),
			'4' => esc_html__( '1 column footer', 'psycheco' ),
		);
	}
endif; //psycheco_get_predefined_footers_array

//footer options array for customizer and for page options
if ( !function_exists( 'psycheco_get_footer_options_array_for_customizer_and_page' ) ) :
	function psycheco_get_footer_options_array_for_customizer_and_page( $defaults ) {
		return array(
			'footer_layout' => array(
				'title'                  => esc_html__( 'Footer Section Layout', 'psycheco' ),
				//type tab for page options
				'type' => 'tab',
				'options'                => array(
					'page_footer' => array(
						'type'    => 'select',
						'value'   => $defaults['page_footer'],
						'label'   => esc_html__( 'Page footer', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined page footers.', 'psycheco' ),
						'help'    => esc_html__( 'You can select one of predefined theme footers', 'psycheco' ),
						'choices' => psycheco_get_predefined_footers_array(),
						'blank'   => false,
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'footer_section_options' => array(
				'title'   => esc_html__( 'Footer Section Options', 'psycheco' ),
				//type tab for page options
				'type' => 'tab',
				'options' => psycheco_get_section_options_array( 'footer_', array(
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'footer_section_padding' => array(
				'title'   => esc_html__( 'Footer Section Padding', 'psycheco' ),
				//type tab for page options
				'type' => 'tab',
				'options' => psycheco_unyson_option_get_section_padding_array( 'footer_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		);
	}
endif; //psycheco_get_footer_options_array_for_customizer_and_page


//categories list default markup
add_filter( 'psycheco_get_the_terms_defaults', function ( $args ) {
	$args['before'] = '<span class="cat-links">';
	$args['after'] = '</span>';
	
	return $args;
} );
