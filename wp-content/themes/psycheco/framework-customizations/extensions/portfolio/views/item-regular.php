<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 *  Portfolio - regular item layout
 */
?>
<div class="vertical-item item-gallery content-absolute text-center cs">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			psycheco_post_thumbnail();
			?>
            <div class="media-links">
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
    <div class="item-content">
        <h6 class="item-meta">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h6>
    </div>
</div>