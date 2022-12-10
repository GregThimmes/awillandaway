<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();

$options = psycheco_get_options();
$section = psycheco_get_section_options($options, '404_');
//true - no sidebar on 404 page
$column_classes = psycheco_get_columns_classes( true );
?>

<section class="page_404 <?php echo esc_attr( $section['section_class'] ); ?>"
	<?php echo ( !empty( $section['section_id'] ) ) ? 'id="'. esc_attr( $section['section_id'] ) . '"' : ''; ?>
	<?php echo ( !empty( $section['section_background_image'] ) ) ? 'style="'. esc_attr( $section['section_background_image'] ) . '"' : ''; ?>
>
	<div class="container<?php echo esc_attr( $section['section_container_class_suffix'] ); ?>">
		<div class="row<?php echo esc_attr( $section['section_row_class_suffix'] ); ?>">
            <div class="col-md-6 text-center">
                <div class="page-content">
                    <?php if ( !empty( $options['404_image']['url'] ) ) : ?>
                         <img class="image_404" src="<?php echo esc_url( $options['404_image']['url'] ); ?>"
                            alt="<?php echo esc_attr__( '404_image', 'psycheco' ); ?>">
                    <?php endif; ?>
                    <?php
                    if ( ! empty( $options['error_text'] ) ) : ?>
                        <h4 class="error-text">
                            <?php echo esc_html( $options['error_text'] ); ?>
                        </h4>
                    <?php endif; ?>
                   	<div class="widget widget_search">
                         <?php if ( ! empty( $options['search_text'] ) ) : ?>
                            <p class="search-text">
                                <?php echo esc_html( $options['search_text'] ); ?>
                            </p>
                        <?php endif; ?>
                        <?php get_search_form('Enter your search keyword'); ?>
                        <p class="search-separator"><?php echo esc_html__('Or', 'psycheco' ); ?></p>
                    </div>
                    <a href="<?php echo esc_url( '/' )?>"
                       class="btn btn-outline-maincolor3"
                        <span><?php echo esc_html__( 'Back to Homepage', 'psycheco' ); ?></span>
                    </a>
                </div>
            </div>
        <?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();