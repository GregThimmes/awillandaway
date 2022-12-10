<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'topline_' );

//topline section with contact info and search button
?>
<section class="page_topline c-my-10 overflow-visible <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row align-items-center">
				<div class="col-md-12 text-md-right text-sm-left text-center">
				<ul class="top-includes">
					<li>
						<?php foreach ( $options['social_icons'] as $icon ): ?>
							<span class="social-icons">
							<a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
							   class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>"></a>
						</span>
						<?php endforeach; ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section><!-- .page_topline -->
