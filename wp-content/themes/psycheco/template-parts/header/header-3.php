<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'header_' );

//get topline
get_template_part( 'template-parts/toplogo/toplogo-1' );

?>
<header class="page_header header-small line-header s-py-5 s-py-lg-0 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row align-items-center">
			<div class="col-1 col-xl-8 order-2 order-xl-1">
                <div class="nav-wrap">
                    <!-- main nav start -->
                    <nav class="top-nav">
						<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class' => 'sf-menu nav',
								'container' => 'ul'
							) );
						endif;
						?>
                    </nav>
                </div>
			</div>
			<div class="col-10 col-xl-4 order-1 order-xl-2">
				<div class="text-left text-xl-right">
                    <?php if ( ! empty( $options['header_buttons'] ) ) {
                        foreach ( $options['header_buttons'] as $button ) :
                            echo fw_ext( 'shortcodes' )->get_shortcode( 'button' )->render( $button );
                        endforeach;
                    } ?>
				</div>
			</div>
		</div><!-- header toggler -->
        <span class="toggle_menu"><span></span></span>
    </div>
</header>
