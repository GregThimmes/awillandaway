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

<section class="page_topline c-my-5 topline-1 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( ! empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( ! empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
    <div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
        <div class="row">
            <div class="col-lg-9">
                <ul class="icon-list text-right">
					<?php if ( ! empty( $options['topline-icons'] ) ) {
						foreach ( $options['topline-icons'] as $icon ): ?>
                            <li>
								<?php
								$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
								if ( ! empty( $shortcodes_extension ) ) {
								    echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
								}
								?>
                            </li>
						<?php endforeach;
					} ?>
                </ul>
            </div>
            <div class="col-lg-3 text-center text-lg-right">
                <?PHP
										//social icons
                		if ( ! empty( $options['social_icons'] ) ) {
                    		$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
                    		if ( ! empty( $shortcodes_extension ) ) {
                        	echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render(array( 'social_icons' => 								$options['social_icons'] ));
                    		}
                		} 
				?>
            </div>
        </div>
    </div>
</section><!-- .page_topline -->
