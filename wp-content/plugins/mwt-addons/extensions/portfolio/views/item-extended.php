<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout

?>
<div class="vertical-item content-padding hero-bg text-center">
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media">
			<?php the_post_thumbnail(); ?>
            <div class="media-links">
                <a class="abs-link" href="<?php the_permalink(); ?>"></a>
            </div>
        </div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h5 class="item-meta">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<?php
		the_excerpt();
		?>
	</div>
</div><!-- eof vertical-item -->
