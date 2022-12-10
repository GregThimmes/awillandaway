<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - title item layout
 */
//wrapping in div for carousel layout
?>
<div class="widget_portfolio-item">
	<div class="vertical-item gallery-title-item content-absolute">
		<div class="item-media">
			<?php
			if ( function_exists( 'psycheco_post_thumbnail' ) ) {
			    psycheco_post_thumbnail();
            }
			?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
		</div>
        <div class="item-title text-center">
            <h5 class="item-meta">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h5>
        </div>
    </div><!-- eof vertical-item -->
</div><!-- eof widget item -->