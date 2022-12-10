<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//no columns on single service page
$column_classes = fw_ext_extension_get_columns_classes( true );

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name     = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option( get_the_ID() );

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();

$hide_social = !empty( $atts['hide_social'] ) ? $atts['hide_social'] : '';

?>

<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
    <?php
    // Start the Loop.
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
            <div class="col-lg-5">
                <?php
                if ( has_post_thumbnail() ) {
                    $full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                    $image          = fw_resize( $full_image_src, '540', '560', true );
                    $img_attributes = array(
                        'src' => $image,
                        'alt' => get_the_title( get_post_thumbnail_id( get_the_ID() ) ),
                        'class' => 'member-image'
                    );
                    echo fw_html_tag( 'img', $img_attributes );
                }
                ?>
                <div class="member-summary text-center hero-bg">
                    <?php the_title( '<h5 class="member-title">', '</h5>' ); ?>
                    <?php if ( ! empty( $atts['position'] ) ) : ?>
                        <p class="member-position"><?php echo wp_kses_post( $atts['position'] ); ?></p>
                    <?php endif; //position ?>
                    <?php if ( get_the_term_list( $pID, $taxonomy_name ) ) : ?>
                        <div class="cat-links">
                            <?php echo get_the_term_list( $pID, $taxonomy_name, '', ' ', '' ); ?>
                        </div>
                    <?php endif; //get_the_term_list ?>

                    <?php if ( ! empty( $atts['social_icons'] ) && !$hide_social ) : ?>
                        <div class="member-social-icons">
                            <?php
                            if ( ! empty( $shortcodes_extension ) ) {
                                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
                            }
                            ?>
                        </div><!-- eof social icons -->
                    <?php endif; //social icons ?>

                    <?php if ( ! empty( $atts['icons'] ) ) : ?>
                        <div class="member-info">
                            <?php
                            if ( ! empty( $shortcodes_extension ) ) {
                                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_list' )->render( array( 'icons' => $atts['icons'] ) );
                            }
                            ?>
                        </div><!-- eof social icons -->
                    <?php endif; //social icons ?>
                </div>
                
            </div>
            <!-- .col-lg-5 -->
            <div class="col-lg-7">
                <div class="vertical-item">

                    <div class="item-content entry-content">
                        <!-- .entry-header -->
                        <?php the_content(); ?>

                        <?php
                            //member meta tabs start
                            if (
                                ! empty( $atts['bio'] )
                                ||
                                ! empty( $atts['skills'] )
                                ||
                                ! empty( json_decode($atts['form']['json'])[1] )
                            ) :
                            $tab_num = 0;
                        ?>
                            <div class="bootstrap-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <?php
                                        if ( ! empty( $atts['bio'] ) ) :
                                    ?>
                                        <li class="nav-item <?php echo ( 0 === $tab_num ) ? 'active' : '' ?>">
                                            <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab"
                                                class="nav-link <?php echo ( 0 === $tab_num ) ? 'active' : '' ?>"
                                            >
                                                <?php esc_html_e( 'Biography', 'mwt' ); ?>
                                            </a>
                                        </li>
                                    <?php
                                        $tab_num++;
                                        endif; //bio check

                                        if ( ! empty( $atts['skills'] ) ) :
                                    ?>
                                        <li class="nav-item <?php echo ( 0 === $tab_num  ) ? 'active' : '' ?>">
                                            <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab"
                                                class="nav-link <?php echo ( 0 === $tab_num ) ? 'active' : '' ?>"
                                            >
                                                <?php esc_html_e( 'Skills', 'mwt' ); ?>
                                            </a>
                                        </li>
                                    <?php
                                        $tab_num++;
                                        endif; //bio check

                                        if ( ! empty( json_decode($atts['form']['json'])[1] ) ) :
                                    ?>
                                        <li class="nav-item <?php echo ( 0 === $tab_num ) ? 'active' : '' ?>">
                                            <a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab" data-toggle="tab"
                                                class="nav-link <?php echo ( 0 === $tab_num  ) ? 'active' : '' ?>"
                                            >
                                                <?php esc_html_e( 'Send Message', 'mwt' ); ?>
                                            </a>
                                        </li>
                                    <?php
                                        $tab_num++;
                                        endif; //form check
                                    ?>
                                </ul>
                                <div class="tab-content">
                                    <?php
                                        $tab_num = 0;
                                        if ( ! empty( $atts['bio'] ) ) :
                                    ?>
                                    <div class="tab-pane tab-member-bio fade <?php echo ( 0 === $tab_num ) ? 'in active show' : '' ?>"
                                        id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
                                        <?php echo wp_kses_post( $atts['bio'] ); ?>
                                    </div><!-- .eof tab-pane -->
                                    <?php
                                        $tab_num++;
                                        endif; //bio check

                                        if ( ! empty( $atts['skills'] ) ) :
                                    ?>
                                    <div class="tab-pane tab-member-skills fade <?php echo ( 0 === $tab_num ) ? 'in active show' : '' ?>"
                                         id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
                                        <?php
                                            foreach($atts['skills'] as $skill) :
                                                echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
                                            endforeach;
                                        ?>
                                    </div><!-- .eof tab-pane -->
                                    <?php
                                        $tab_num++;
                                        endif; //skills check

                                        if ( ! empty( json_decode($atts['form']['json'])[1] ) ) :
                                    ?>
                                    <div class="tab-pane tab-member-form fade <?php echo ( 0 === $tab_num ) ? 'in active show' : '' ?>"
                                         id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
                                        <?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
                                    </div><!-- .eof tab-pane -->
                                    <?php
                                        $tab_num++;
                                        endif; //form check
                                    ?>
                                </div>
                            </div>
                        <?php endif; //tab content check ?>

                        <?php if ( ! empty( $atts['additional_content'] ) ) : ?>
                            <div class="member-additional-content mt-40">
                                <?php echo wp_kses_post( $atts['additional_content'] ); ?>
                            </div>
                        <?php endif; //additional content ?>
                    </div>
                    <!-- .entry-content -->
                </div>
                <!-- .vertical-item -->
            </div>
            <!-- .col-lg-7 -->
        </article><!-- #post-## -->
    <?php endwhile; ?>
</div><!--eof #content -->
<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();