<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - regular item layout
 */
?>
<div class="vertical-item item-gallery content-absolute text-center cs">
	<div class="item-media">
		<?php
		the_post_thumbnail('psycheco-square' );
		?>
		<div class="media-links">
			<a class="abs-link"  href="<?php echo esc_url( get_permalink() ); ?>"></a>
		</div>
	</div>

</div>