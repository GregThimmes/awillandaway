<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'header_' );
get_template_part( 'template-parts/topline/topline-1' );

$menu_col = ! empty( $options['header_buttons'] ) ? 'col-xl-6' : 'col-xl-9';

?>
<header class="page_header header-1 justify-nav-center <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( ! empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( ! empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-3 col-10">
				<?php get_template_part( 'template-parts/logo/header-logo' ); ?>
            </div>
            <div class="<?php echo esc_attr( $menu_col ); ?> col-lg-6 col-1 text-sm-center">
                <!-- main nav start -->
                <nav class="top-nav">
					<?php
					if ( has_nav_menu( 'primary' ) ) :
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav',
							'container'      => 'ul'
						) );
					endif;
					?>
                </nav>
            </div>
			<?php if ( ! empty( $options['header_buttons'] ) && defined( 'FW' ) ) : ?>
                <div class="col-xl-3 col-lg-3 text-right d-none d-lg-block header-wrap">
					<?php foreach ( $options['header_buttons'] as $button ) :
						echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
					endforeach; ?>
                </div>
			<?php endif; ?>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </div>
</header>