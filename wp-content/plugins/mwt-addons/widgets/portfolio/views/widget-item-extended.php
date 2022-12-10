<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Widget Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding padding-small box-shadow text-center">
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php echo get_the_post_thumbnail(); ?>
			<div class="media-links">
				<a class="abs-link color-main" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<h5 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<?php if ( get_the_term_list( get_the_ID(), 'category', '', ' ',
			'' )
		) : ?>
			<div class="cat-links mb-20">
				<?php
				echo get_the_term_list( get_the_ID(), 'category', '', ' ', '' );
				?>
			</div>
		<?php endif; //terms check ?>
		<?php the_excerpt(); ?>
	</div>
</div><!-- eof vertical-item -->

