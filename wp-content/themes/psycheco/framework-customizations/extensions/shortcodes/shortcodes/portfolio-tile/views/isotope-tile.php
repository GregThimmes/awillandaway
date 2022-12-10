<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

//get all terms for filter
$terms = get_terms( array( 'post_type ' => 'fw-portfolio-category' ) );
$counter = '1';

if ( count( $terms ) > 1 && $atts['show_filters'] ) { ?>
	<div class="filters gallery-filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'psycheco' ); ?></a>
		<?php
		foreach ( $terms as $term_key => $term_id ) {
			$current_term = get_term( $term_id, 'fw-portfolio-category' );
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
			<?php
		}
		?>
	</div>
	<?php
} //count subcategories check
?>

<div class="isotope-wrapper isotope row c-mb-30 c-gutter-30"
	 data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
	<?php while ( $posts->have_posts() ) : $posts->the_post();
		//get categories slugs for isotope filters
		$post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
		$post_terms_class = '';
		if ( ! empty ( $post_terms ) ) :
			foreach ( $post_terms as $post_term ) :
				$post_terms_class .= $post_term->slug . ' ';
			endforeach;
		endif;
		//get item size
		$column_class = 'col-md-6 col-xl-3';
        if ($counter == 1 || $counter == 6 || $counter == 8 || $counter == 10 ) {
            $column_class = 'col-md-12 col-xl-6';
        }
		?>
  
		<div class="isotope-item <?php echo esc_attr( 'item-layout-tile ' . ' ' . $column_class . ' ' . $post_terms_class ); ?>">
			<?php
			//include item layout view file
			if ( has_post_thumbnail() ) { ?>
				<div class="vertical-item item-gallery tile-content-absolute ds ms">
					<div class="item-media">
						<?php
						$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
						if ($counter == 1 || $counter == 6 || $counter == 8 || $counter == 10 ) {
							$image          = fw_resize( $full_image_src, '887', '406', true );
							$img_attributes = array(
								'src' => $image,
								'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
							);
							echo fw_html_tag( 'img', $img_attributes );
						} else {
							$image          = fw_resize( $full_image_src, '418', '396', true );
							$img_attributes = array(
								'src' => $image,
								'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
							);
							echo fw_html_tag( 'img', $img_attributes );
						}
						?>
						<div class="media-links">
							<a class="abs-link" href="<?php the_permalink(); ?>"></a>
						</div>
					</div>
                    <div class="item-content">
                        <h5 class="item-meta">
                            <a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
                            </a>
                        </h5>
                        <div class="item-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
				</div>
				<?php
			} else {
				include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
			}
			?>
		</div>
		<?php $counter++ ?>
	<?php endwhile; ?>
	<?php //removed reset the query ?>
</div><!-- eof .istotpe-wrapper -->
