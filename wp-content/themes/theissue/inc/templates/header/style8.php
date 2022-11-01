<?php
$thb_dark_mode  = ( get_option( 'thb_dark_mode' ) || 'on' === ot_get_option( 'thb_dark_mode', 'off' ) ) ? 'on' : false;
$header_class[] = 'header style8';
$header_class[] = 'thb-main-header';
$header_class[] = 'on' === $thb_dark_mode ? 'dark-header' : ot_get_option( 'header_color', 'light-header' );
?>
<header class="<?php echo esc_attr( implode( ' ', $header_class ) ); ?>">
	<div class="row">
	<div class="small-12 columns nav-column">
		<div class="thb-navbar">
		<?php get_template_part( 'inc/templates/header/full-menu' ); ?>
		<?php do_action( 'thb_logo' ); ?>
		<?php do_action( 'thb_secondary_area' ); ?>
		</div>
	</div>
	</div>
</header>
