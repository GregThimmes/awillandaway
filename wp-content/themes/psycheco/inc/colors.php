<?php

if ( ! function_exists( 'psycheco_get_theme_colors_defaults' ) ) :
	/**
	 * Return default values for uninitialized theme mods.
	 * https://make.wordpress.org/themes/tag/theme-mods-api/
	 */
	
	function psycheco_get_theme_colors_defaults() {
		
		$colorMain     = ! empty( psycheco_get_option( 'colorMain' ) ) ? psycheco_get_option( 'colorMain' ) : '#31B3B3';
		$colorMain2    = ! empty( psycheco_get_option( 'colorMain2' ) ) ? psycheco_get_option( 'colorMain2' ) : '#F69732';
		$colorMain3    = ! empty( psycheco_get_option( 'colorMain3' ) ) ? psycheco_get_option( 'colorMain3' ) : '#DE2F5F';
		$colorMain4    = ! empty( psycheco_get_option( 'colorMain4' ) ) ? psycheco_get_option( 'colorMain4' ) : '#7968ac';
		$darkgreyColor = ! empty( psycheco_get_option( 'darkgreyColor' ) ) ? psycheco_get_option( 'darkgreyColor' ) : '#323232';
		$darkColor     = ! empty( psycheco_get_option( 'darkColor' ) ) ? psycheco_get_option( 'darkColor' ) : '#444444';
		$greyColor     = ! empty( psycheco_get_option( 'greyColor' ) ) ? psycheco_get_option( 'greyColor' ) : '#f5f5f5';
		$fontColor     = ! empty( psycheco_get_option( 'fontColor' ) ) ? psycheco_get_option( 'fontColor' ) : '#808080';
		
		$defaults = array(
			'colorMain' => $colorMain,
			'colorMain2' => $colorMain2,
			'colorMain3' => $colorMain3,
			'colorMain4' => $colorMain4,
			'darkgreyColor' => $darkgreyColor,
			'darkColor' => $darkColor,
			'greyColor' => $greyColor,
			'fontColor' => $fontColor,
		);
		return apply_filters( 'psycheco_theme_colors_defaults', $defaults );
	}
endif;

/* psycheco_set_color_palette */
if ( !function_exists( 'psycheco_set_color_palette' ) ) {
	function psycheco_set_color_palette() {
		$color_palette = psycheco_get_theme_colors_defaults();
		$array = array();
		foreach($color_palette as $val) {
			$array[] = $val;
		}
		return $array;
	}
} //psycheco_set_color_palette

if ( ! function_exists( 'psycheco_get_theme_colors' ) ) :
	/**
	 * Return default values for uninitialized theme mods.
	 * https://make.wordpress.org/themes/tag/theme-mods-api/
	 */
	function psycheco_get_theme_colors() {

		$colors = array(
			'colorMain' => '#31B3B3',
			'colorMain2' => '#F69732',
			'colorMain3' => '#DE2F5F',
			'colorMain4' => '#7968ac',
			'darkgreyColor' => '#323232',
			'darkColor' => '#444444',
			'greyColor' => '#f5f5f5',
			'fontColor' => '#808080',
		);

		if ( function_exists(  'fw_get_db_customizer_option' ) ) :
			foreach ( $colors as $color_id => $color_value ) {
				$customizer_color = fw_get_db_customizer_option( $color_id );
				if ( ! empty( $customizer_color ) ) {
					$colors[ $color_id ] = $customizer_color;
				}
			}
		endif;

		return $colors;
	}
endif;

//live preview color scripts
if ( ! function_exists( 'psycheco_action_customizer_enqueue_css_variables_script' ) ) :
	function psycheco_action_customizer_enqueue_css_variables_script() {
		
		wp_register_script(
			'psycheco-customizer-scss',
			PSYCHECO_THEME_URI . '/js/theme-customizer-scss.js',
			array( 'jquery','customize-preview' ),
			PSYCHECO_THEME_VERSION,
			true
		);
		
		wp_enqueue_script(
			'psycheco-customizer-scss'
		);
	}
endif;
