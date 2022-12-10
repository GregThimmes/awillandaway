<?php
/*
Plugin Name: Modern Web Templates theme addons
Description: Additional functions for theme (post likes, views count, post share buttons).
Version:     1.0.0
Author:      mwtemplates
Author URI:  https://themeforest.net/user/mwtemplates/
License:     GPLv2 or later
*/


$plugin_path = plugin_dir_path(__FILE__ );

// Functions
if( get_template() !== 'psycheco' ) {
	include_once( $plugin_path . 'functions.php' );
}

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'mwt_login_form' ) ) :
	
	function mwt_login_form() {
		$redirect_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$html         = '';
		if ( ! is_user_logged_in() ) {
			$html = '
			<div class="site-login dropdown">
				<a href="#" data-toggle="dropdown" class="highlight"><i class="fa fa-user" aria-hidden="true"></i> ' . esc_html__( 'Login', 'psycheco' ) . '</a>
				<a href="#" data-toggle="dropdown" class="highlight"><i class="fa fa-lock" aria-hidden="true"></i> ' . esc_html__( 'Register', 'psycheco' ) . '</a>
				<div class="dropdown-menu login-form-dropdown">
				
			<div class="form-wrapper light-gray-border ">
			<form name="loginform" id="login-dropdown-loginform" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
				<div class="form-group">
					<label for="login-dropdown-user_login">' . esc_html__( 'Username', 'psycheco' ) . '</label>
					<input type="text" name="log" id="login-dropdown-user_login" class="form-control" value="" placeholder="' . esc_html__( 'Login', 'psycheco' ) . '">
				</div>
				<div class="form-group">
					<label for="login-dropdown-user_pass">' . esc_html__( 'Password', 'psycheco' ) . '</label>
					<input type="password" name="pwd" id="login-dropdown-user_pass" class="form-control" value="" placeholder="' . esc_html__( 'Password', 'psycheco' ) . '">
				</div>
				<div class="checkbox">
					<label>
						<input name="rememberme" type="checkbox" id="login-dropdown-rememberme" value="forever"> ' . esc_html__( 'Remember Me', 'psycheco' ) . '
					 </label>
				</div>
				<input type="submit" name="wp-submit" id="login-dropdown-wp-submit" class="btn btn-maincolor" value="' . esc_html__( 'Log In', 'psycheco' ) . '" />';
			
			if ( get_option( 'users_can_register' ) ) {
				$html .= ' <a href="' . esc_url( wp_registration_url() ) . '" class="btn btn-maincolor2">' . esc_html__( 'Register', 'psycheco' ) . '</a>';
			}
			
			$html .= '<input type="hidden" name="redirect_to" value="' . esc_url( $redirect_url ) . '" />
			</form>';
			$html .= '<a class="d-block mt-15" href="' . esc_url( wp_lostpassword_url( $redirect_url ) ) . '">' . esc_html__( 'Forgot Your Password?', 'psycheco' ) . '</a></div>
</div></div>
';
		} else {
			$html = '<a href="' . esc_url( wp_logout_url( $redirect_url ) ) . '" class="highlight"><i class="fa fa-unlock-alt" aria-hidden="true"></i> ' . esc_html__( 'Log out', 'psycheco' ) . '</a>';
			if ( current_user_can( 'read' ) ) {
				$html .= '<a href="' . admin_url() . '" class="highlight"><i class="fa fa-link" aria-hidden="true"></i> ' . esc_html__( 'Site Admin', 'psycheco' ) . '</a>';
			}
		}
		echo $html;
	} //mwt_login_form()

endif;

//mods
require_once  plugin_dir_path( __FILE__ ) . '/mods/mod-post-likes.php';
require_once  plugin_dir_path( __FILE__ ) . '/mods/mod-post-views.php';
require_once  plugin_dir_path( __FILE__ ) . '/mods/mod-post-share-buttons.php';

//unyson extensions
require_once  plugin_dir_path( __FILE__ ) . '/mwt-unyson-extensions.php';

//custom widgets
require_once  plugin_dir_path( __FILE__ ) . '/mwt-widgets.php';

//adding user social contacts
if ( ! function_exists( 'mwt_filter_modify_user_contact_methods' ) ):
	function mwt_filter_modify_user_contact_methods( $profile_fields ) {

		// Add new fields
		$profile_fields['twitter']        = esc_html__( 'Twitter URL', 'mwt' );
		$profile_fields['facebook']       = esc_html__( 'Facebook URL', 'mwt' );
		$profile_fields['position']       = esc_html__( 'Position', 'mwt' );

		return $profile_fields;

	}
endif; //function_exists
add_filter( 'user_contactmethods', 'mwt_filter_modify_user_contact_methods' );

//Unyson Extensions Fix
if ( ! function_exists( '_mwt_fw_filter_github_api_url' ) ) :
  function _mwt_fw_filter_github_api_url( $url ) {
    return 'https://api.github.com';
  }
endif;

add_filter( 'fw_github_api_url', '_mwt_fw_filter_github_api_url', 999 );
