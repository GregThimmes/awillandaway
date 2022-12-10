<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$image  = isset( $atts['image'] ) ? $atts['image'] : false;
?>
<div class="fw-theme-signature">
	
	<?php if ( ! empty( $atts['author_image'] ) ): ?>
        <div class="author-image">
            <img src="<?php echo esc_url( $atts['author_image']['url'] ); ?>"
                 alt="<?php echo esc_attr( $atts['author_image']['url'] ); ?>">
        </div>
	<?php endif; ?>
    <div class="author-bio">
        <?php if ( !empty( $atts['author_name'] ) ) : ?>
            <p class="author-name color-darkgrey fw-700">
                <?php echo esc_html( $atts['author_name'] ); ?>
            </p>
        <?php endif; ?>
        <?php if ( !empty( $atts['author_position'] ) ) : ?>
            <p class="author-position color-darkgrey">
                <?php echo esc_html( $atts['author_position'] ); ?>
            </p>
        <?php endif; ?>
    </div>
	<?php if ( ! empty( $atts['signature_image'] ) ): ?>
        <div class="signature-image">
            <img src="<?php echo esc_url( $atts['signature_image']['url'] ); ?>"
                 alt="<?php echo esc_attr( $atts['signature_image']['url'] ); ?>">
        </div>
	<?php endif; ?>
</div>