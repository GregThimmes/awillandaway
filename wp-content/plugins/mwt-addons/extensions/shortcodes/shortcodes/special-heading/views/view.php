<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var $atts
 */
if ( ! $atts['headings'] ) {
	return;
}
foreach ( $atts['headings'] as $key => $heading ) :
	$font_size = isset( $heading['big_font_size'] ) ? $heading['big_font_size'] : '';
	$heading_font_family = isset( $heading['heading_font_family'] ) ? $heading['heading_font_family'] : '';
	$custom_class = isset( $heading['class'] ) ? $heading['class'] : '';
	$class = '';
	//for headings
    if ( $heading_font_family !== 'saint-delafield-font' ) :
        $class .= 'special-heading';
    else:
        $class .= 'special-heading subheading';
    endif;
	//for paragraph
	$icon_array = psycheco_get_unyson_icon_type_v2_array_for_special_heading( $atts, $key );
	?>
	<<?php echo esc_html( $heading['heading_tag'] ); ?> class="<?php echo esc_attr( $class . ' ' . $atts['heading_align'] . ' ' . $custom_class ); ?>">
	<?php if ( !empty( $icon_array ) ) :
		echo wp_kses_post( $icon_array['icon_html'] );
	endif; ?>
	<?php if( $heading['heading_text_link']) : ?>
		<a href="<?php echo esc_url( $heading['heading_text_link']); ?>">
	<?php endif; ?>
		<span class="<?php echo esc_attr( trim (
				$heading['heading_text_color']
				. ' ' .
				$heading['heading_text_weight']
                . ' ' .
				$font_size
				. ' ' .
				$heading_font_family
				. ' ' .
				$heading['heading_text_transform'] )

		);

		?>">
			<?php echo wp_kses_post( $heading['heading_text'] ) ?>
		</span>
	<?php if( $heading['heading_text_link']) : ?>
		</a>
	<?php endif; ?>
	</<?php echo esc_html( $heading['heading_tag'] ); ?>>
<?php endforeach; ?>



