<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];
wp_enqueue_style( 'datetimepicker-css', esc_url( get_theme_file_uri( '/framework-customizations/extensions/forms/includes/builder-items/date-picker/static/css/bootstrap-datetimepicker.min.css' ) ), false, null );
wp_enqueue_script( 'moment', esc_url( get_theme_file_uri( '/framework-customizations/extensions/forms/includes/builder-items/date-picker/static/js/moment.min.js' ) ), array( 'jquery' ), null );
wp_enqueue_script( 'bootstrap-datetimepicker', esc_url( get_theme_file_uri( '/framework-customizations/extensions/forms/includes/builder-items/date-picker/static/js/bootstrap-datetimepicker.min.js' ) ), array( 'jquery' ), null );

?>

<div class="<?php echo esc_attr( fw_ext_builder_get_item_width( 'form-builder', $item['width'] . '/frontend_class' ) ) ?>">
    <div class="datepicker-form form-group<?php echo ( ( ! empty( $attr['placeholder'] ) ) || ( ! empty( $options['icon'] ) ) ) ? esc_attr( ' has-placeholder' ) : ''; ?>">
        <label for="<?php echo esc_attr( $attr['id'] ) ?>"><?php echo fw_htmlspecialchars( $item['options']['label'] ) ?>
			<?php if ( $options['required'] ): ?><sup>*</sup><?php endif; ?>
        </label>
		<?php if ( ! empty( $options['icon'] ) ) : ?>
            <i class="<?php echo esc_attr( $options['icon'] ); ?>"></i>
		<?php endif; ?>
        <input class="form-control datepicker"
               data-format="<?php echo esc_attr( ( $options['data_format'] ) ); ?>"
			<?php echo fw_attr_to_html( $attr ) ?>
        >
    </div>
</div>