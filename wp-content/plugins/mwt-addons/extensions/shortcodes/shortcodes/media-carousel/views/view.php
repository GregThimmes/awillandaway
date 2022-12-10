<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$items         = $atts['items'];
$loop          = $atts['loop'];
$nav           = $atts['nav'];
$autoplay      = $atts['autoplay'];
$responsive_lg = $atts['responsive_lg'];
$responsive_md = $atts['responsive_md'];
$responsive_sm = $atts['responsive_sm'];
$responsive_xs = $atts['responsive_xs'];
$margin        = $atts['margin'];

?>
<div class="owl-carousel"
	 data-items="<?php echo esc_attr( $responsive_lg ); ?>"
	 data-loop="<?php echo esc_attr( $loop ); ?>"
	 data-nav="<?php echo esc_attr( $nav ); ?>"
	 data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
	 data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
	 data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
	 data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
	 data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
	 data-margin="<?php echo esc_attr( $margin ); ?>"
>
	<?php
	if ( ! empty( $items ) ) :
		foreach ( $items as $item ) :
			?>
			<div class="card text-center <?php echo esc_attr( trim( $item['background_color'] ) ); ?>">
				<div class="item-media">

					<img src="<?php echo esc_url( $item['image']['url'] ); ?>"
						 alt="<?php echo esc_attr( $item['image_title'] ); ?>">
						<div class="media-links">
						<?php if( ! empty( $item['url'] ) ) : ?>
							<a href="<?php echo esc_url( $item['url'] ); ?>" class="color-main abs-link"></a>
						<?php endif; //url ?>
					</div>
				</div>
				<div class="card-body">
					<?php if( ! empty( $item['image_title'] ) ) : ?>
					<h5 class="card-title <?php echo esc_attr(  $item['title_size']); ?>"><?php echo wp_kses_post( $item['image_title'] ); ?></h5>
					<?php endif; ?>
					<?php if( ! empty( $item['image_excerpt'] ) ) : ?>
						<p class="card-text"><?php echo wp_kses_post( $item['image_excerpt'] ); ?></p>
					<?php endif; ?>
					<?php if ( !empty( $item['image_buttons'] ) ) : ?>
						<div class="card-button">
							<?php foreach( $item['image_buttons'] as $button ) : ?>
								<?php echo fw()->extensions->get('shortcodes')->get_shortcode('button')->render($button); ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
		endforeach;
	endif;
	?>
</div>
