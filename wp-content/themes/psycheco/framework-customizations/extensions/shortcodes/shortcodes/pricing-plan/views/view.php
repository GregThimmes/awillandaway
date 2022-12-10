<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $atts The shortcode attributes
 */

$price_color = ! empty( $atts['featured'] ) ? 'ds' : '';
$title_color = ! empty( $atts['title_text_color'] ) ? $atts['title_text_color'] : '';
switch ( $atts['layout'] ) :
	case '2':
?>
<div class="pricing-plan p-0 plan-layout2 <?php  echo esc_attr( $atts['featured'] . ' ' . $price_color ); ?>">
	<?php if ( !empty( $atts['image'] ) ) : ?>
        <div class="price-img">
            <img src="<?php echo esc_url( $atts['image']['url'] ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
        </div>
	<?php endif; ?>
    <?php if( ! empty( $atts['title'] ) ) : ?>
        <h4 class="plan-name">
            <span class="<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses_post( $atts['title'] ); ?></span>
        </h4>
    <?php endif; ?>
    <div class="price-wrap">
        <h2 class="plan-price mt-0 mb-0">
            <?php if ( ! empty( $atts['currency'] ) ) : ?>
                <sup class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></sup>
            <?php endif; ?>
            <?php if ( ! empty( $atts['price'] ) ) :
                echo wp_kses_post( $atts['price'] );
            endif; ?>
        </h2>
        <?php if( ! empty( $atts['price_after'] ) ) : ?>
            <span class="plan-rate"><?php echo wp_kses_post( $atts['price_after'] ); ?></span>
        <?php endif; ?>
    </div>
    <?php if( ! empty( $atts['description'] ) ) : ?>
        <div class="plan-description mt-20 color-dark">
            <?php echo wp_kses_post( $atts['description'] ); ?>
        </div>
    <?php endif; ?>
    <?php if( ! empty( $atts['features'] ) ) : ?>
        <div class="plan-features text-center">
            <ul>
                <?php foreach( ( $atts['features'] ) as $feature ) : ?>
                    <li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
                        <?php echo wp_kses_post( $feature['feature_name'] ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
	<?php if ( !empty( $atts['price_buttons'] ) ) : ?>
        <div class="plan-button">
			<?php foreach ( $atts['price_buttons'] as $button ) :
				echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
			endforeach; ?>
        </div>
	<?php endif; ?>
</div>
<?php
	//2
	break;
	case '3':
?>
<div class="pricing-plan plan-layout3 bordered <?php echo esc_attr( $atts['featured'] . ' ' . $price_color ); ?>">
    <?php if ( !empty( $atts['image'] ) ) : ?>
        <div class="price-img">
            <img src="<?php echo esc_url( $atts['image']['url'] ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
        </div>
    <?php endif; ?>
    <div class="price-content">
        <div class="price-wrap">
            <h3>
                <?php if( ! empty( $atts['currency'] ) ) : ?>
                    <span class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></span>
                <?php endif; ?>
                <?php if( ! empty( $atts['price'] ) ) : ?>
                    <span class="plan-price"><?php echo wp_kses_post( $atts['price'] ); ?></span>
                <?php endif; ?>
            </h3>
        </div>
        <?php if( ! empty( $atts['price_after'] ) ) : ?>
            <div class="plan-decimals"><?php echo wp_kses_post( $atts['price_after'] ); ?></div>
        <?php endif; ?>
        <?php if( ! empty( $atts['title'] ) ) : ?>
            <div class="plan-name">
                <h5><span class="<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses_post( $atts['title'] ); ?></span></h5>
            </div>
        <?php endif; ?>
        <?php if( ! empty( $atts['description'] ) ) : ?>
            <div class="plan-description mt-20 color-dark">
                <?php echo wp_kses_post( $atts['description'] ); ?>
            </div>
        <?php endif; ?>
        <?php if( ! empty( $atts['features'] ) ) : ?>
            <div class="plan-features">
                <ul>
                    <?php foreach( ( $atts['features'] ) as $feature ) : ?>
                        <li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
                            <?php echo wp_kses_post( $feature['feature_name'] ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if ( !empty( $atts['price_buttons'] ) ) : ?>
            <div class="plan-button">
                <?php foreach ( $atts['price_buttons'] as $button ) :
                    echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
	//3
	break;
	default:
?>
<div class="pricing-plan ls plan-default <?php echo esc_attr( $atts['featured'] . ' ' . $price_color ); ?>">
	<?php if ( !empty( $atts['image'] ) ) : ?>
        <div class="price-img">
            <img src="<?php echo esc_url( $atts['image']['url'] ); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>">
        </div>
	<?php endif; ?>
    <div class="plan-content">
         <?php if( ! empty( $atts['title'] ) ) : ?>
            <h4 class="plan-name">
                <span class="<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses_post( $atts['title'] ); ?></span>
            </h4>
        <?php endif; ?>
        <div class="price-wrap">
            <h2 class="plan-price mt-0 mb-0">
                <?php if ( ! empty( $atts['currency'] ) ) : ?>
                    <sup class="plan-sign"><?php echo wp_kses_post( $atts['currency'] ); ?></sup>
                <?php endif; ?>
                <?php if ( ! empty( $atts['price'] ) ) :
                    echo wp_kses_post( $atts['price'] );
                endif; ?>
            </h2>
            <?php if( ! empty( $atts['price_after'] ) ) : ?>
                <span class="plan-rate text-lowercase d-block"><?php echo wp_kses_post( $atts['price_after'] ); ?></span>
            <?php endif; ?>
        </div>
        <?php if( ! empty( $atts['description'] ) ) : ?>
        <div class="plan-description mt-20 color-dark">
            <?php echo wp_kses_post( $atts['description'] ); ?>
        </div>
        <?php endif; ?>
        <?php if( ! empty( $atts['features'] ) ) : ?>
        <div class="plan-features text-center">
            <ul>
            <?php foreach( ( $atts['features'] ) as $feature ) : ?>
                <li class="<?php echo esc_attr( $feature['feature_checked'] ); ?>">
                    <?php echo wp_kses_post( $feature['feature_name'] ); ?>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if ( !empty( $atts['price_buttons'] ) ) : ?>
            <div class="plan-button">
                <?php foreach ( $atts['price_buttons'] as $button ) :
                    echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endswitch;