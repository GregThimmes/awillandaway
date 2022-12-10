<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if ( isset( $data['slides'] ) ):
	$class = ( ! empty ( $data['settings']['extra']['class'] ) ) ? $data['settings']['extra']['class'] : '';
	$dots = ( ! empty ( $data['settings']['extra']['dots'] ) ) ? $data['settings']['extra']['dots'] : '';
	$speed = ( ! empty ( $data['settings']['extra']['speed'] ) ) ? $data['settings']['extra']['speed'] : '';
	$scroll_link = ( ! empty ($data['settings']['extra']['scroll_link']['scroll_link'] ) ) ? $data['settings']['extra']['scroll_link']['scroll_link'] : '';
	?>
    <section class="intro_section page_slider theme-slide2 <?php echo esc_attr( $class ); ?>">
        <div class="flexslider"
			<?php if ( ! empty( $dots) ) : ?>
                data-dots="<?php echo esc_attr( $dots ) ?>"
			<?php endif; ?>
                data-nav="false"
			<?php if ( ! empty( $speed) ) : ?>
                data-speed="<?php echo esc_attr( $speed ) ?>"
			<?php endif; ?>
        >
	        <?php if ( !empty( $scroll_link ) || !empty( $scroll_link ) || !empty( $scroll_link ) ) : ?>
                <div class="scroll-link">
                    <a href="<?php echo esc_url( $scroll_link['scroll_id'] ); ?>">
				        <h6><?php echo esc_html( $scroll_link['scroll_text'] ); ?></h6>
                    </a>
                </div>
	        <?php endif; ?>
            <ul class="slides">
				<?php foreach ( $data['slides'] as $id => $slide ):
				$slide_background     = isset( $slide['extra']['slide_background'] ) ? $slide['extra']['slide_background'] : false;
				$slide_align          = isset( $slide['extra']['slide_align'] ) ? $slide['extra']['slide_align'] : '';
				$slide_vertical_align = isset( $slide['extra']['slide_vertical_align'] ) ? $slide['extra']['slide_vertical_align'] : '';
				$slide_class          = isset( $slide['extra']['class'] ) ? $slide['extra']['class'] : '';
				$slide_layers         = isset( $slide['extra']['slide_layers'] ) ? $slide['extra']['slide_layers'] : false;
				$buttons              = isset( $slide['extra']['slide_buttons'] ) ? $slide['extra']['slide_buttons'] : false;
				$slide_img            = isset( $slide['extra']['slide_image'] ) ? $slide['extra']['slide_image'] : '';
				$slide_img_animation  = isset( $slide['extra']['image_animation'] ) ? $slide['extra']['image_animation'] : '';
				?>
                <li class="cover-image <?php echo esc_attr( $slide_background . ' ' . $slide_align . ' ' . $slide_class ); ?>">
					<?php if ( $slide['multimedia_type'] == 'video' ) :
						preg_match( '/(embed\/|v=|\.be\/|\/v\/)([0-9a-zA-Z_-]*)/i', trim( $slide['src'] ), $matches );
						$youtube_video_id = !empty($matches[2]) ? $matches[2] : '';
						?>
                        <div class="embed-responsive embed-responsive-16by9">
							<?php
							$iframe = wp_oembed_get( $slide['src'] );
							echo str_replace('feature=oembed', 'feature=oembed&showinfo=0&autoplay=1&controls=0&mute=1&loop=1&playlist=' . $youtube_video_id, $iframe );
							?>
                        </div>
					<?php else: ?>
                        <img src="<?php echo esc_attr( $slide['src'] ); ?>" alt="<?php echo esc_attr( strip_tags( $slide['title'] ) ); ?>">
					<?php endif;
					if ( $slide['extra']['slide_background_overlay']  ) : ?>
                        <span class="flexslider-overlay"></span>
					<?php endif; ?>
                    <div class="silde-title-full">
                        <?php if ( !empty( $slide['title'] ) ) : ?>
                            <p><?php echo wp_kses_post( $slide['title'] ); ?></p>
                        <?php endif; ?>
                    </div>
					<?php if ( ! empty( $slide['extra']['social_icons'] ) ) : ?>
                        <div class="intro_layers_wrapper social_wrapper">
                            <div class="intro_layers">
                                <div class="intro-layer" data-animation="<?php echo esc_attr( $slide['extra']['social_animation'] ); ?>">
									<?php
									//get icons-social shortcode to render icons in team member item
									$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
									if ( ! empty( $shortcodes_extension ) ) {
										echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $slide['extra']['social_icons'] ) );
									} ?>
                                </div>
                            </div>
                        </div>
					<?php endif; //social icons ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="intro_layers_wrapper <?php echo esc_attr( $slide_vertical_align ); ?>">
                                    <div class="row align-items-center">
                                        <?php if ( !empty( $slide_img['url'] ) ) : ?>
                                            <div class="col-12 col-lg-7 image-slide-wrap intro_layers">
                                                <div class="intro-layer" data-animation="<?php echo esc_attr( $slide_img_animation ); ?>">
                                                    <img src="<?php echo esc_url( $slide_img['url'] ); ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-12 col-md-12 col-lg-5 content-slide-wrap">
                                            <div class="intro_layers">
                                                <?php if ( $slide_layers ) : ?>
                                                <?php foreach ( $slide_layers as $layer ):
                                                $layer_class =  ! empty( $layer['class'] ) ? $layer['class'] : '';
                                                ?>
                                                <div class="intro-layer <?php echo esc_attr( $layer_class ); ?>"
                                                     data-animation="<?php echo esc_attr( $layer['layer_animation'] ); ?>"
                                                >
                                                    <<?php echo esc_html( $layer['layer_tag'] ); ?> class="<?php echo esc_attr( $layer['layer_font_family'] . ' ' . $layer['layer_text_weight'] . ' ' . $layer['layer_text_transform'] ); ?>">
                                                    <span class="<?php echo esc_attr( $layer['layer_text_color'] ); ?>"><?php echo wp_kses_post( $layer['layer_text'] ) ?></span>
                                                </<?php echo esc_html( $layer['layer_tag'] ); ?>>
                                            </div><!-- eof .intro_layer -->
                                            <?php endforeach; //$slide_layers
                                            if ( !empty( $buttons ) ) : ?>
                                                <div class="intro-button-layer intro_layers" data-animation="<?php echo esc_attr( $slide['extra']['button_animation'] ); ?>">
                                                    <?php foreach ( $buttons as $button ) : ?>
                                                        <div class="intro-layer">
                                                            <?php echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button ); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; //$buttons
                                            endif; //$slide_layers ?>
                                            </div> <!-- eof .intro_layers -->
                                        </div>
                                    </div>
                                </div> <!-- eof .intro_layers_wrapper -->
                            </div> <!-- eof .col-* -->
                        </div><!-- eof .row -->
                    </div><!-- eof .container -->
                </li>
            <?php endforeach; ?>
            </ul>
        </div> <!-- eof flexslider -->
    </section> <!-- eof intro_section -->
<?php endif; ?>