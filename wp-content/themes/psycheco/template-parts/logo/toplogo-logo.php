<?php
/**
 *    The Toplogo Logo for our theme
 *
 *    Displays logo in toplogo section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$options = psycheco_get_options();
$section = psycheco_get_section_options( $options, 'toplogo_' );

$logo_image_key = 'logo_image';
//if dark or color section background - take inverse image
if( ( strpos($section['section_class'], 'ds' ) !== false ) || ( strpos($section['section_class'], 'cs' ) !== false ) ) {
	$logo_image_key = 'logo_image_inverse';
}

$logo_image = psycheco_get_option( $logo_image_key, '' );
$logo_text  = psycheco_get_option( 'logo_text' );
$logo_class = 'logo';
if ( ! $logo_text ) {
	$logo_class .= ' logo_image_only';
}
if ( ! $logo_image ) {
	$logo_class .= ' logo_text_only';
}
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
   rel="home" class="<?php echo esc_attr( $logo_class ); ?>">
	<?php if ( $logo_image ) : ?>
        <img src="<?php echo esc_attr( $logo_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
	<?php endif; //logo_image	?>
    <div class="d-flex flex-column">
		<?php if ( $logo_text ) : ?>
            <h4 class="logo-text">
				<?php echo esc_html( $logo_text ); ?>
			</h4>
		<?php endif; //logo_text	?>
	</div>

</a>