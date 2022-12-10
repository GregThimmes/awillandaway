<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive.
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$show_post_thumbnail = ( post_password_required() || is_attachment() || !has_post_thumbnail() ) ? false : true;
$hide_read_more = $options['blog_hide_read_more'];
$options = psycheco_get_options();
$author_id = get_the_author_meta('ID');
$hide_date = $options['blog_hide_date'];
$hide_tags = $options['blog_hide_tags'];
$hide_author = $options['blog_hide_author'];
$hide_categories = $options['blog_hide_categories'];
$hide_comments = $options['blog_hide_comments_link'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content2 vertical-item bordered ' ); ?>>
	<?php psycheco_post_thumbnail( '', '', '' ); ?>
    <div class="item-content entry-content">
        <header class="entry-header">
            <?php

            if ( !$hide_categories ) :
	            psycheco_the_categories(array(
		            'before'          => '<span class="cat-links">',
		            'after'           => '</span>',
		            'items_separator' => ' ',
	            ));   //categories
            endif; //!hide_categories
            
            ?>
            <div class="entry-meta post-meta">
				<?php if ( 'post' == get_post_type() ) {
				 
					psycheco_sticky_marker( array(
						'sticky_symbol' => 'fa fa-thumb-tack color-main',
						'before'        => '<span class="featured-post">',
						'after'         => esc_html__( ' Sticky', 'psycheco' ) . '</span>',
					) );
					
					if ( ! $hide_date ) {
						psycheco_the_date( array(
							'before'          => '<span class="entry-date">',
							'after'           => '</span>',
							'link_attributes' => 'rel="bookmark"',
							'time_tag_class'  => 'entry-date'
						) );
					}
					
					if ( ! $hide_author ) {
						psycheco_the_author( array(
							'before'          => '<span class="author vcard">' . esc_html__('By', 'psycheco'),
							'after'           => '</span>',
							'link_class'      => 'url fn n',
							'link_attributes' => 'rel="author"',
						) );
					}
					
					if ( ! $hide_comments ) :
						psycheco_comments_counter(
							array(
								'before'              => '<span class="comments-link">',
								'after'               => '</span>',
								'live_a_comment'      => '0 Comment',
								'password_protected'  => false,
								'comments_are_closed' => false,
								'comment'             => 'Comment',
								'comments'            => 'Comments',
							
							) );
					endif; //!hide_comments
     
				} //'post' == get_post_type()?>
            </div><!-- .entry-meta -->
			<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
        </header><!-- .entry-header -->
        <div class="entry-content">
			<?php
			the_content( '' );
			
			if ( $hide_read_more['hide_read_more'] ) : ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-link post-read-more">
                <span><?php echo esc_html( ( $hide_read_more['read_more']['text'] ) ); ?></span>
            </a>
	        <?php endif;
			
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'psycheco' ) . '</span>',
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			) );
			
			?>
        </div><!-- .entry-content -->
        <div class="entry-footer">
			<?php if ( 'post' == get_post_type() ) {
				psycheco_posted_on( array( 'tags' ) ); //tags
			}; //'post' == get_post_type() ?>
        </div><!-- .entry-footer -->
    </div><!-- eof .item-content -->
</article><!-- #post-## -->