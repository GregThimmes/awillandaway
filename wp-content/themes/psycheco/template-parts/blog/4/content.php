<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$options = psycheco_get_options();
$pID = get_the_ID();
$author_id = get_the_author_meta('ID');
$hide_date = $options['blog_hide_date'];
$hide_tags = $options['blog_hide_tags'];
$hide_author = $options['blog_hide_author'];
$hide_categories = $options['blog_hide_categories'];
$hide_comments = $options['blog_hide_comments_link'];
$hide_read_more = $options['blog_hide_read_more'];
$show_post_thumbnail = ( post_password_required()
						 || is_attachment()
                         || ! has_post_thumbnail() ) ? false : true;
$image_wrap_class    = $show_post_thumbnail
	? 'col-xl-6 col-lg-12 col-md-6 col-12' : '';
$content_wrap_class  = $show_post_thumbnail
	? 'col-xl-6 col-lg-12 col-md-6 col-12' : 'col-12';
?>
<article
		id="post-<?php the_ID(); ?>" <?php post_class( 'side-item no-content-padding post-side-item' ); ?>>
	<div class="row">
		<?php
        psycheco_post_thumbnail( 'col-xl-6 col-lg-12 col-md-6 col-12', '', '' ,'psycheco-square');
        psycheco_posted_on( array( 'categories' ) ); //categories
		 ?>
        <div class="<?php echo esc_attr( $content_wrap_class ); ?>">
            <div class="item-content entry-content <?php echo esc_attr( $options['version'] ); ?>">
                <header class="entry-header">
                    <div class="entry-meta top-meta">
                        <div class="inline-content">
                            <?php
                            if ( 'post' == get_post_type() ) :
                                psycheco_posted_on( array( 'author' ) ); //author
                                ?>
                                <span class="meta-right">
                                    <?php psycheco_posted_on( array( 'date', 'comments', 'sticky' ) ); //date, comments, sticky
                                    ?>
                                </span>
                            <?php endif; //'post' == get_post_type()?>
                        </div>
                    </div><!-- .entry-meta -->
                    <?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <?php
                    the_content( '' );
                    wp_link_pages( array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'psycheco' ) . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                    ) );
                    ?>
                </div><!-- .entry-content -->
                <?php
                psycheco_posted_on( array( 'tags' ) ); //tags
                ?>
            </div><!-- eof .item-content -->
		</div><!-- .col -->
	</div><!-- .row -->
</article><!-- #post-## -->
