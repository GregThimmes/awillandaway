<?php
/**
 * The template part for selected header
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'toplogo_' );
//toplogo section with contact and search button
?>
<section class="page_toplogo s-py-10 s-py-xl-25 d-xl-none <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="' . esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="' . esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">

		<div class="row align-items-center my-1">
   
			<div class="col-12">
				<div class="toplogo-includes justify-content-center">
                    <?php if ( !empty( $options['header-icons'] ) ) {
	                    foreach ( $options['header-icons'] as $icon ) : ?>
                            <div class="media">
                                <?php if ( $icon['icon'] ): ?>
                                    <div class="icon-styled">
                                        <i class="<?php echo esc_attr( $icon['icon'] . ' ' . $icon['icon_style'] . ' ' . $icon['icon_font_size'] ); ?>"></i>
                                    </div>
                                <?php endif; //icon ?>
                                <div class="media-body">
                                    <?php if ( !empty ( $icon['title'] ) ) : ?>
                                        <h6>
                                            <?php echo wp_kses_post( $icon['title'] ); ?>
                                        </h6>
                                    <?php endif; ?>
				                    <?php if ( !empty ( $icon['text'] ) ) : ?>
                                        <p>
                                            <?php echo wp_kses_post( $icon['text'] ); ?>
                                        </p>
				                    <?php endif; ?>
                                </div>
                            </div><!-- .media -->
	                    <?php endforeach;
                    } ?>
				</div><!-- .toplogo-includes -->
			</div>
		</div>
	</div>
</section><!-- .page_toplogo -->
