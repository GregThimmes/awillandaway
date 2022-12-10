<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 */


$item_settings = array();
if ( $item_type = fw_ext_mega_menu_get_db_item_option( $item->ID, 'type' ) ) {
	$item_settings = fw_ext_mega_menu_get_db_item_option( $item->ID, $item_type );
}
$item_image = '';
if ( ! empty( $item_settings ) ) {
	$item_image_attachment_id = isset( $item_settings['item_image'] ) ? $item_settings['item_image']['attachment_id'] : false;
	$item_image               = $item_image_attachment_id ? '<img src="' . wp_get_attachment_image_url( $item_image_attachment_id, 'thumbnail' ) . '" alt="' . $title . '">' : '';
}

$icon_html = '';
if (
	fw()->extensions->get( 'megamenu' )->show_icon()
	&&
	( $icon = fw_ext_mega_menu_get_meta( $item, 'icon' ) )
) {
	$icon_html .= "<i class=\"" . $icon . "\"></i>";
}

echo wp_kses_post( $args->before );
echo fw_html_tag( 'a', $attributes, $args->link_before . $icon_html . $item_image . $title . $args->link_after );
echo wp_kses_post( $args->after );