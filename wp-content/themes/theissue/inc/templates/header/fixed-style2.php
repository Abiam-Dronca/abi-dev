<?php
	$thb_dark_mode          = ( get_option( 'thb_dark_mode' ) || 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ) ? 'on' : false;
	$fixed_header_fullwidth = ot_get_option( 'fixed_header_fullwidth', 'on' );
	$header_class[]         = 'header fixed fixed-style2';
if ( 'on' === $fixed_header_fullwidth ) {
	$header_class[] = 'header-full-width';
}
	$header_class[] = 'fixed-header-full-width-' . $fixed_header_fullwidth;
	$header_class[] = 'on' === $thb_dark_mode ? 'dark-header' : ot_get_option( 'fixed_header_color', 'light-header' );
	$header_class[] = ot_get_option( 'fixed_header_shadow', 'thb-fixed-shadow-style1' );

	$row_class[] = 'row';
	$row_class[] = 'on' === $fixed_header_fullwidth ? 'full-width-row' : false;
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="<?php echo esc_attr( implode( ' ', $row_class ) ); ?>">
		<div class="small-12 columns">
			<div class="thb-navbar">
				<div>
					<?php do_action( 'thb_mobile_toggle' ); ?>
				</div>
				<?php do_action( 'thb_logo', 'fixed-logo' ); ?>
				<?php do_action( 'thb_secondary_area' ); ?>
			</div>
		</div>
	</div>
</header>
