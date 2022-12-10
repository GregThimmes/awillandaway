<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

//header products counter ajax refresh
add_filter( 'woocommerce_add_to_cart_fragments', 'psycheco_woocommerce_cart_count_fragments', 10, 1 );
if ( ! function_exists( 'psycheco_woocommerce_cart_count_fragments' ) ) :
	function psycheco_woocommerce_cart_count_fragments( $fragments ) {
		$fragments['span.cart-count'] = '<span class="badge bg-maincolor cart-count">';
		if (! empty( WC()->cart->get_cart_contents_count() ) ) {
			$fragments['span.cart-count'] .= WC()->cart->get_cart_contents_count();
		}
		$fragments['span.cart-count'] .= '</span>';
		return $fragments;
	}
endif;

//remove page title in shop page
add_filter( 'woocommerce_show_page_title', 'psycheco_filter_remove_shop_title_in_content' );
if ( ! function_exists( 'psycheco_filter_remove_shop_title_in_content' ) ) :
	function psycheco_filter_remove_shop_title_in_content() {
		return false;
	}
endif;

//remove wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_shop_loop', 'psycheco_action_echo_div_columns_before_shop_loop' );
if ( ! function_exists( 'psycheco_action_echo_div_columns_before_shop_loop' ) ) :
	function psycheco_action_echo_div_columns_before_shop_loop() {
		$column_classes = psycheco_get_columns_classes();
		echo '<div id="content_products" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
	}
endif;


//loop pagination
//closing main column and getting sidebar if exist
add_action( 'woocommerce_after_shop_loop', 'psycheco_action_echo_div_columns_after_shop_loop' );
if ( ! function_exists( 'psycheco_action_echo_div_columns_after_shop_loop' ) ):
	function psycheco_action_echo_div_columns_after_shop_loop() {
		echo '</div><!-- eof #content_products -->';
		$column_classes = psycheco_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
            <!-- main aside sidebar -->
            <aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
            </aside>
            <!-- eof main aside sidebar -->
		<?php
		endif;
	}
endif;


// single product in shop loop
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'psycheco_action_echo_markup_before_shop_loop_item' );
if ( ! function_exists( 'psycheco_action_echo_markup_before_shop_loop_item' ) ):
	function psycheco_action_echo_markup_before_shop_loop_item() {
		echo '<div class="vertical-item product-inner bordered">';
		echo '<div class="item-media-wrap">';
		echo '<div class="item-media">';
		woocommerce_template_loop_product_link_open();
	}
endif;


add_action( 'woocommerce_before_shop_loop_item_title', 'psycheco_action_echo_markup_before_shop_loop_item_title' );
if ( ! function_exists( 'psycheco_action_echo_markup_before_shop_loop_item_title' ) ):
	function psycheco_action_echo_markup_before_shop_loop_item_title() {
		
		woocommerce_template_loop_product_link_close();
		echo '</div> <!-- eof .item-media -->';
		echo '</div> <!-- eof .item-media-wrap -->';
		echo '<div class="item-content">';
	}
endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'psycheco_action_echo_markup_before_shop_loop_item_title' );
if ( ! function_exists( 'psycheco_action_echo_markup_before_shop_loop_item_title' ) ):
	function psycheco_action_echo_markup_before_shop_loop_item_title() {
		woocommerce_template_loop_product_link_close();
	}
endif;

//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'psycheco_action_woocommerce_template_loop_product_title', 10 );
if ( ! function_exists( 'psycheco_action_woocommerce_template_loop_product_title' ) ):
	function psycheco_action_woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title">';
		woocommerce_template_loop_product_link_open();
		the_title();
		woocommerce_template_loop_product_link_close();
		echo '</h2>';
		
		woocommerce_template_single_excerpt();
		
	}
endif;

add_action( 'woocommerce_after_shop_loop_item', 'psycheco_action_echo_footer_after_item_title', 15 );
if ( ! function_exists( 'psycheco_action_echo_footer_after_item_title' ) ):
	function psycheco_action_echo_footer_after_item_title() {
		echo '<div class="product-footer-content">';
        woocommerce_template_loop_rating();
        woocommerce_template_loop_price();
		echo '</div>'; //product-footer-content
    }
