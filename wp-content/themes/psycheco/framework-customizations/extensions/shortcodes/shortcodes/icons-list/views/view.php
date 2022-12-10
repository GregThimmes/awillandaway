<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$list_style = ! empty( $atts['list_style'] ) ? $atts['list_style'] : '1';

switch ( $list_style ) :
    case '2':
?>
    <ul class="list-icons list-bordered">
		<?php foreach ( $atts['icons'] as $icon ): ?>
            <li>
                <div class="icon-inline">
                    <div class="icon-left">
						<?php if ( $icon['icon'] ): ?>
                            <div class="icon-styled">
                                <i class="<?php echo esc_attr( $icon['icon'] . ' ' . $icon['icon_style'] . ' ' . $icon['icon_font_size'] ); ?>"></i>
                            </div>
						<?php endif; //icon ?>
						<?php if ( ! empty ( $icon['title'] ) ) : ?>
                            <p class="fw-icon-title">
								<?php echo wp_kses_post( $icon['title'] ); ?>
                            </p>
						<?php endif; ?>
                    </div>
					<?php if ( ! empty ( $icon['text'] ) ) : ?>
                        <p class="fw-icon-text color-darkgrey">
							<?php echo wp_kses_post( $icon['text'] ); ?>
                        </p>
					<?php endif; ?>
                </div>
            </li>
		<?php endforeach; ?>
    </ul>
<?php
    break;
    default:
?>
        <ul class="list-icons">
		    <?php foreach ( $atts['icons'] as $icon ): ?>
                <li>
				    <?php
				    //get teaser shortcode to render teasers inside a row
				    echo fw_ext( 'shortcodes' )->get_shortcode( 'icon' )->render( $icon );
				    ?>
                </li>
		    <?php endforeach; ?>
        </ul>
<?php endswitch;