<?php function thb_countdown( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_countdown', $atts );
	extract( $atts );

	$el_class[] = 'thb-countdown';

	$out = '';
	ob_start();

	?>
	<div class="thb-countdown" data-offset="<?php echo esc_attr( $offset ); ?>" data-date="<?php echo esc_attr( $date ); ?>">
	<ul class="thb-countdown-ul">
		<li>
		<span class="days timestamp">00</span>
		<span class="timelabel"><?php esc_html_e( 'days', 'theissue' ); ?></span>
		</li>
		<li>
		<span class="hours timestamp">00</span>
		<span class="timelabel"><?php esc_html_e( 'hours', 'theissue' ); ?></span>
		</li>
		<li>
		<span class="minutes timestamp">00</span>
		<span class="timelabel"><?php esc_html_e( 'minutes', 'theissue' ); ?></span>
		</li>
		<li>
		<span class="seconds timestamp">00</span>
		<span class="timelabel"><?php esc_html_e( 'seconds', 'theissue' ); ?></span>
		</li>
	</ul>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_countdown', 'thb_countdown' );
