<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

//if no video URL - nothing to show - returning
if ( empty( $atts['url'] ) ) {
	return;
}

global $wp_embed;

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '300';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '200';
$iframe = $wp_embed->run_shortcode( '[embed  width="' . $width . '" height="' . $height . '"]' . trim( $atts['url'] ) . '[/embed]' );

$image_class = !empty( $atts['image'] ) ? 'has-image' : 'without-image';

?>
<div class="video-popup-wrapper shortcode-container <?php echo esc_attr( $image_class ); ?>">
	<?php if ( ! empty( $atts['image'] ) ) : ?>
	<a href="#" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="photoswipe-link">
	    <?php echo '<img  src="' . esc_url( $atts['image']['url'] ) . '" alt="' . esc_html( $atts['image']['url'] ) . '" />'; ?>
        <span class="video-popup-link2"></span>
	</a>
	<?php
	//no image
	else:
	?>
	<a href="#" data-iframe="<?php echo esc_attr( $iframe ) ?>" class="photoswipe-link">
        <span class="video-popup-link2"></span>
	</a>
	<?php endif; ?>
</div>
