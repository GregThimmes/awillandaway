<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

?>

<div class="fw-testimonial-item <?php echo esc_attr( $atts['hide_quotes'] ); ?>">
    <div class="quote-top">
        <p class="quote-content">
			<?php echo esc_html( $atts['content'] ); ?>
        </p>
    </div>
    <div class="quote-bottom">
	    <?php if ( ! empty( $atts['author_avatar']['url'] ) ) : ?>
            <div class="quote-image">
                <img src="<?php echo esc_attr( $atts['author_avatar']['url'] ); ?>"
                     alt="<?php echo esc_attr( $atts['author_name'] ); ?>"/>
            </div>
	    <?php endif; ?>
        <div class="quote-bottom-content">
			<h6 class="quote-name"><?php echo esc_html( $atts['author_name'] ); ?></h6>
            <span>
                <?php echo esc_html( $atts['author_job'] ); ?>
            </span>
			<?php echo esc_html( $atts['author_job'] && $atts['site_name'] ) ? ',' : ''; ?>
			<?php if ( $atts['site_url'] ) : ?>
            <a href="<?php echo esc_attr( $atts['site_url'] ); ?>">
				<?php endif; //site_url ?>
				<?php echo esc_html( $atts['site_name'] ); ?>
				<?php if ( $atts['site_url'] ) : ?>
            </a>
		<?php endif; //site_url ?>
        </div>
    </div>
</div> <!-- .testimonials-slider.owl-carousel -->
