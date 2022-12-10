<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta( $atts['image']['attachment_id'], '_wp_attachment_image_alt', true );

$img_attributes = array(
	'src'   => $image,
	'alt'   => $alt ? $alt : $image,
	'class' => 'main-image',
);

if ( ! empty( $width ) ) {
	$img_attributes['width'] = $width;
}

if ( ! empty( $height ) ) {
	$img_attributes['height'] = $height;
}

// Second image options
if ( ! empty( $atts['image2'] ) ) {
	$width2  = ( is_numeric( $atts['width2'] ) && ( $atts['width2'] > 0 ) ) ? $atts['width2'] : '';
	$height2 = ( is_numeric( $atts['height2'] ) && ( $atts['height2'] > 0 ) ) ? $atts['height2'] : '';
	
	if ( ! empty( $width2 ) && ! empty( $height2 ) ) {
		$image2 = fw_resize( $atts['image2']['attachment_id'], $width2, $height2, true );
	} else {
		$image2 = $atts['image2']['url'];
	}
	
	$alt2 = get_post_meta( $atts['image2']['attachment_id'], '_wp_attachment_image_alt', true );
	
	$img_attributes2 = array(
		'src'   => $image2,
		'alt'   => $alt2 ? $alt2 : $image2,
		'class' => 'second-image',
	);
	
	if ( ! empty( $width2 ) ) {
		$img_attributes2['width2'] = $width2;
	}
	
	if ( ! empty( $height2 ) ) {
		$img_attributes2['height2'] = $height2;
	}
}

if ( empty( $atts['link'] ) ) {
	echo '<div class="images-wrap-item  ' . $atts['image_layout'] . ' ' . $atts['class'] . ' ' . $atts['blob_effect'] . ' " >';
		echo fw_html_tag( 'img', $img_attributes );
		if ( ! empty( $atts['image_layout'] && $atts['image2'] ) ) {
			echo fw_html_tag( 'img', $img_attributes2 );
		}
	echo '</div>';
} else {
	echo '<div class="images-wrap-item  ' . $atts['image_layout'] . ' ' . $atts['class'] . ' ' . $atts['blob_effect'] . ' " >';
		echo '<a href="' . $atts['link'] . '" target="' . $atts['target'] . '">';
			echo fw_html_tag( 'img', $img_attributes );
			if ( ! empty( $atts['image_layout'] && $atts['image2'] ) ) {
				echo fw_html_tag( 'img', $img_attributes2 );
			}
		echo '</a>';
	echo '</div>';
}
