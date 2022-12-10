<?php if ( ! defined( 'ABSPATH' ) ) {
	die();
}
if ( ! defined( 'FW' ) ) {
	return;
}
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var array $params
 */

$unique_id = uniqid();

echo wp_kses_post( $before_widget );

if ( ! empty ( $params[ 'title' ] ) ) :
	echo wp_kses_post( $before_title . $params[ 'title' ] . $after_title );
endif; //title
if ( ! empty ( $params['contact_info'] ) ) : ?>
	<div class="widget widget_contact_list">
		<?php foreach ( $params['contact_info'] as $contact ) : ?>
            <div class="contact-item">
                <?php if ( !empty( $contact['contact_title'] ) ) : ?>
                    <p class="title"><?php echo esc_html( $contact['contact_title'] ) ?></p>
                <?php endif;
                if ( !empty( $contact['contact_content_link'] ) ) : ?>
                    <a href="<?php echo esc_url( $contact['contact_content_link'] ) ?>">
                <?php endif;
                if ( !empty( $contact['contact_content'] ) ) : ?>
                    <p class="content"><?php echo esc_html( $contact['contact_content'] ) ?></p>
	            <?php endif;
                if ( !empty( $contact['contact_content_link'] ) ) : ?>
                    </a>
                <?php endif; ?>
            </div>
		<?php endforeach; ?>
	</div>
<?php endif; //social-icons

if ( ! empty( $params[ 'icons' ] ) && ( ! empty ( $shortcode_icons_list ) ) ) :
	echo wp_kses_post( $shortcode_icons_list->render( array( 'icons' => $params[ 'icons' ] ) ) );
endif; //icons list


echo wp_kses_post( $after_widget );