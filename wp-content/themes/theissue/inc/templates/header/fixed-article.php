<?php
	$thb_dark_mode          = ( get_option( 'thb_dark_mode' ) || 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ) ? 'on' : false;
	$fixed_header_fullwidth = ot_get_option( 'fixed_header_fullwidth', 'on' );
	$header_class[]         = 'header fixed fixed-article';
if ( $fixed_header_fullwidth === 'on' ) {
	$header_class[] = 'header-full-width';
}
	$header_class[] = 'fixed-header-full-width-' . $fixed_header_fullwidth;
	$header_class[] = 'on' === $thb_dark_mode ? 'dark-header' : ot_get_option( 'fixed_header_color', 'light-header' );
	$header_class[] = ot_get_option( 'fixed_header_shadow', 'thb-fixed-shadow-style1' );

	$infinite = ot_get_option( 'infinite_load', 'on' );

	$row_class[] = 'row';
	$row_class[] = 'on' === $fixed_header_fullwidth ? 'full-width-row' : false;
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="<?php echo esc_attr( implode( ' ', $row_class ) ); ?>">
		<div class="small-12 columns">
			<div class="thb-navbar">
				<div class="fixed-logo-holder">
					<?php do_action( 'thb_mobile_toggle' ); ?>
					<?php do_action( 'thb_logo', 'fixed-logo' ); ?>
				</div>
				<div class="fixed-title-holder">
					<span><?php esc_html_e( 'Now Reading', 'theissue' ); ?></span>
					<div class="fixed-article-title">
					<h6 id="page-title"><?php echo wp_strip_all_tags( get_the_title() ); ?></h6>
					</div>
				</div>
				<div class="fixed-article-shares">
					<?php do_action( 'thb_fixed_right' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php if ( is_singular( 'post' ) && $infinite === 'on' ) { ?>
		<div class="thb-reading-indicator">
			<?php get_template_part( 'assets/img/svg/indicator.svg' ); ?>
		</div>
	<?php } ?>
</header>
