<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - regular item layout
 */

//has thumbnail layout
if ( get_the_post_thumbnail() ) : ?>
	<article <?php post_class( 'vertical-item content-absolute item-post ds ' ) ?>">
        <div class="item-media">
            <?php
            $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            $image          = fw_resize( $full_image_src, '920', '1075', true );
            $img_attributes = array(
	            'src' => $image,
	            'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
            );
            echo fw_html_tag( 'img', $img_attributes );
            ?>
            <div class="media-links">
               <a class="abs-link" href="<?php esc_url( the_permalink(get_the_ID()) ); ?>"></a>
            </div>
        </div>
        <div class="item-content">
            <h5 class="item-meta">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h5>
            <div class="entry-meta">
                <?php
                if ( function_exists( 'psycheco_the_date' ) ) {
	                psycheco_the_date( array(
		                'before'          => '<span class="entry-date"><i class="ico ico-calendar"></i>',
		                'after'           => '</span>',
		                'link_attributes' => 'rel="bookmark"',
		                'time_tag_class'  => 'entry-date',
		                'format'          => 'm, Y'
	                ) );
                }
                if ( function_exists( 'psycheco_show_post_views_count' ) ) {
	                echo '<span class="entry-views">';
	                echo '<i class="ico ico-eye"></i>';
	                    psycheco_show_post_views_count();
	                echo '</span>';
                }
                if ( function_exists( 'psycheco_post_like_button' ) ) {
                    echo '<span class="entry-likes">';
                        psycheco_post_like_button( get_the_ID() );
                        psycheco_post_like_count( get_the_ID() );
	                echo '</span>';
                }
            	if ( function_exists( 'psycheco_comments_counter' ) ) {
                    psycheco_comments_counter( array(
                        'before' => '<span class="comments-link"><i class="ico ico-comment"></i>',
                        'after' => '</span>',
                        'live_a_comment'      => '0 ',
                        'password_protected'  => false,
                        'comments_are_closed' => false,
                        'comment'             => '',
                        'comments'            => '',
                   
                    ) );
                }
                ?>
            </div>
        </div>
	</article>
<?php
//no featured image
else :
?>
	<article <?php post_class( 'vertical-item gallery-item item-no-image text-center display_table' ) ?>">
        <div class="item-content display_table_cell">
            <h6 class="item-meta">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h6>
        </div>
	</article>
<?php
endif;
?>