endif;


//single product view
//single product image and summary layout
add_filter( 'woocommerce_product_description_heading', '__return_null' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
add_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 15 );

add_action( 'woocommerce_before_single_product', 'psycheco_action_echo_div_columns_before_single_product' );
if ( ! function_exists( 'psycheco_action_echo_div_columns_before_single_product' ) ):
	function psycheco_action_echo_div_columns_before_single_product() {
		$column_classes = psycheco_get_columns_classes();
		echo '<div id="content_product" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
	}
endif;

add_action( 'woocommerce_after_single_product', 'psycheco_action_echo_div_columns_after_single_product' );
if ( ! function_exists( 'psycheco_action_echo_div_columns_after_single_product' ) ):
	function psycheco_action_echo_div_columns_after_single_product() {
		echo '</div> <!-- eof .col- -->';
		$column_classes = psycheco_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
            <!-- main aside sidebar -->
            <aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
            </aside>
            <!-- eof main aside sidebar -->
		<?php
		endif;
	}
endif;

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_filter( 'woocommerce_single_product_image_html', 'psycheco_filter_put_onsale_span_in_main_image' );
if ( ! function_exists( 'psycheco_filter_put_onsale_span_in_main_image' ) ):
	function psycheco_filter_put_onsale_span_in_main_image( $html ) {
		return $html . woocommerce_show_product_sale_flash();
	}
endif;

//elements in single product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 8 );

add_action( 'woocommerce_before_add_to_cart_button', 'psycheco_action_echo_open_div_before_add_to_cart_button' );
if ( ! function_exists( 'psycheco_action_echo_open_div_before_add_to_cart_button' ) ):
	function psycheco_action_echo_open_div_before_add_to_cart_button() {
		echo '<div class="add-to-cart">';
	}
endif;

add_action( 'woocommerce_after_add_to_cart_button', 'psycheco_action_echo_open_div_after_add_to_cart_button' );
if ( ! function_exists( 'psycheco_action_echo_open_div_after_add_to_cart_button' ) ):
	function psycheco_action_echo_open_div_after_add_to_cart_button() {
		echo '</div>';
	}
endif;

//account navigation
add_action( 'woocommerce_before_account_navigation', 'psycheco_action_woocommerce_before_account_navigation' );
if ( ! function_exists( 'psycheco_action_woocommerce_before_account_navigation' ) ):
	function psycheco_action_woocommerce_before_account_navigation() {
		echo '<div class="buttons">';
	}
endif;

add_action( 'woocommerce_after_account_navigation', 'psycheco_action_woocommerce_after_account_navigation' );
if ( ! function_exists( 'psycheco_action_woocommerce_after_account_navigation' ) ):
	function psycheco_action_woocommerce_after_account_navigation() {
		echo '</div><!-- eof .buttons -->';
	}
endif;


//mini cart
add_filter( 'woocommerce_cart_item_thumbnail', 'psycheco_filter_minicart_thumbnail', 10, 3 );
if ( ! function_exists( 'psycheco_filter_minicart_thumbnail') ):
	function psycheco_filter_minicart_thumbnail( $product_image,  $cart_item, $cart_item_key  ){
		$link = get_permalink( $cart_item['product_id'] );
		$html = $product_image;
		if ( !empty( $link) ) {
			$html .= '</a>';
		}
		$html .= '<div class="minicart-product-meta">';
		if ( !empty( $link) ) {
			$html .= '<a href="' . esc_url( $link ) . '">';
		}
		return $html;
	}
endif;

add_filter( 'woocommerce_widget_cart_item_quantity', 'psycheco_filter_minicart_item_quantity', 10, 3 );
if ( ! function_exists( 'psycheco_filter_minicart_item_quantity') ):
	function psycheco_filter_minicart_item_quantity( $span,  $cart_item, $cart_item_key  ){
		$link = get_permalink( $cart_item['product_id'] );
		$html = '' ;
		if ( !empty( $link) ) {
			$html .= '</a>';
		}
		$html .= $span . '</div><!-- .minicart-product-meta -->';
		return $html;
	}
endif;