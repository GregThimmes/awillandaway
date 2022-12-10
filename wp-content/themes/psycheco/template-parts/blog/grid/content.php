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
	$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;
	$author_id = get_the_author_meta('ID');
	$hide_read_more = $options['blog_hide_read_more'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding padding-small bordered masonry-layout' ); ?>>
	<?php psycheco_post_thumbnail(); ?>
    <div class="item-content entry-content">
        <header class="entry-header">
            <div class="entry-meta top-meta">
                <?php psycheco_posted_on( array( 'categories' ) ); //categories ?>
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
	        <?php the_title( '<h6 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
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
</article><!-- #post-## -->
