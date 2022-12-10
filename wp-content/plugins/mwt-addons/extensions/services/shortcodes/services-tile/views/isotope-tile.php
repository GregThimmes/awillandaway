<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$services = fw()->extensions->get( 'services' );
if ( empty( $services ) ) {
	return;
}

/**
 * @var array $atts
 * @var array $posts
 */

$counter = '1';

?>

<div class="isotope-wrapper isotope masonry-layout row c-mb-30 c-gutter-30">
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		//get categories slugs for isotope filters
		$post_terms       = get_the_terms( get_the_ID(), 'fw-services-category' );
		$post_terms_class = '';
		if ( ! empty ( $post_terms ) ) :
			foreach ( $post_terms as $post_term ) :
				$post_terms_class .= $post_term->slug . ' ';
			endforeach;
		endif;

		$column_class = 'col-md-6 col-lg-4';
		
		?>

        <div class="isotope-item item-service-tile <?php echo esc_attr( $column_class . ' ' . $post_terms_class ); ?>">
            <div class="vertical-item">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="item-media">
                        <?php
                        $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                        $alt = get_the_title( get_post_thumbnail_id( get_the_ID() ) );
                        if ($counter == 1 || $counter == 5 ) {
                            the_post_thumbnail('psycheco-square');
                        } elseif ($counter == 2 || $counter == 6 ) {
                            $image = fw_resize( $full_image_src, '600', '424', true );
                            $img_attributes = array(
                                'src' => $image,
                                'alt' => $alt,
                            );
                            echo fw_html_tag( 'img', $img_attributes );
                        } else {
                            $image = fw_resize( $full_image_src, '700', '905', true );
                            $img_attributes = array(
                                'src' => $image,
                                'alt' => $alt,
                            );
                            echo fw_html_tag( 'img', $img_attributes );
                        }
                        ?>
                        <div class="media-links">
                            <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                <?php } ?>
                <h6 class="item-meta">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </h6>
            </div>
        </div>
		<?php $counter++ ?>
	<?php endwhile; ?>
	<?php //removed reset the query ?>
</div><!-- eof .istotpe-wrapper -->
