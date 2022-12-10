<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$title             = $atts['title'];
$percent           = $atts['percent'];
$background_class  = $atts['background_class'];
?>

<div class="media media-left-type progress-icon-box">
     <?php if ( ! empty( $atts['icon']['icon-class'] ) ) : ?>
        <div class="icon-styled fs-40">
            <i class="<?php echo esc_attr( $atts['icon']['icon-class'] ); ?>"></i>
        </div>
     <?php endif; ?>
    <div class="media-body">
        <?php if ( ! empty( $title ) ) : ?>
            <h6 class="progress-title"><?php echo wp_kses_post( $title ); ?></h6>
        <?php endif; ?>
        <div class="progress progress2">
            <div class="progress-bar <?php echo esc_attr( $background_class ); ?>" role="progressbar"
                 data-transitiongoal="<?php echo esc_html( $percent ); ?>" aria-valuenow="<?php echo esc_html( $percent ); ?>"
                 aria-valuemin="0" aria-valuemax="100">
            </div>
            <p class="progress-percent color-darkgrey"><?php echo esc_html( $percent ); ?>%</p>
        </div>
    </div>
</div><!-- .media -->