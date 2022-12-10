<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'topline_' );

//topline section with topline menu and search button
?>
<section class="page_topline c-my-10 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row align-items-center">
			<div class="col-md-10 text-md-left text-center">
				<div class="widget widget_nav_menu">
				<?php wp_nav_menu( array(
					'theme_location' => 'topline',
					'menu_class'     => 'menu',
					'container'      => 'ul',
					'depth' => 1,
					'wp_page_menu' => false,
				) ); ?>
				</div>
			</div>

			<div class="col-md-2 text-md-right text-center">
				<!--modal search-->
				<span>
					<a href="#" class="search_modal_button">
						<i class="fa fa-search"></i>
					</a>
				</span>

			</div>
		</div>
	</div>
</section><!-- .page_topline -->
