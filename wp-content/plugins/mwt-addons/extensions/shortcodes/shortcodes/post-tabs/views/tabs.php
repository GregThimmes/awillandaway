<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

$unique_id = uniqid();

//if no posts - display message and return
if ( ! $posts->have_posts() ) :
	esc_html_e( 'No posts found', 'psycheco' );

	return;
endif;
?>

<div class="vertical-tabs">
    <div class="tab-content">
        <?php
        $post_count = 0;
        while ( $posts->have_posts() ) : $posts->the_post();
            if ( has_post_thumbnail() ) {
            ?>
                <div class="tab-pane fade <?php echo ( 0 === $post_count ) ? 'in active show' : '' ?>"
                     id="tab-<?php echo esc_attr( $unique_id ) . '-' . $post_count ?>"
                >
                    <?php
                        $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                        $image          = fw_resize( $full_image_src, '750', '480', true );
                        $img_attributes = array(
                            'src' => $image,
                            'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
                            'class' => 'member-image'
                        );
                        echo fw_html_tag( 'img', $img_attributes );
                    ?>
                </div><!-- .eof tab-pane -->
                <?php
                $post_count ++;
            }
        endwhile; ?>
        <?php wp_reset_postdata(); // reset the query ?>
    </div>
    <ul class="nav nav-tabs post-tabs" role="tablist">
		<?php
		$post_count = 0;
		while ( $posts->have_posts() ) : $posts->the_post();
            if ( has_post_thumbnail() ) {
            ?>
                <li class="nav-item">
                    <a href="#tab-<?php echo esc_attr( $unique_id ) . '-'. $post_count ?>"
                       role="tab"
                       data-toggle="tab"
                       class="nav-link <?php echo ( 0 === $post_count ) ? 'active' : '' ?>"
                    >
                        <div class="item-media">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </a>
                </li>
                <?php
                $post_count ++;
            }
        endwhile; ?>
		<?php wp_reset_postdata(); // reset the query ?>
    </ul>
</div>
