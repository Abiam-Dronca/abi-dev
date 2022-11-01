<?php

if ( ! class_exists( 'TheIssue_plugin' ) ) {
	return;
}

$newsletter_translation = ot_get_option( 'newsletter_translation', 'off' );

?>
<aside class="thb-article-subscribe thb-newsletter-form">
	<div class="thb-subscribe-icon-container"><?php get_template_part( 'assets/img/svg/subscribe.svg' ); ?></div>
	<h4>
		<?php
		if ( 'on' === $newsletter_translation ) {
			$newsletter_translation_title = ot_get_option( 'newsletter_translation_title' );
			echo wp_kses_post( $newsletter_translation_title );
		} else {
			esc_html_e( 'Sign Up to Our Newsletter', 'theissue' );
		}
		?>
	</h4>
	<p>
		<?php
		if ( 'on' === $newsletter_translation ) {
			$newsletter_translation_text = ot_get_option( 'newsletter_translation_text' );
			echo wp_kses_post( $newsletter_translation_text );
		} else {
			esc_html_e( 'Get notified about exclusive offers every week!', 'theissue' );
		}
		?>
	</p>
	<?php if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) { ?>
		<p class="thb-newsletter-warning-text">
			<?php esc_html_e( 'Newsletter texts can be changed inside Appearance > Theme Options > Newsletter > Translation. This message is only visible to Administrators.', 'theissue' ); ?>
		</p>
	<?php } ?>
	<form class="newsletter-form" action="#" method="post" data-security="<?php echo esc_attr( wp_create_nonce( 'thb_subscription' ) ); ?>">
		<input placeholder="<?php esc_attr_e( 'Your E-Mail', 'theissue' ); ?>" type="text" name="widget_subscribe" class="widget_subscribe large">
		<button type="submit" name="submit" class="btn large"><?php esc_html_e( 'SIGN UP', 'theissue' ); ?></button>
		<?php do_action( 'thb_after_newsletter_submit' ); ?>
	</form>
	<?php do_action( 'thb_after_newsletter_form' ); ?>
</aside>
