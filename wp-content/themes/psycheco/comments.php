<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$options = psycheco_get_options();

//fields are hooked in inc/hooks.php
$title_reply = ( have_comments() )
	? sprintf( _n( esc_html__( 'One comment' , 'psycheco' ), esc_html__( '%1$s comments', 'psycheco' ), get_comments_number(), 'psycheco' ), number_format_i18n( get_comments_number() ) )
	: esc_html__( 'No comments', 'psycheco' );
$req = get_option( 'require_name_email' );
$html_req = ( $req ? " required='required'" : '' );

$args = array(
	'fields'               =>  array(
		'author'  => '<p class="comment-form-author">
		              <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . '   placeholder="' . esc_html__( 'Full Name', 'psycheco' ) . '"/></p>',
		'email'   => '<p class="comment-form-email">
		              <input id="email" name="email"  type="email"  value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" ' . $html_req . '   placeholder="' . esc_html__( 'Email Address', 'psycheco' ) . '" /></p>',
	),
        'comment_field'        => '<p class="comment-form-comment">
                                   <textarea id="comment"  class="form-control" name="comment" cols="45" rows="8"  aria-required="true" required="required"  placeholder="' . esc_html__( 'Comment', 'psycheco' ) . '"></textarea></p>',
	'logged_in_as'         => '<p class="logged-in-as">' .
	                          sprintf(
	                          /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
		                          esc_html__( 'Logged in as ', 'psycheco' ) . '<a href="%1$s" aria-label="%2$s">%3$s' .  '</a>. <a href="%4$s">' . esc_html__( 'Log out?', 'psycheco' ) . '</a>',
		                          get_edit_user_link(),
		                          /* translators: %s: user name */
		                          esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'psycheco' ), $user_identity ) ),
		                          $user_identity,
		                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
	                          ) . '</p>',
	'comment_notes_before' => '',
	'class_form'           => 'comment-form',
	'cancel_reply_link'    => esc_html__( 'Cancel reply', 'psycheco' ),
	'label_submit'         => esc_html__( 'Send Comment', 'psycheco' ),
	'title_reply'          => esc_html__('Leave Comment', 'psycheco'),
	'title_reply_before'   => '<h4>',
	'title_reply_after'    => '</h4>',
	'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-outline-maincolor mt-20 %3$s">%4$s</button>',
	'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
	'format'               => 'html5',
);

?>
<div id="comments" class="comments-area hero-bg">
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-above" class="nav-links" role="navigation">
				<?php paginate_comments_links( array(
					'prev_text' => '<i class="fa fa-chevron-left"></i>',
					'next_text' => '<i class="fa fa-chevron-right"></i>',
				) ); ?>
            </nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
        <h4 class="comment-count-title"><?php echo esc_html( $title_reply ); ?></h4>
        <ol class="comment-list">
			<?php
			wp_list_comments( array(
				'walker'      => psycheco_return_comments_walker(),
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 70,
			) );
			?>
        </ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="nav-links" role="navigation">
				<?php paginate_comments_links( array(
						'prev_text' => '<i class="fa fa-chevron-left"></i>',
						'next_text' => '<i class="fa fa-chevron-right"></i>',
					)
				); ?>
            </nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>
		
		<?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'psycheco' ); ?></p>
		<?php endif; //comments_open() ?>
	
	<?php endif; // have_comments() ?>
	<?php comment_form( $args ); ?>
</div><!-- #comments -->