<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - title item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
$author_id = get_the_author_meta( 'ID' );

//wrapping in div for carousel layout
?>
<article class="widget_blog-post-item item-post hero-bg <?php echo esc_attr( $filter_classes ); ?>">
    <div <?php post_class( "vertical-item " ); ?>>
		<?php if ( get_the_post_thumbnail() ) : ?>
            <div class="item-media">
				<?php
				$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				$image          = fw_resize( $full_image_src, '700', '461', true );
				$img_attributes = array(
					'src' => $image,
					'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
				);
				echo fw_html_tag( 'img', $img_attributes );
				?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
		<?php endif; //eof thumbnail check ?>
    </div><!-- eof vertical-item -->
    <div class="item-title">
        <p class="entry-title">
            <a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </p>
        <div class="entry-meta">
            <?php
            if ( function_exists( 'psycheco_the_date' ) ) {
                psycheco_the_date( array(
                    'before'          => '<span><i class="ico-calendar"></i>',
                    'after'           => '</span>',
                    'link_attributes' => 'rel="bookmark"',
                    'time_tag_class'  => 'entry-date',
                    'format' => 'm, Y'
                ) );
            }
            if ( function_exists( 'psycheco_show_post_views_count' ) ) : ?>
                <span class="views-count">
                    <span><i class="ico-eye"></i>
                    <?php psycheco_show_post_views_count(); ?>
                </span>
            <?php endif;
            ?>
        </div>
    </div>
</article><!-- eof blog-post-item -->