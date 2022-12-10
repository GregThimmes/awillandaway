<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "font-awesome.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );
wp_deregister_style( 'font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'font-awesome',
	PSYCHECO_THEME_URI . '/css/font-awesome.css',
	array(),
	PSYCHECO_THEME_VERSION
);

//Add Flaticon Fonts
wp_enqueue_style(
	'flaticon',
	PSYCHECO_THEME_URI . '/css/flaticon.css',
	array(),
	PSYCHECO_THEME_VERSION
);

//Add rt-icons Fonts
wp_enqueue_style(
	'rt-icons1',
	PSYCHECO_THEME_URI . '/css/rt-icons.css',
	array(),
	PSYCHECO_THEME_VERSION
);

//Add icomoon icon fonts
wp_enqueue_style(
	'icomoon',
	PSYCHECO_THEME_URI . '/css/icomoon.css',
	array(),
	PSYCHECO_THEME_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'psycheco-admin_bar',
		PSYCHECO_THEME_URI . '/css/admin-frontend.css',
		array(),
		PSYCHECO_THEME_VERSION
	);
	wp_enqueue_style( 'psycheco-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'psycheco-google-font',
	psycheco_google_font_url(),
	array(),
	PSYCHECO_THEME_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'psycheco-keyboard-image-navigation',
		PSYCHECO_THEME_URI . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		PSYCHECO_THEME_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'psycheco-modernizr',
	PSYCHECO_THEME_URI . '/js/vendor/modernizr-custom.js',
	false,
	'3.6.0',
	false
);

//plugins theme script
wp_enqueue_script( 'bootstrap-bundle', PSYCHECO_THEME_URI . '/js/vendor/bootstrap.bundle.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'affix', PSYCHECO_THEME_URI . '/js/vendor/affix.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-appear', PSYCHECO_THEME_URI . '/js/vendor/jquery.appear.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-cookie', PSYCHECO_THEME_URI . '/js/vendor/jquery.cookie.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-easing', PSYCHECO_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-hoverintent', PSYCHECO_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'superfish', PSYCHECO_THEME_URI . '/js/vendor/superfish.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar', PSYCHECO_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-countdown', PSYCHECO_THEME_URI . '/js/vendor/jquery.countdown.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-countto', PSYCHECO_THEME_URI . '/js/vendor/jquery.countTo.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-easypiechart', PSYCHECO_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-scrollbar', PSYCHECO_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-localscroll', PSYCHECO_THEME_URI . '/js/vendor/jquery.localScroll.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-scrollto', PSYCHECO_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-ui-totop', PSYCHECO_THEME_URI . '/js/vendor/jquery.ui.totop.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-parallax', PSYCHECO_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'isotope-pkgd', PSYCHECO_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'jquery-flexslider', PSYCHECO_THEME_URI . '/js/vendor/jquery.flexslider-min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'owl-carousel', PSYCHECO_THEME_URI . '/js/vendor/owl.carousel.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'photoswipe', PSYCHECO_THEME_URI . '/js/vendor/photoswipe.js', array('jquery'), PSYCHECO_THEME_VERSION, true );
wp_enqueue_script( 'photoswipe-ui-default', PSYCHECO_THEME_URI . '/js/vendor/photoswipe-ui-default.min.js', array('jquery'), PSYCHECO_THEME_VERSION, true );

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
	
	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'psycheco-woo',
		PSYCHECO_THEME_URI . '/css/shop.css',
		array(),
		PSYCHECO_THEME_VERSION
	);
	
	//you can include Woo related scripts here

endif; //WooCommerce

//main theme script
wp_enqueue_script(
	'psycheco-main',
	PSYCHECO_THEME_URI . '/js/main.js',
	array( 'jquery' ),
	PSYCHECO_THEME_VERSION,
	true
);

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'fontawesome-css' );
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'psycheco-accesspress',
		PSYCHECO_THEME_URI . '/css/accesspress.css',
		array(),
		PSYCHECO_THEME_VERSION
	);
endif; //AccessPress

//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'psycheco-booked',
		PSYCHECO_THEME_URI . '/css/booked.css',
		array(),
		PSYCHECO_THEME_VERSION
	);
}//Booked

// Add Bootstrap Style
wp_enqueue_style(
	'bootstrap',
	PSYCHECO_THEME_URI . '/css/bootstrap.min.css',
	array(),
	PSYCHECO_THEME_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'psycheco-animations',
	PSYCHECO_THEME_URI . '/css/animations.css',
	array(),
	PSYCHECO_THEME_VERSION
);

// Add Theme Style
wp_enqueue_style(
	'psycheco-main',
	PSYCHECO_THEME_URI . '/css/main.css',
	array(),
	PSYCHECO_THEME_VERSION
);

// Add ":root" colors inline styles string
$psycheco_colors_string = psycheco_get_root_colors_inline_styles_string();
if ( ! empty( $psycheco_colors_string ) ) {
	wp_add_inline_style(
		'psycheco-main', wp_kses( ':root{' . $psycheco_colors_string . '}', false )
	);
}

// Add Theme stylesheet.
wp_enqueue_style( 'psycheco-style', get_stylesheet_uri(), array(), PSYCHECO_THEME_VERSION );

wp_add_inline_style( 'psycheco-main', psycheco_add_font_styles_in_head() );
wp_add_inline_style( 'psycheco-main', psycheco_custom() );

//Theme Skin
$skin = psycheco_get_option('skin', '' );
if( ! empty( $skin ) ) {
	wp_enqueue_style(
		'psycheco-skin',
		PSYCHECO_THEME_URI . '/css/' . esc_attr( $skin ) . '.css',
		array(),
		PSYCHECO_THEME_VERSION
	);
}

if( defined('FW') ) :

	//function for enqueue styles and scripts for section video background
	if (! function_exists( 'psycheco_unyson_enqueue_section_video_background_scripts' ) ) :
		function psycheco_unyson_enqueue_section_video_background_scripts() {

			// fixes https://github.com/ThemeFuse/Unyson/issues/1552
			{
				global $is_safari;

				if ($is_safari) {
					wp_enqueue_script('youtube-iframe-api', 'https://www.youtube.com/iframe_api');
				}
			}

			wp_enqueue_style(
				'psycheco-shortcode-section-background-video',
				PSYCHECO_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/css/background.css'
			);

			wp_enqueue_script(
				'psycheco-shortcode-section-formstone-core',
				PSYCHECO_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/core.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'psycheco-shortcode-section-formstone-transition',
				PSYCHECO_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/transition.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'psycheco-shortcode-section-formstone-background',
				PSYCHECO_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/background.js',
				array( 'jquery' ),
				false,
				true
			);
			wp_enqueue_script(
				'psycheco-shortcode-section',
				PSYCHECO_THEME_URI . '/framework-customizations/extensions/shortcodes/shortcodes/section/static/js/background.init.js',
				array(
					'psycheco-shortcode-section-formstone-core',
					'psycheco-shortcode-section-formstone-transition',
					'psycheco-shortcode-section-formstone-background'
				),
				false,
				true
			);
		}
	endif;
endif;
