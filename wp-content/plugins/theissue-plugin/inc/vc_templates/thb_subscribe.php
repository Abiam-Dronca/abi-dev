<?php function thb_subscribe( $atts, $content = null ) {
	$style = 'style1';
	$atts  = vc_map_get_attributes( 'thb_subscribe', $atts );
	extract( $atts );
	ob_start();

	?>
	<aside class="thb-newsletter-form thb-subscribe-element <?php echo esc_attr( $style ); ?>">
		<?php
		if ( $title ) {
			?>
			<h4><?php echo esc_html( $title ); ?></h4><?php } ?>
		<?php
		if ( $content ) {
			?>
			<?php echo wp_kses_post( wpautop( $content ) ); ?><?php } ?>
			<?php if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) { ?>
				<p class="thb-newsletter-warning-text">
					<?php esc_html_e( 'This Newsletter text can be edited within Subscribe Element settings inside the Page Builder.', 'theissue' ); ?>
				</p>
			<?php } ?>
		<div>
			<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
				<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'theissue' ); ?>" type="text" name="widget_subscribe" class="widget_subscribe large">
				<button type="submit" name="submit" class="btn large"><?php esc_html_e( 'SIGN UP', 'theissue' ); ?></button>
				<?php do_action( 'thb_after_newsletter_submit' ); ?>
			</form>
			<?php do_action( 'thb_after_newsletter_form' ); ?>
		</div>
	</aside>
	<?php
	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_subscribe', 'thb_subscribe' );
