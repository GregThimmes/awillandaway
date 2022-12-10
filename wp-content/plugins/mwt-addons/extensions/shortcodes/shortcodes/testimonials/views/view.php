<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['testimonials'] ) ) {
    return;
}

$id = uniqid( 'testimonials-' );

if ( ! empty( $atts['title'] ) ): ?>
    <h3 class="fw-testimonials-title text-center"><?php echo esc_html( $atts['title'] ); ?></h3>
<?php endif;

switch ( $atts['layout'] ) :
case '2':
?>

    <div class="testimonials-slider2 owl-carousel"
         data-autoplay="false"
         data-loop="true"
         data-responsive-lg="2"
         data-responsive-md="2"
         data-responsive-sm="2"
         data-nav="false"
         data-dots="true"
         data-center="true"
         data-margin="30"
    >
		<?php foreach ( $atts['testimonials'] as $testimonial ): ?>
            <div class="quote-item ls">
                <div class="quote-image">
					<?php
					$author_image_url = ! empty( $testimonial['author_avatar']['url'] )
						? $testimonial['author_avatar']['url']
						: fw_get_framework_directory_uri( '/static/img/no-image.png' );
					?>
                    <img src="<?php echo esc_attr( $author_image_url ); ?>"
                         alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
                </div>
                <div class="quote-content">
					<?php if ( ! empty( $testimonial['author_name'] ) ) : ?>
                        <h6 class="quote-name">
							<?php echo esc_html( $testimonial['author_name'] ); ?>
                        </h6>
					<?php endif; ?>
					<?php if ( ! empty( $testimonial['content'] ) ) : ?>
                        <p class="content"><?php echo esc_html( $testimonial['content'] ); ?></p>
					<?php endif; ?>
                    <div class="quote-meta">
						<?php if ( ! empty( $testimonial['quote_date'] ) ) : ?>
                            <p class="quote-date color-darkgrey">
                                <i class="ico ico-clock2 color-main"></i>
								<?php echo esc_html( $testimonial['quote_date'] ); ?>
                            </p>
						<?php endif; ?>
						<?php if ( ! empty( $testimonial['author_job'] ) ) : ?>
                            <p class="quote-position"><?php echo esc_html( $testimonial['author_job'] ); ?></p>
						<?php endif; ?>
						<?php if ( $testimonial['site_name'] ) : ?>
							<?php if ( $testimonial['site_url'] ) : ?>
                                <a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
							<?php endif; //site_url ?>
							<?php echo esc_html( $testimonial['site_name'] ); ?>
							<?php if ( $testimonial['site_url'] ) : ?>
                                </a>
							<?php endif; //site_url ?>
						<?php endif; //site  ?>
                    </div>
					<?php if ( !empty( $testimonial['social_icons'] ) ) {
						echo fw_ext( 'shortcodes' ) -> get_shortcode( 'icons_social' ) -> render( array( 'social_icons' => $testimonial['social_icons'] ) );
					} ?>
                </div>
            </div>
		<?php endforeach; ?>
    </div> <!-- .testimonials-slider2 -->
<?php
//2
break;
case '3':
?>
<div class="testimonials-wrapper">
    <div class="testimonials-custom-nav">
        <div class="testimonials-next">
            <i class="rt-icon2-chevron-thin-left"></i>
        </div>
        <div class="testimonials-prev">
            <i class="rt-icon2-chevron-thin-right"></i>
        </div>
    </div>
    <div class="testimonials-slider3 owl-carousel"
         data-autoplay="false"
         data-loop="true"
         data-responsive-lg="2"
         data-responsive-md="2"
         data-responsive-sm="1"
         data-nav="false"
         data-dots="false"
    >
		<?php foreach ( $atts['testimonials'] as $testimonial ): ?>
            <div class="quote-item">
                <p class="quote-content">
		            <?php echo esc_html( $testimonial['content'] ); ?>
                </p>
                <div class="quote-bottom">
                    <?php if ( ! empty( $testimonial['author_avatar']['url'] ) ) : ?>
                        <div class="quote-image">
                            <img src="<?php echo esc_attr( $testimonial['author_avatar']['url'] ); ?>"
                                 alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
                        </div>
                    <?php endif; ?>
                    <div class="quote-bottom-content">
                        <h6><?php echo esc_html( $testimonial['author_name'] ); ?></h6>
                        <p class="quote-meta">
                            <span>
                                <?php echo esc_html( $testimonial['author_job'] ); ?>
                            </span>
                            <?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
                            <?php if ( $testimonial['site_url'] ) : ?>
                            <a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
                                <?php endif; //site_url ?>
                                <?php echo esc_html( $testimonial['site_name'] ); ?>
                                <?php if ( $testimonial['site_url'] ) : ?>
                            </a>
                        <?php endif; //site_url ?>
                        </p>
                        <?php if ( ! empty( $testimonial['quote_date'] ) ) : ?>
                            <p class="quote-date">
                                <i class="ico ico-clock2 color-main"></i>
                                <?php echo esc_html( $testimonial['quote_date'] ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div> <!-- .testimonials-slider3.owl-carousel -->
</div>
<?php
//3
break;
default:
?>
    <div class="testimonials-slider owl-carousel"
         data-autoplay="false"
         data-loop="true"
         data-responsive-lg="1"
         data-responsive-md="1"
         data-responsive-sm="1"
         data-nav="false"
         data-dots="true"
         data-animateout="fadeOut"
    >
		<?php foreach ( $atts['testimonials'] as $testimonial ): ?>
            <div class="quote-item">
				<?php if ( ! empty( $testimonial['author_avatar']['url'] ) ) : ?>
                    <div class="quote-image">
                        <img src="<?php echo esc_attr( $testimonial['author_avatar']['url'] ); ?>"
                             alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>"/>
                    </div>
				<?php endif; ?>
                <h4 class="quote-content">
					<?php echo esc_html( $testimonial['content'] ); ?>
                </h4>
                <p class="quote-meta">
					<?php echo esc_html( $testimonial['author_name'] ); ?>
					<?php echo esc_html( $testimonial['author_job'] || $testimonial['site_name'] ) ? ',' : ''; ?>
                    <span>
                        <?php echo esc_html( $testimonial['author_job'] ); ?>
                    </span>
					<?php echo esc_html( $testimonial['author_job'] && $testimonial['site_name'] ) ? ',' : ''; ?>
					<?php if ( $testimonial['site_url'] ) : ?>
                        <a href="<?php echo esc_attr( $testimonial['site_url'] ); ?>">
                            <?php endif; //site_url ?>
                            <?php echo esc_html( $testimonial['site_name'] ); ?>
                            <?php if ( $testimonial['site_url'] ) : ?>
                        </a>
                    <?php endif; //site_url ?>
                </p>
	            <?php if ( ! empty( $testimonial['quote_date'] ) ) : ?>
                    <p class="quote-date color-darkgrey">
                        <i class="ico ico-clock2 color-main"></i>
                        <?php echo esc_html( $testimonial['quote_date'] ); ?>
                    </p>
                <?php endif; ?>
            </div>
		<?php endforeach; ?>
    </div> <!-- .testimonials-slider.owl-carousel -->
<?php endswitch;
