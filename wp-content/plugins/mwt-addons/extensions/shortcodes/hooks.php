<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
if ( ! function_exists( 'psycheco_filter_disable_shortcodes' ) ) :
	function psycheco_filter_disable_shortcodes( $to_disable ) {
		$to_disable[] = 'call_to_action';

		return $to_disable;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'psycheco_filter_disable_shortcodes' );