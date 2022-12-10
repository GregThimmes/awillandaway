<?php

// share buttons
if ( ! function_exists( 'psycheco_share_this' ) ) :
	/**
	 * Share article through social networks.
	 * bool $only_buttons
	 */
	function psycheco_share_this( $only_buttons = false ) {
		if ( function_exists( 'mwt_share_this' ) ) {
			mwt_share_this( $only_buttons );
		}
	} //psycheco_share_this()
endif; //function_exists