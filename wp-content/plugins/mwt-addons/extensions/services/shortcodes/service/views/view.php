<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
if( ! empty( $terms ) ) :
	foreach ( $terms as $term ) {
		$filter_classes .= ' filter-' . $term->slug;
	}
endif;

$background_color = ! empty( $atts['background_color'] ) ? $atts['background_color'] : '';
$image_right = ! empty( $atts['image_right'] ) ? $atts['image_right'] : '';

while ( $posts->have_posts() ) : $posts->the_post(); ?>
<article <?php post_class( "service-item " . $background_color . ' ' . $image_right . ' ' . $filter_classes ); ?>>
	<div class="row align-items-center c-gutter-0">
        <?php if ( get_the_post_thumbnail() ) : ?>
            <div class="col-12 col-lg-6 mb-30 mb-lg-0">
                <div class="item-media">
                    <?php
                    if ( has_post_thumbnail() ) {
                        if ( function_exists('fw_resize') ) {
                            $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                            $image          = fw_resize( $full_image_src, '900', '530', true );
                            $img_attributes = array(
                                'src' => $image,
                                'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
                                'class' => 'member-image'
                            );
                            echo fw_html_tag( 'img', $img_attributes );
                        } else {
                            the_post_thumbnail();
                        }
                    }
                    ?>
                    <div class="media-links">
                        <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
            </div>
        <?php endif; //eof thumbnail check ?>
        <div class="col-12 col-lg-6">
            <div class="item-content">
                <h5 class="service-title mb-20">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h5>
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</article><!-- eof service-item -->
<?php endwhile;