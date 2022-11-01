<?php
$thb_dark_mode  = ( get_option( 'thb_dark_mode' ) || 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ) ? 'on' : false;
$header_class[] = 'header style1';
$header_class[] = 'thb-main-header';
$header_class[] = 'on' === $thb_dark_mode ? 'dark-header' : ot_get_option( 'header_color', 'light-header' );
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="header-logo-row">
	<div class="row align-middle">
		<div class="small-4 columns">
		<?php do_action( 'thb_header_left' ); ?>
		</div>
			<div class="small-4 columns">
		<?php do_action( 'thb_logo' ); ?>
		</div>
		<div class="small-4 columns">
		<?php do_action( 'thb_header_right' ); ?>
		</div>
	</div>
	</div>
	<div class="header-menu-row">
	<div class="row">
		<div class="small-12 columns">
		<div class="thb-navbar">
			<?php do_action( 'thb_mobile_toggle' ); ?>
			<?php get_template_part( 'inc/templates/header/full-menu' ); ?>
			<?php do_action( 'thb_secondary_area' ); ?>
		</div>
		</div>
	</div>
	</div>
</header>
