<?php
/**
 * The Template for displaying all single posts
 */

get_header();
$column_classes = psycheco_get_columns_classes();
$options = psycheco_get_options();
$hide_post_tags = $options['post_hide_tags'];
$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

?>
<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
		/*
		 * Include the post format-specific template for the content. If you want to
		 * use this in a child theme, then include a file called called content-___.php
		 * (where ___ is the post format) and that will be used instead.
		 */
	?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('vertical-item content-padding hero-bg '); ?>>
            <?php
                psycheco_post_thumbnail();
            ?>
            <div class="item-content entry-content">
                <div class="entry-meta post-meta">
                    <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="meta-left">
                            <?php psycheco_posted_on( array( 'date', 'author', 'comments', 'sticky' ) ); //date, author,comments, sticky ?>
                        </div>
                        <?php psycheco_posted_on( array(  'categories' ) ); //categories ?>
                    <?php endif; //'post' == get_post_type()?>
                </div><!-- .entry-meta -->
	            <?php
	            //if plugin 'mwt-addons is installed, displaying addons bar
	            if ( function_exists( 'mwt_share_this' ) ): ?>
                    <div class="hero-bg post-adds">
			            <?php
			            psycheco_share_this();
			            psycheco_post_like_button( get_the_ID() );
			            psycheco_post_like_count( get_the_ID() );
			            ?>
                        <span class="views-count bg-maincolor">
                            <?php psycheco_show_post_views_count(); ?>
                        </span>
                    </div> <!-- eof .post-adds -->
	            <?php endif; //mwt_share_this ?>
                <div class="entry-content">
                    <?php
                    the_content( '' );
                    ?>
                </div><!-- .entry-content -->
                <div class="entry-footer">
		            <?php if ( 'post' == get_post_type() ) {
			            psycheco_posted_on( array( 'tags' ) ); //tags
		            }; //'post' == get_post_type() ?>
                </div><!-- .entry-footer -->
                <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'psycheco' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div>
        </article><!-- #post-## -->
    
        <?php
    
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        
        // Previous/next post navigation. Uncomment following line if you need post navigation
        psycheco_post_nav_2();
    
    endwhile; ?>
</div><!--eof #content -->

<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();