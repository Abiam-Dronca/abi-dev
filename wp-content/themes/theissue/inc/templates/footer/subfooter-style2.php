<?php
$thb_dark_mode         = ( get_option( 'thb_dark_mode' ) || 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ) ? 'on' : false;
$subfooter_classes[]   = 'subfooter';
$subfooter_classes[]   = 'style2';
$subfooter_classes[]   = 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ? 'dark' : ot_get_option( 'subfooter_color', 'light' );
$subfooter_classes[]   = 'subfooter-full-width-' . ot_get_option( 'subfooter_full_width', 'off' );
$full_menu_hover_style = ot_get_option( 'full_menu_hover_style', 'thb-standard' );
$subfooter_menu        = ot_get_option( 'subfooter_menu' );
$subfooter_social_link = ot_get_option( 'subfooter_social_link', 'on' );
?>
<!-- Start subfooter -->
<div class="<?php echo esc_attr( implode( ' ', $subfooter_classes ) ); ?>">
	<div class="row align-center subfooter-row">
		<div class="small-12 medium-10 large-6 text-center">
			<?php do_action( 'thb_footer_logo', true ); ?>
			<?php
			if ( $subfooter_menu ) {
				wp_nav_menu(
					array(
						'menu'       => $subfooter_menu,
						'depth'      => 1,
						'menu_class' => 'thb-full-menu ' . $full_menu_hover_style,
					)
				); }
			?>
			<?php echo wp_kses_post( ot_get_option( 'subfooter_text' ) ); ?>
			<?php
			if ( 'on' === $subfooter_social_link ) {
				thb_get_social_list( true, false, 'thb-social-horizontal', 'circle-color' ); }
			?>
			<?php do_action( 'thb_footer_payment' ); ?>
		</div>
	</div>
</div>
<!-- End Subfooter -->
