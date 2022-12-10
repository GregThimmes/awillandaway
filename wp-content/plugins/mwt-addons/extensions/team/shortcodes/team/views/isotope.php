<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 * @var array $posts
 */

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-xl-* class
$lg_class = '';
switch ( $atts['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-xl-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-xl-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-xl-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-xl-3';
		break;
	//6
	default:
		$lg_class = 'col-xl-2';
endswitch;

//bootstrap col-lg-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$md_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$md_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$md_class = 'col-lg-3';
		break;
	//6
	default:
		$md_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$sm_class = '';
switch ( $atts['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-md-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-md-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-md-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-md-3';
		break;
	//6
	default:
		$sm_class = 'col-md-2';
endswitch;

//bootstrap col-* class
$xs_class = '';
switch ( $atts['responsive_xs'] ) :
	case ( 1 ) :
		$xs_class = 'col-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-3';
		break;
	//6
	default:
		$xs_class = 'col-2';
endswitch;

//margin values:
$margin_class = '';
switch ( $atts['margin'] ) :
	case ( 0 ) :
		$margin_class = 'c-gutter-0';
		break;

	case ( 1 ) :
		$margin_class = 'c-gutter-1';
		break;

	case ( 2 ) :
		$margin_class = 'c-gutter-2';
		break;

	case ( 10 ) :
		$margin_class = 'c-gutter-10';
		break;
	
	case ( 50 ) :
		$margin_class = 'c-gutter-50';
		break;
		
    case ( 60 ) :
		$margin_class = 'c-gutter-60';
		break;
		
	//30
	default:
		$margin_class = 'c-gutter-30';
endswitch;

//vertical margin values:
$vertical_class = '';
switch ( $atts['vertical_margin'] ) :
	case ( 0 ) :
		$vertical_class = 'c-md-0';
		break;

	case ( 1 ) :
		$vertical_class = 'c-mb-1';
		break;

	case ( 2 ) :
		$vertical_class = 'c-mb-2';
		break;

	case ( 10 ) :
		$vertical_class = 'c-mb-10';
		break;
		
    case ( 50 ) :
		$vertical_class = 'c-mb-50';
		break;
		
    case ( 60 ) :
		$vertical_class = 'c-mb-60';
		break;
		
	//30
	default:
		$vertical_class = 'c-mb-30';
endswitch;

$unique_id    = uniqid();
$layout_item  = ! empty( $atts['layout_item'] ) ? $atts['layout_item'] : 'loop-item';
$categories   = fw_ext_extension_get_listing_categories( $atts['cat'], 'team' );
$sort_classes = fw_ext_extension_get_sort_classes( $posts->posts, $categories, '', 'team' );

if ( $atts['show_filters'] ) : ?>
	<div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?> text-center">
		<a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'mwt' ); ?></a>
		<?php
		foreach ( $categories as $category ) {
			?>
			<a href="#"
			   data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php
		} //foreach
		?>
	</div>
	<?php
endif; //showfilters check

?>

<div class="isotope-wrapper isotope row masonry-layout <?php echo esc_attr( $margin_class . ' ' . $vertical_class ); ?>"
    <?php if ( $atts['show_filters'] ) : ?>
        data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>"
    <?php endif; // filters ?>
>
    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
        <div
            class="isotope-item <?php echo esc_attr( $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $sort_classes[get_the_ID()] ); ?>">
            <?php
                include( fw()->extensions->get( 'team' )->locate_view_path( $layout_item ) );
            ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); // reset the query ?>
</div><!-- eof .isotope-wrapper -->
