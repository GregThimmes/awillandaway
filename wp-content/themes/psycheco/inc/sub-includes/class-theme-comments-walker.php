<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( class_exists( 'Psycheco_Comments_Walker' ) ) {
	return;
}

/**
 * Walker for comments
 */
class Psycheco_Comments_Walker extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see   wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children
			? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta links-darkgrey">
                <?php
                comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="comment-reply">',
                    'after'     => '</span>',
                    'reply_text'     => '<i class="fa fa-reply"></i>'
                ) ) );
                ?>
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					} ?>
					<?php
					/* translators: %s: comment author link */
					printf( __( '%s', 'psycheco' ),
						sprintf( '<p class="fn">%s</p>',
							get_comment_author_link( $comment ) )
					);
					?>
				</div><!-- .comment-author -->
                <div class="comment-metadata data-top">
                    <span class="comment-data">
					<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
							printf( __( '%1$s ', 'psycheco' ),
								get_comment_date( '', $comment ) );
							?>
						</time>
					</a>
				</span>
                </div><!-- .comment-metadata -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'psycheco' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
			<div class="comment-metadata links-darkgrey">
				<?php edit_comment_link( esc_html__( 'Edit', 'psycheco' ),
				'<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' );
				?>

			</div><!-- .comment-metadata -->

		</article><!-- .comment-body -->
		<?php
	}
}