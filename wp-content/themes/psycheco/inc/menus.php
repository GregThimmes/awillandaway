<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */

register_nav_menus( array(
	'primary' => esc_html__( 'Top primary menu', 'psycheco' ),
	'topline' => esc_html__( 'Topline secondary menu', 'psycheco' ),
	'copyright' => esc_html__( 'Copyright secondary menu', 'psycheco' ),
) );