<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

//theme defaults
$options_class = new Psycheco_Options();
$defaults = $options_class->get_default_options_array();


$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
$meta_social_icons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$meta_social_icons = $shortcodes_extension->get_shortcode( 'icons_social' )->get_options();
}

$icon  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$icon = $shortcodes_extension->get_shortcode( 'icon' )->get_options();
}

$slider_extension = fw()->extensions->get( 'slider' );
$choices_blog_slider          = '';
if ( ! empty ( $slider_extension ) ) {
	$choices_blog_slider = $slider_extension->get_populated_sliders_choices();
}
$header_buttons  = array();
if ( ! empty( $shortcodes_extension ) ) {
	$header_buttons = $shortcodes_extension->get_shortcode( 'button' )->get_options();
}
//adding empty value to disable slider
$choices_blog_slider['0'] = esc_html__( 'No Slider', 'psycheco' );

$options = array(
	'meta_section' => array(
		'title'   => esc_html__( 'Theme Meta', 'psycheco' ),
		'options' => array(
			'toplogo-icons' => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Icons in list for Toplogo', 'psycheco' ),
				'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'psycheco' ),
				'desc'          => esc_html__( 'Add your icons with descriptions in toplogo section', 'psycheco' ),
				'help'          => esc_html__( 'Appear in header 3', 'psycheco' ),
				'template'      => '{{=text}}',
				'limit'         => 3, // limit the number of boxes that can be added
				'popup-options' => $icon,
			),
			'topline-icons' => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Icons in list for topline', 'psycheco' ),
				'popup-title'   => esc_html__( 'Add/Edit Icons in list', 'psycheco' ),
				'desc'          => esc_html__( 'Add your icons with descriptions in topline', 'psycheco' ),
				'help'          => esc_html__( 'Appear in header 1', 'psycheco' ),
				'template'      => '{{=icon}}',
				'limit'         => 3, // limit the number of boxes that can be added
				'popup-options' => $icon,
			),
			$meta_social_icons,
			'header_buttons'        => array(
				'label'         => esc_html__( 'Buttons', 'psycheco' ),
				'popup-title'   => esc_html__( 'Add/Edit Buttons', 'psycheco' ),
				'desc'          => esc_html__( 'Add button for header', 'psycheco' ),
//				'help'          => esc_html__( 'Buttons Limit 2 used in header 2,3', 'psycheco' ),
				'type'          => 'addable-popup',
				'limit'         => 1, // limit the number of boxes that can be added
				'template'      => '{{=label}}',
				'popup-options' => array(
					$header_buttons,
				)
			),
		),
		'wp-customizer-args' => array(
			'active_callback' => '__return_true',
			'priority' => 150,
		),
	),
	'header_section'       => array(
		'title'   => esc_html__( 'Theme Header Section', 'psycheco' ),
		'options' => array(
			'logo_section'         => array(
				'title'   => esc_html__( 'Logo', 'psycheco' ),
				'options' => array(
					'logo_image'             => array(
						'type'        => 'upload',
						'value'       => array(),
						'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
						'label'       => esc_html__( 'Main logo image that appears in header', 'psycheco' ),
						'desc'        => esc_html__( 'Select your logo', 'psycheco' ),
						'help'        => esc_html__( 'Choose image to display as a site logo', 'psycheco' ),
						'images_only' => true,
						'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_image_inverse'             => array(
						'type'        => 'upload',
						'value'       => array(),
						'attr'        => array( 'class' => 'logo_image-class', 'data-logo_image' => 'logo_image' ),
						'label'       => esc_html__( 'Main inverse logo image that appears in dark header', 'psycheco' ),
						'desc'        => esc_html__( 'Select your inverse logo', 'psycheco' ),
						'help'        => esc_html__( 'Choose image to display as a site inverse logo', 'psycheco' ),
						'images_only' => true,
						'files_ext'   => array( 'png', 'jpg', 'jpeg', 'gif' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'logo_text'              => array(
						'type'  => 'text',
						'value' => 'psycheco',
						'attr'  => array( 'class' => 'logo_text-class', 'data-logo_text' => 'logo_text' ),
						'label' => esc_html__( 'Logo Text', 'psycheco' ),
						'desc'  => esc_html__( 'Text that appears near logo image', 'psycheco' ),
						'help'  => esc_html__( 'Type your text to show it in logo', 'psycheco' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			psycheco_get_header_options_array_for_customizer_and_page( $defaults ),
			'topline_section_options' => array(
				'title'              => esc_html__( 'Topline Section Options', 'psycheco' ),
				'options'            => psycheco_get_section_options_array( 'topline_', array(
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
					'active_callback' => 'psycheco_topline_is_visible',
				),
			),
			'toplogo_section_options' => array(
				'title'              => esc_html__( 'Toplogo Section Options', 'psycheco' ),
				'options'            => psycheco_get_section_options_array( 'toplogo_', array(
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
					'active_callback' => 'psycheco_toplogo_is_visible',
				),
			),
		),
	),
	'title_section'        => array(
		'title'   => esc_html__( 'Theme Title Section', 'psycheco' ),
		'options' => array(
			'title_layout'          => array(
				'title'   => esc_html__( 'Title Section Layout', 'psycheco' ),
				'options' => array(
					'page_title'      => array(
						'type'    => 'select',
						'value'   => $defaults['page_title'],
						'attr'    => array(
							'class'    => 'breadcrumbs-thumbnail',
						),
						'label'   => esc_html__( 'Page title sections with optional breadcrumbs', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined page title sections. Install Unyson Breadcrumbs extension to display breadcrumbs', 'psycheco' ),
						'help'    => esc_html__( 'You can select one of predefined theme title sections', 'psycheco' ),
						'choices' => array(
							'1' => esc_html__( 'Default - title above breadcrumbs', 'psycheco' ),
							'2' => esc_html__( 'Left title with animated background', 'psycheco' ),
							'3' => esc_html__( 'Left title with inline breadcrumbs', 'psycheco' ),
							'4' => esc_html__( 'Centered title with bottom right breadcrumbs', 'psycheco' ),
							'5' => esc_html__( 'Left  title with bottom breadcrumbs', 'psycheco' ),
							'6' => esc_html__( 'Centered small title with bottom small breadcrumbs', 'psycheco' ),

						),
						'blank'   => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'hide_term_title' => array(
						'type'         => 'switch',
						'value'        => true,
						'label'        => esc_html__( 'Hide Term Name', 'psycheco' ),
						'desc'         => esc_html__( 'May to hide Archive or Taxonomy Name, such as \'Archives: \', \'Category: \', \'Tag: \', etc. ', 'psycheco' ),
						'right-choice' => array(
							'value' => false,
							'label' => esc_html__( 'Show', 'psycheco' )
						),
						'left-choice'  => array(
							'value' => true,
							'label' => esc_html__( 'Hide', 'psycheco' )
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'title_heading' => array(
						'type'  => 'text',
						'value' => '',
						'label' => esc_html__( 'Page Title Heading', 'psycheco' ),
						'wp-customizer-args' => array(
							'active_callback' => 'psycheco_title_text_is_visible',
						),
					),
				),
			),
			'title_section_options' => array(
				'title'   => esc_html__( 'Title Section Options', 'psycheco' ),
				'options' => psycheco_get_section_options_array( 'title_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'title_section_padding' => array(
				'title'   => esc_html__( 'Title Section Padding', 'psycheco' ),
				'options' => psycheco_unyson_option_get_section_padding_array( 'title_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'footer_section'       => array(
		'title'   => esc_html__( 'Theme Footer Section', 'psycheco' ),
		'options' => array(
			psycheco_get_footer_options_array_for_customizer_and_page( $defaults )
		),
	),
	'copyright_section'    => array(
		'title'   => esc_html__( 'Theme Copyright Section', 'psycheco' ),
		'options' => array(
			'copyright_layout'          => array(
				'title'   => esc_html__( 'Copyright Section Layout', 'psycheco' ),
				'options' => array(
					'page_copyright' => array(
						'type'    => 'select',
						'value'   => $defaults['page_copyright'],
						'label'   => esc_html__( 'Page copyright', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined page copyright sections.', 'psycheco' ),
						'help'    => esc_html__( 'You can select one of predefined theme copyright section', 'psycheco' ),
						'choices' => array(
							'1' => esc_html__( 'One centered column', 'psycheco' ),
							'2' => esc_html__( 'Two columns', 'psycheco' ),
							'3' => esc_html__( 'Three columns with logo and menu', 'psycheco' ),
							'4' => esc_html__( 'Two columns with menu', 'psycheco' ),
						),
						'blank'   => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_text' => array(
						'type'  => 'textarea',
						'value' => '&copy; Psycheco <span class="copyright_year">'. date("Y") .'</span> - All Rights Reserved',
						'label' => esc_html__( 'Copyright text', 'psycheco' ),
						'desc'  => esc_html__( 'Please type your copyright text', 'psycheco' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'copyright_logo' => array(
						'type'  => 'upload',
						'value' => '',
						'label' => esc_html__( 'Copyright logo', 'psycheco' ),
						'desc'  => esc_html__( 'Appears in certain copyright layouts', 'psycheco' ),
						'wp-customizer-args' => array(
							'active_callback' => 'psycheco_copyright_logo_is_visible',
						),
					),
				),
			),
			'copyright_section_options' => array(
				'title'   => esc_html__( 'Copyright Section Options', 'psycheco' ),
				'options' => psycheco_get_section_options_array( 'copyright_', array(
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'copyright_section_padding' => array(
				'title'   => esc_html__( 'Copyright Section Padding', 'psycheco' ),
				'options' => psycheco_unyson_option_get_section_padding_array( 'copyright_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
	'404_panel'      => array(
		'title' => esc_html__( 'Theme 404 page', 'psycheco' ),
		'options' => array(
			'404_section_content' => array(
				'title'   => esc_html__( '404 Section Content', 'psycheco' ),
				'options' =>  array(
					'404_image' => array(
						'type'        => 'upload',
						'value'       => '',
						'label'       => esc_html__( '404 Image', 'psycheco' ),
						'help'        => esc_html__( 'Choose 404 image if needed.', 'psycheco' ),
						'images_only' => true,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
                    'error_text' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__( '404 Title', 'psycheco' ),
                        'wp-customizer-args' => array(
	                        'active_callback' => '__return_true',
                        ),
                    ),
					'search_text' => array(
                        'type'  => 'text',
                        'value' => '',
                        'label' => esc_html__( 'Search Widget Title', 'psycheco' ),
                        'wp-customizer-args' => array(
	                        'active_callback' => '__return_true',
                        ),
                    ),
				),
			),
			'404_section_options' => array(
				'title'   => esc_html__( '404 Section Options', 'psycheco' ),
				'options' => psycheco_get_section_options_array( '404_', array(
					'columns_padding',
					'columns_vertical_margins',
					'is_align_vertical',
				) ),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'404_section_padding' => array(
				'title'   => esc_html__( '404 Section Padding', 'psycheco' ),
				'options' => psycheco_unyson_option_get_section_padding_array( '404_'),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		)
	),
	'fonts_section'        => array(
		'title'   => esc_html__( 'Theme Fonts', 'psycheco' ),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__( 'Font for body', 'psycheco' ),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'psycheco' ),
								'desc'         => esc_html__( 'Enable custom body font', 'psycheco' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'psycheco' ),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__( 'Enabled', 'psycheco' ),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 14,
										'line-height'    => 24,
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__( 'Custom font', 'psycheco' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'psycheco' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'psycheco' ),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__( 'Font for headings', 'psycheco' ),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Enable', 'psycheco' ),
								'desc'         => esc_html__( 'Enable custom heading font', 'psycheco' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Disabled', 'psycheco' ),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__( 'Enabled', 'psycheco' ),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Roboto',
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 28,
										'line-height'    => '100%',
										'letter-spacing' => 0,
										'color'          => '#0000ff'
									),
									'components' => array(
										'family'         => true,
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'label'      => esc_html__( 'Custom font', 'psycheco' ),
									'desc'       => esc_html__( 'Select custom font for headings', 'psycheco' ),
									'help'       => esc_html__( 'You should enable using custom heading fonts above at first', 'psycheco' ),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

		),
	),
	'theme_options_section' => array(
		'title'   => esc_html__( 'Theme Options', 'psycheco' ),
		'options' => array(
			'layout_section'       => array(
				'title'   => esc_html__( 'Theme Layout', 'psycheco' ),
				'options' => array(
					'layout' => array(
						'type'    => 'multi-picker',
						'value'   => 'wide',
						'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
						'label'   => esc_html__( 'Theme layout', 'psycheco' ),
						'desc'    => esc_html__( 'Wide or Boxed layout', 'psycheco' ),
						'picker'  => array(
							'boxed' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => false,
								'desc'         => false,
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'Wide', 'psycheco' ),
								),
								'right-choice' => array(
									'value' => 'boxed_options',
									'label' => esc_html__( 'Boxed', 'psycheco' ),
								),
							),
						),
						'choices' => array(
							'boxed_options' => array(
								'body_background_image' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__( 'Body background image', 'psycheco' ),
									'help'        => esc_html__( 'Choose body background image if needed.', 'psycheco' ),
									'images_only' => true,
								),
								'body_cover'            => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__( 'Parallax background', 'psycheco' ),
									'desc'         => esc_html__( 'Enable full width background for body', 'psycheco' ),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__( 'No', 'psycheco' ),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__( 'Yes', 'psycheco' ),
									),
								),
								'boxed_extra_margins'            => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => esc_html__( 'Additional margins', 'psycheco' ),
									'desc'         => esc_html__( 'Enable additional margins for boxed container', 'psycheco' ),
									'left-choice'  => array(
										'value' => '',
										'label' => esc_html__( 'No', 'psycheco' ),
									),
									'right-choice' => array(
										'value' => 'yes',
										'label' => esc_html__( 'Yes', 'psycheco' ),
									),
								),
							),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),

			'version_section'      => array(
				'title'   => esc_html__( 'Theme Variant', 'psycheco' ),
				'options' => array(
					'version' => array(
						'type'    => 'radio',
						'value'   => 'light',
						'attr'    => array( 'class' => 'theme-layout-class', 'data-theme-layout' => 'layout' ),
						'label'   => esc_html__( 'Theme Version', 'psycheco' ),
						'desc'    => esc_html__( 'Light or dark version', 'psycheco' ),
						'help'    => esc_html__( 'Select one of predefined versions', 'psycheco' ),
						'choices' => array(
							'ls' => esc_html__( 'Light', 'psycheco' ),
							'ds'  => esc_html__( 'Dark', 'psycheco' ),
						),
						'inline'             => true,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'skin' => array(
						'label'              => esc_html__( 'Choose Theme Skin', 'psycheco' ),
						'help'               => esc_html__( 'Select one of predefined theme skins', 'psycheco' ),
						'type'               => 'select',
						'value'              => '',
						'choices'            => array(
							''      => esc_html__( 'Default', 'psycheco' ),
							'skin1' => esc_html__( 'Theme Skin 2', 'psycheco' ),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
			),
			'color_scheme_section' => array(
				'title'   => esc_html__( 'Theme Color Scheme', 'psycheco' ),
				'options' => array(
					'color_scheme_number' => array(
						'type'    => 'select',
						'value'   => '',
						'label'   => esc_html__( 'Predefined Color scheme', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined color schemes number', 'psycheco' ),
						'choices' => array(
							''  => '1',
							'2' => '2',
							'3' => '3',
						),
						'blank'   => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_false',
						),
					),
					'colorMain' => array(
						'label' => esc_html__( 'Override theme color scheme', 'psycheco' ),
						'desc'  => esc_html__( 'Accent Color 1', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['colorMain'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'colorMain2' => array(
						'label' => false,
						'desc'  => esc_html__( 'Accent Color 2', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['colorMain2'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'colorMain3' => array(
						'label' => false,
						'desc'  => esc_html__( 'Accent Color 3', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['colorMain3'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'colorMain4' => array(
						'label' => false,
						'desc'  => esc_html__( 'Accent Color 4', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['colorMain4'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'darkgreyColor' => array(
						'label' => false,
						'desc'  => esc_html__( 'Dark Color', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['darkgreyColor'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'darkColor' => array(
						'label' => false,
						'desc'  => esc_html__( 'Dark Grey Color', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['darkColor'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'greyColor' => array(
						'label' => false,
						'desc'  => esc_html__( 'Grey Color', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['greyColor'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
					'fontColor' => array(
						'label' => false,
						'desc'  => esc_html__( 'Font Color', 'psycheco' ),
						'type'  => 'color-picker',
						'value' => $defaults['fontColor'],
						'wp-customizer-setting-args' => array(
							'transport' => 'postMessage',
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'blog_section'         => array(
				'title'   => esc_html__( 'Theme Blog Options', 'psycheco' ),
				'options' => array(
					'blog_layout' => array(
						'type'    => 'select',
						'value'   => '1',
						'label'   => esc_html__( 'Blog layout', 'psycheco' ),
						'desc'    => esc_html__( 'Select one of predefined blog layouts', 'psycheco' ),
						'choices' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_read_more' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'value'   => false,
						'picker'  => array(
							'hide_read_more' => array(
								'type'         => 'switch',
								'label'        => esc_html__( 'Show read more link in blog feed', 'psycheco' ),
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
							''       => array(),
							'read_more' => array(
								'text' => array(
									'type'     => 'text',
									'label'    => esc_html__('Read More Text', 'psycheco' ),
									'desc'     => esc_html__('Enter read more link text', 'psycheco' ),
									'value'    => esc_html__('Read More', 'psycheco' ),
								),
							),
						),
					),
					'blog_hide_categories' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide categories in blog feed', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_tags' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide tags in blog feed', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_author' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide author in blog feed', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_date' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide date in blog feed', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_hide_comments_link' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide comments link in blog feed', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'post_hide_tags' => array(
						'type'  => 'switch',
						'value' => false,
						'label' => esc_html__('Hide tags in blog post', 'psycheco'),
						'left-choice' => array(
							'value' => false,
							'label' => esc_html__(' Show', 'psycheco'),
						),
						'right-choice' => array(
							'value' => true,
							'label' => esc_html__(' Hide', 'psycheco'),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'blog_slider_switch'       => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'blog_slider_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__( 'Blog slider', 'psycheco' ),
								'desc'         => esc_html__( 'Enable slider on blog page', 'psycheco' ),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__( 'No', 'psycheco' ),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'psycheco' ),
								),
							),
						),
						'choices' => array(
							'yes' => array(
								'slider_id' => array(
									'type'    => 'select',
									'value'   => '',
									'label'   => esc_html__( 'Select Slider', 'psycheco' ),
									'choices' => $choices_blog_slider
								),
							),
						),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
			'preloader_panel'      => array(
				'title' => esc_html__( 'Theme Preloader', 'psycheco' ),
				'options' => array(
					'preloader' => array(
						'type'  => 'multi-picker',
						'label' => false,
						'desc'  => false,
						'value' => array(
							'css' => 'css',
						),
						'picker' => array(
							'preloader_type' => array(
								'label'   => esc_html__('Choose preloader type', 'psycheco'),
								'type'    => 'select',
								'value'   => 'css',
								'choices' => array(
									'css'  => esc_html__('Default', 'psycheco'),
									'image_custom' => esc_html__('Custom Image', 'psycheco'),
									'disabled' => esc_html__('Disabled', 'psycheco'),
								),
								'help'    => esc_html__('You can use default CSS or Image preloader, use your own image or disable preloader', 'psycheco'),
							)
						),
						'choices' => array(
							'css'  => array(
								'options' => array(
									'type'  => 'hidden',
									'value' => 'css',
								)
							),
								'image'  => array(
									'options' => array(
									'type'  => 'hidden',
									'value' => 'image',
								),
							),
								'image_custom' => array(
									'options' => array(
									'type'        => 'upload',
									'value'       => '',
									'label'       => esc_html__( 'Custom preloader image', 'psycheco' ),
									'help'        => esc_html__( 'GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'psycheco' ),
									'images_only' => true,
								),
							),
								'disabled' => array(
									'options' => array(
									'type'  => 'hidden',
									'value' => false,
								),
							),
						),
						/**
						 * (optional) if is true, the borders between choice options will be shown
						 */
						'show_borders' => false,
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					),
					'preloader_custom_class' => array(
						'type' => 'text',
						'label' => esc_html__( 'Additional CSS class', 'psycheco' ),
						'wp-customizer-args' => array(
							'active_callback' => '__return_true',
						),
					)
				),
			),
			'share_buttons'   => array(
				'title' => esc_html__( 'Theme Share Buttons', 'psycheco' ),

				'options' => array(
					'share_facebook'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Facebook Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
					'share_twitter'     => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Twitter Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
					'share_pinterest'   => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Pinterest Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
					'share_linkedin'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable LinkedIn Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
					'share_tumblr'      => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Tumblr Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
					'share_reddit'      => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__( 'Enable Reddit Share Button', 'psycheco' ),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__( 'Enabled', 'psycheco' ),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__( 'Disabled', 'psycheco' ),
						),
					),
				),
				'wp-customizer-args' => array(
					'active_callback' => '__return_true',
				),
			),
		),
	),
);