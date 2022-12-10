<?php if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */

if ( !$atts['steps'] ) {
	return;
}

?>
<div class="fw-steps">
    <?php foreach ( $atts['steps'] as $step ) :
	    $link = $step['link'];
	    $show_button = ( ! empty( $link ) && ! empty( $step['button']['show_button'] ) && ! empty( $step['button']['button']['label'] ) ) ? true : false;
	    $button = $step['button']['button'];
	    $icon_array = psycheco_get_unyson_icon_type_v2_array( $step, 'icon' );
	    $icon_styled_class = psycheco_get_unyson_icon_styled_class( $step );
    
        ?>
        <div class="step text-center <?php echo esc_attr( $step['class'] ); ?>">
            <?php if ( !empty( $icon_array['icon_html'] ) ) : ?>
                <div class="step-icon">
                    <?php if( $link ) : ?>
                        <a href="<?php echo esc_url( $link ); ?>">
                            <?php endif; ?>
                            <div class="icon-styled <?php echo esc_attr( $icon_styled_class ); ?>">
                                <?php echo wp_kses_post( $icon_array['icon_html'] ); ?>
                            </div>
                            <?php if( $link ) : ?>
                        </a>
                    <?php endif; ?>
                </div>
		    <?php endif; ?>
            <?php if( $step['title'] ) : ?>
                <h6 class="step-title">
				    <?php if( $link ) : ?>
                        <a href="<?php echo esc_url( $link ); ?>">
                    <?php endif; ?>
                    <?php echo wp_kses_post( $step['title'] ); ?>
                    <?php if( $link ) : ?>
                        </a>
                    <?php endif; ?>
                </h6>
		    <?php endif; ?>
		    <?php if( $step['content'] ) : ?>
                <p class="step-content"><?php echo wp_kses_post( $step['content'] ); ?></p>
		    <?php endif; ?>
		    <?php if ( $show_button ) : ?>
                <a href="<?php echo esc_url( $link ) ?>"
                   class="<?php echo esc_attr( $button['color'] . ' ' . $button['size'] . ' ' . $button['class'] . ' ' . $button['wide_button'] ); ?>">
                    <span>
                       <?php echo esc_html( $button['label'] ); ?>
                    </span>
                </a>
		    <?php endif; ?>
        </div><!-- .step -->
    <?php endforeach; ?>
</div>

