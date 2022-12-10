<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$options = fw_get_db_post_option($pID);

?>
<div class="vertical-item padding-small hero-bg text-center team-member">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
			the_post_thumbnail('psycheco-team-member');
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h5 class="member-name">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<?php if ( ! empty( $options['position'] ) ) : ?>
			<p class="member-position"><?php echo wp_kses_post( $options['position'] ); ?></p>
		<?php endif; //position ?>
        <div class="member-excerpt">
			<?php the_excerpt(); ?>
        </div>
		<?php if ( ! empty( $options['social_icons'] ) ) {
            //get icons-social shortcode to render icons in team member item
            $shortcodes_extension = fw()->extensions->get( 'shortcodes' );
            if ( ! empty( $shortcodes_extension ) ) {
                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $options['social_icons'] ) );
            }
		} //social icons ?>
	</div>
</div><!-- eof .vertical-item -->
