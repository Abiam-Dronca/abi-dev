<?php

/* Payment Icons */
function thb_footer_payment() {
	$footer_payment_icons = ot_get_option( 'footer_payment_icons' );

	if ( ! empty( $footer_payment_icons ) ) {
		?>
		<div class="footer-payment-icons">
			<?php foreach ( $footer_payment_icons as $payment ) { ?>
				<figure class="paymenttypes <?php echo esc_attr( $payment['payment_type'] ); ?>"><?php get_template_part( 'assets/img/svg/payment-types/' . $payment['payment_type'] . '.svg' ); ?></figure>
			<?php } ?>
		</div>
		<?php
	}
}
add_action( 'thb_footer_payment', 'thb_footer_payment', 3 );

/* Footer Logo */
function thb_footer_logo( $subfooter = false ) {
	$toggle = ot_get_option( 'footer_logo', 'off' );

	if ( $subfooter ) {
		$toggle = ot_get_option( 'subfooter_logo', 'off' );
	}
	if ( $toggle === 'on' ) {

		if ( $subfooter ) {
			$footer_logo_upload = ot_get_option( 'subfooter_logo_upload', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png' );
		} else {
			$footer_logo_upload = ot_get_option( 'footer_logo_upload', Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/logo.png' );
		}
		?>
		<div class="footer-logo-holder">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logolink" title="<?php bloginfo( 'name' ); ?>">
				<img src="<?php echo esc_url( $footer_logo_upload ); ?>" class="logoimg" loading="lazy" alt="<?php bloginfo( 'name' ); ?>"/>
			</a>
		</div>
		<?php
	}
}
add_action( 'thb_footer_logo', 'thb_footer_logo', 1 );

/* Footer Columns */
function thb_footer_columns() {
	$footer_columns = ot_get_option( 'footer_columns', 'fourcolumns' );
	?>
		<?php if ( $footer_columns === 'fourcolumns' ) { ?>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'threecolumns' ) { ?>
			<div class="small-12 medium-6 large-4 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-4 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 large-4 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'twocolumns' ) { ?>
			<div class="small-12 medium-6 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'doubleleft' ) { ?>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'doubleright' ) { ?>
			<div class="small-12 medium-6 large-6 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 large-3 columns">
					<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'fivecolumns' ) { ?>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-12 medium-6 thb-5 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-12 thb-5 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'onecolumns' ) { ?>
			<div class="small-12 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'sixcolumns' ) { ?>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer6' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'fivelargerightcolumns' ) { ?>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-8 large-4 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } elseif ( $footer_columns === 'fivelargeleftcolumns' ) { ?>
			<div class="small-6 medium-8 large-4 columns">
				<?php dynamic_sidebar( 'footer1' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer2' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer3' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer4' ); ?>
			</div>
			<div class="small-6 medium-4 large-2 columns">
				<?php dynamic_sidebar( 'footer5' ); ?>
			</div>
		<?php } ?>
	<?php
}
add_action( 'thb_footer_columns', 'thb_footer_columns' );
