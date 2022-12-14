<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="bootstrap-tabs <?php echo esc_attr( $atts['small_tabs'] ); ?>">
	<div class="row c-gutter-50">
		<div class="col-md-5 col-lg-4">
			<ul class="nav nav-tabs flex-column vertical-tab" role="tablist">
				<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
					<li class="nav-item">
						<a
							id="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
							class="nav-link<?php echo ( 0 === $index ) ? ' active' : '' ?>"
							href="#tab-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
							role="tab"
							data-toggle="tab"
							aria-controls="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
							aria-expanded="<?php echo( 0 === $index ) ? 'true' : 'false' ?>"
						>
							<div class="media">
								<?php if ( $tab['icon'] ) : ?>
									<div class="icon-styled">
										<i class="<?php echo esc_attr( $tab['icon'] . ' ' . $tab['icon_color'] ); ?> fs-40"></i>
									</div>
								<?php endif; //icon ?>
								<div class="media-body">
									<?php if ( ! empty( $tab['tab_title'] ) ) : ?>
										<h6>
											<?php echo esc_html( $tab['tab_title'] ); ?>
										</h6>
									<?php endif;
									if ( ! empty( $tab['tab_subtitle'] ) ) : ?>
										<p>
											<?php echo esc_html( $tab['tab_subtitle'] ); ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="fw-divider-space divider-30 divider-lg-0"></div>
		</div>
		<div class="col-md-7 col-lg-8">
			<div class="tab-content vertical-tab-content p-0 border-0">
				<?php foreach ( $atts['tabs'] as $index => $tab ) : ?>
					<div class="tab-pane fade <?php echo ( 0 === $index ) ? 'show active' : '' ?>"
						id="tab-<?php echo esc_attr( $atts['id'] . '-' . $index ); ?>"
						role="tabpanel"
						aria-labelledby="tab_link-<?php echo esc_attr( $atts['id'] ) . '-' . $index ?>"
					>
						<?php
							echo fw_ext( 'shortcodes' )->get_shortcode( 'accordion' )->render( $tab );
						?>
					</div><!-- .eof tab-pane -->
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

