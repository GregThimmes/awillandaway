<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options               = psycheco_get_options();
$show_post_thumbnail   = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_thumbnail        = get_the_post_thumbnail( get_the_ID() );
$additional_post_class = ( $post_thumbnail ) ? 'cover-image cover-image s-overlay' : 'p-40';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item ds ' . $additional_post_class ); ?>>
	<?php
	echo empty ( $post_thumbnail ) ? '' : '';
	echo wp_kses_post( $post_thumbnail );
	?>
    <div class="item-content entry-content position-relative">
        <header class="entry-header">
            <div class="entry-meta post-meta">
			    <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="meta-left">
					    <?php psycheco_posted_on( array( 'date', 'author', 'comments', 'sticky' ) ); //date, author,comments, sticky ?>
                    </div>
				    <?php psycheco_posted_on( array(  'categories' ) ); //categories ?>
			    <?php endif; //'post' == get_post_type()?>
            </div><!-- .entry-meta -->
		    <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <?php
            //hidding "more link" in content
			the_content( '' );
            ?>
        </div><!-- .entry-content -->
        <div class="entry-footer">
		    <?php if ( 'post' == get_post_type() ) {
			    psycheco_posted_on( array( 'tags' ) ); //tags
		    }; //'post' == get_post_type() ?>
        </div><!-- .entry-footer -->
    </div><!-- eof .item-content -->
</article><!-- #post-## -->