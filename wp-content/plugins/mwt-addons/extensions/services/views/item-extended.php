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

<div class="service-item vertical-item content-padding padding-small box-shadow ls">
	<?php if ( has_post_thumbnail( ) ) : ?>
		<div class="item-media">
			<?php the_post_thumbnail('full-width'); ?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h6 class="service-title mb-20 mb-lg-30">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h6>
		<div>
			<?php the_excerpt(); ?>
		</div>
		<div class="item-button mt-30 mt-lg-50">
			<a href="<?php the_permalink(); ?>"
			   class="btn-link"><?php echo esc_html__( 'View Services', 'mwt' ); ?></a>
		</div>
	</div>
</div><!-- eof .teaser -->
