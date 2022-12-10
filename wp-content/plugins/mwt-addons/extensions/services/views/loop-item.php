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
$pID = get_the_ID();

?>

<div class="service-item vertical-item content-padding padding-small hero-bg">
	<?php if ( has_post_thumbnail( ) ) : ?>
		<div class="item-media">
			<?php the_post_thumbnail(); ?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h5 class="service-title mb-15">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<div>
			<?php if ( has_excerpt() ) {
				the_excerpt();
			} ?>
		</div>
	</div>
</div><!-- eof .teaser -->
