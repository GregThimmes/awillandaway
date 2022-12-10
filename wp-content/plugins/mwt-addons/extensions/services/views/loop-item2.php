<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

?>

<div class="icon-box service-box text-center">
	<?php if ( $icon_array['icon_type'] )  : ?>
    <a href="<?php the_permalink(); ?>">
        <div class="icon-styled color-main fs-50">
            <?php echo wp_kses_post( $icon_array['icon_html']); ?>
        </div>
     </a>
	<?php endif; //has_post_thumbnail ?>
    <h5 class="service-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h5>
    <?php if ( has_excerpt() ) {
	    the_excerpt();
    } ?>
</div><!-- eof .teaser -->
