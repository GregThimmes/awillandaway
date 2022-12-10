<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$class = !empty( $atts['class'] ) ? $atts['class'] : '';

?>
<div class="icon-inline <?php echo esc_attr( $class ); ?>">
    <?php if ( $atts['icon'] ): ?>
        <div class="icon-styled">
            <i class="<?php echo esc_attr( $atts['icon'] . ' ' . $atts['icon_style'] . ' ' . $atts['icon_font_size'] ); ?>"></i>
        </div>
    <?php endif; //icon
    ?>
    <p>
        <?php if ( ! empty ( $atts['title'] ) ) : ?>
        <span class="fw-icon-title color-darkgrey fw-500">
            <?php echo wp_kses_post( $atts['title'] ); ?>
        </span>
        <?php endif; ?>
        <?php echo wp_kses_post( $atts['text'] ); ?>
    </p>
</div>
