<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Posts - regular item layout
 */

//has thumbnail layout
if ( get_the_post_thumbnail() ) :
	?>
	<div class="vertical-item item-gallery content-absolute text-center cs">
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<div class="links-wrap">
					<a class="link-zoom photoswipe-link fs-20"
					   href="<?php echo esc_attr( $full_image_src ); ?>"></a>
				</div>
			</div>
		</div>
		<div class="item-content">
			<h6 class="item-meta links-darkgrey">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h6>
		</div>
	</div>
	<?php
//no featured image
else :
	?>
	<div class="vertical-item item-no-image text-center display_table">
		<div class="item-content display_table_cell">
			<h4 class="item-meta  links-darkgrey">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h4>
		</div>
	</div>
	<?php
endif;
?>