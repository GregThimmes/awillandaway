<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */
if ( ! $atts['heading_text'] ) {
	return;
}

?>

<div class="fw-section-heading <?php echo esc_attr( $atts['horizontal_position'] . ' ' .  $atts['additional_class'] . ' ' .  $atts['rotate_heading'] ); ?>">
    <p class="<?php echo esc_attr( $atts['heading_text_color'] ); ?>"><?php echo wp_kses_post( $atts['heading_text'] ); ?></p>
</div>



