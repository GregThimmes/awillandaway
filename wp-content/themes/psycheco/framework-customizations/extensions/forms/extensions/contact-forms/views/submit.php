<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int $form_id
 * @var string $submit_button_text
 * @var array $extra_data
 */

$submit_button_margin   = ! empty( $extra_data['submit_button_top_margin'] ) ? $extra_data['submit_button_top_margin'] : '';
$submit_button_color    = ! empty( $extra_data['submit_color'] ) ? $extra_data['submit_color'] : '';
$submit_button_size     = ! empty( $extra_data['submit_size'] ) ? $extra_data['submit_size'] : '';
$submit_wide_button     = ! empty( $extra_data['submit_wide_button'] ) ? $extra_data['submit_wide_button'] : '';
$submit_button_position = ! empty( $extra_data['submit_button_position'] ) ? $extra_data['submit_button_position'] : '';

?>

<div class="wrap-forms mt-20 <?php echo esc_attr( $submit_button_margin . ' ' . $submit_button_position ); ?>">
	<div class="row">
		<div class="col-12 col-sm-12 mb-0">
			<button type="submit" class="<?php echo esc_attr( $submit_button_color . ' ' . $submit_wide_button  . ' ' . $submit_button_size ); ?>">
				<span><?php echo esc_html( $submit_button_text ) ?></span>
			</button>
			<?php if ( $extra_data['reset_button_text'] ) : ?>
				<button class="btn btn-outline-darkgrey" type="reset"
                        value="<?php echo esc_attr( $extra_data['reset_button_text'] ); ?>">
                        <span><?php echo esc_html( $extra_data['reset_button_text'] ); ?></span>
                </button>
			<?php endif;
			if ( defined( 'FW' ) ) : ?>
				<!-- form error messages -->
				<div class="fw-messages-wrap">
					<?php FW_Flash_Messages::_print_frontend(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>