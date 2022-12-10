<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( ! function_exists( 'psycheco_show_post_views_count' ) ) :
	function psycheco_show_post_views_count() {
		if ( function_exists( 'mwt_show_post_views_count' ) ) {
			mwt_show_post_views_count();
		}
	} //psycheco_show_post_views_count()
endif;
