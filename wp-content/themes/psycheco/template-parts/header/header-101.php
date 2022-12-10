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

<header class="page_header_side header_slide <?php echo esc_attr( $section['section_class'] ); ?>">
	<span class="toggle_menu toggle_menu_side header-slide"><span></span></span>
	<div class="scrollbar-macosx">
		<div class="side_header_inner">

            <div class="header-side-menu">
                <nav class="mainmenu_side_wrapper">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav menu-click',
						'container'      => 'ul'
					) );
					?>
                </nav>
            </div>

            <div class="text-center">
               <span class="social-icons">
                    <?php foreach ( $options['social_icons'] as $icon ): ?>
                        <a href="<?php echo esc_url( $icon['icon_url'] ) ?>"
                           class="<?php echo esc_attr( $icon['icon'] ); ?> <?php echo esc_attr( $icon['icon_class'] ); ?>"></a>
                    <?php endforeach;    ?>
                </span>
            </div>

			<div class="widget widget_search mb-60">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</header><!-- .page_header_side -->

