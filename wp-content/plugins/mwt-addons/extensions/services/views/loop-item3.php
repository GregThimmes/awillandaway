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

<div class="icon-box service-box2 bordered text-center">
	<?php if ( $icon_array['icon_type'] )  : ?>
    <a href="<?php the_permalink(); ?>">
        <div class="icon-styled color-darkgrey fs-40">
            <?php echo wp_kses_post( $icon_array['icon_html']); ?>
        </div>
     </a>
	<?php endif; //has_post_thumbnail ?>
    <h6 class="service-title">
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h6>
    <?php if ( has_excerpt() ) {
	    the_excerpt();
    } ?>
</div><!-- eof .teaser -->
