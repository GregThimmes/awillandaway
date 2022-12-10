<?php

/**
 * TGM Plugin Activation
 */
require_once PSYCHECO_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

if ( ! function_exists( 'psycheco_action_register_required_plugins' ) ):
	/** @internal */
	function psycheco_action_register_required_plugins() {
		tgmpa( array (
			array (
				'name'             => esc_html__('Unyson', 'psycheco'),
				'slug'             => 'unyson',
				'required'         => true,
			),
			array (
				'name'             => esc_html__('MWTemplates Theme Addons','psycheco'),
				'slug'             => 'mwt-addons',
				'source'           => esc_url( 'http://webdesign-finder.com/psycheco_v2/plugins/mwt-addons.zip' ),
				'required'         => true,
				'version'          => '1.0',
			),
			array (
				'name'             => esc_html__( 'MWT Helpers', 'psycheco'),
				'slug'             => 'mwt-helpers',
				'source'           => esc_url( 'http://webdesign-finder.com/psycheco_v2/plugins/mwt-helpers.zip'),
				'required'         => true,
				'version'          => '1.0',
			),
			array(
				'name'             => esc_html__( 'Widget CSS Classes', 'psycheco' ),
				'slug'             => 'widget-css-classes',
				'required'         => false,
			),
			array (
				'name'             => esc_html__( 'MailChimp', 'psycheco'),
				'slug'             => 'mailchimp-for-wp',
				'required'         => false,
			),
			array(
				'name'             => esc_html__( 'Classic Editor', 'psycheco'),
				'slug'             => 'classic-editor',
				'required'         => true,
			),
			array(
				'name'             =>  esc_html__( 'User custom avatar', 'psycheco' ),
				'slug'             => 'wp-user-avatar',
				'required'         => false,
			),
			array (
				'name'             => esc_html__( 'AccessPress Social Counter', 'psycheco' ),
				'slug'             => 'accesspress-social-counter',
				'required'         => false,
			),
			array(
				'name'             =>  esc_html__( 'WooCommerce', 'psycheco' ),
				'slug'             => 'woocommerce',
				'required'         => false,
			),
			array(
				'name'             =>  esc_html__( 'Unyson WooComerce Shortcodes', 'psycheco' ),
				'slug'             => 'uws-unyson-woocommerce-shortcodes',
				'required'         => false,
			),
			array(
				'name'             => esc_html__('Envato Market', 'psycheco'),
				'slug'             => 'envato-market',
				'source'           => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
				'required'         => true, // please do not turn to false!
			),
			array(
				'name'             =>  esc_html__( 'Comment Form Js Validation', 'psycheco' ),
				'slug'             => 'comment-form-js-validation',
				'required'         => false,
			),
			array(
				'name'             => esc_html__( 'Booked', 'psycheco' ),
				'slug'             => 'booked',
				'source'           => esc_url( 'http://webdesign-finder.com/remote-demo-content/common-plugins-original/booked.zip' ),
				'required'         => false,
			),
			array(
				'name'             => esc_html__( 'Snazzy Maps', 'psycheco' ),
				'slug'             => 'snazzy-maps',
				'required'         => true,
			),
		),
			array(
				'domain'       => 'psycheco',
				'dismissable'  => false,
				'is_automatic' => false
			) );
	}
endif;
add_action( 'tgmpa_register', 'psycheco_action_register_required_plugins' );