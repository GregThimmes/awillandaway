<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 * @var array $atts
*/


$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
$author_id = get_the_author_meta('ID');
$hide_read_more = $atts['read_more'];

?>
<article <?php post_class( "vertical-item content-padding hero-bg text-center " . $filter_classes ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<div class="entry-meta">
			 <?php if ( function_exists('psycheco_the_date') ) {
				 psycheco_the_date( array(
					 'before' => '<span class="post-date"><i class="fa fa-calendar"></i>',
					 'after' => '</span>',
					 'link_attributes' => 'rel="bookmark"',
					 'time_tag_class' => 'entry-date'
				 ) );
			 }
			 ?>
		</div>
		<h5 class="item-title mt-0">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<?php if ( function_exists('psycheco_the_excerpt') ) {
			psycheco_the_excerpt( array(
				'length' => 10,
				'before' => '<div class="excerpt"><p>',
				'after' => '</p></div>',
				'more' => '',
			) );
		}
		?>
        <?php
        if ( $hide_read_more['hide_read_more'] && ! empty( $hide_read_more['read_more']['text'] ) ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>"
               class="btn btn-outline-maincolor">
                <span><?php echo esc_html( ( $hide_read_more['read_more']['text'] ) ); ?></span>
            </a>
        <?php endif;
        ?>
	</div>
</article><!-- eof vertical-item -->

