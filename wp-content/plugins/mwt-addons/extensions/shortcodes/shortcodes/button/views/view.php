<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
* @var $atts The shortcode attributes
*/

$size = isset( $atts['size'] ) ? $atts['size'] : '';

?>

<a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $atts['color'] . ' ' . $size . ' ' . $atts['wide_button'] . ' ' . $atts['class'] ); ?>">
	<span><?php echo esc_html( $atts['label'] ); ?></span>
</a>
