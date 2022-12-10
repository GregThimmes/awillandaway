<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

//for counter
$number                  = isset( $atts['number'] ) ? ( int ) $atts['number'] : false;
$counter_additional_text = isset( $atts['counter_additional_text'] ) ? $atts['counter_additional_text'] : false;
$speed                   = isset( $atts['speed'] ) ? $atts['speed'] : false;

$link = $atts['link'];

?>

<div class="counter-box <?php echo esc_attr( $atts['class'] . ' ' . $atts['text_align'] . ' ' . $atts['border'] ); ?>">
	<?php if( $link ) : ?>
        <a href="<?php echo esc_url( $link ); ?>">
    <?php endif;
    if ( $counter_additional_text ) : ?>
        <h3 class="fs-56 counter-wrap">
            <span class="counter <?php echo esc_attr( $atts['count_color'] ); ?>" data-from="0" data-to="<?php echo esc_attr( $number ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>">0</span><span class="counter-add <?php echo esc_attr( $atts['count_color'] ); ?>"><?php echo esc_html( $counter_additional_text ); ?></span>
        </h3>
    <?php else : //no counter adds ?>
        <h3 class="fs-56">
            <span class="counter <?php echo esc_attr( $atts['count_color'] ); ?>" data-from="0" data-to="<?php echo esc_attr( $number ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>">0</span>
        </h3>
    <?php endif;
    if( $link ) : ?>
        </a>
    <?php endif; ?>
	<?php if( $atts['content'] ) : ?>
        <p class="counter-content"><?php echo wp_kses_post( $atts['content'] ); ?></p>
	<?php endif; ?>
</div>