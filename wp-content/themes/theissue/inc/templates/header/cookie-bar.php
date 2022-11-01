<?php if ( ot_get_option( 'thb_cookie_bar', 'off' ) === 'on' ) {
	if ( ! class_exists( 'TheIssue_plugin' ) ) {
		return; }
	?>
<aside class="thb-cookie-bar">
	<a class="thb-mobile-close"><div><span></span><span></span></div></a>
	<div class="thb-cookie-text">
	<?php echo do_shortcode( ot_get_option( 'thb_cookie_bar_content', '<p>Our site uses cookies. Learn more about our use of cookies: <a href="#">cookie policy</a></p>' ) ); ?>
	</div>
	<a class="btn grey button-accept"><?php esc_html_e( 'I accept use of cookies', 'theissue' ); ?></a>
</aside>
	<?php
}
