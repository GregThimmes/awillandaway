<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

$class = '';
$class .= ( $atts['class'] && isset( $atts['class'] ) ) ? ' ' .  $atts['class'] : '';
?>

<div class="<?php echo esc_attr( $class ); ?>">
