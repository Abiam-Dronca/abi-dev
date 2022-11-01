	</div> <!-- End Main -->
	<?php do_action( 'thb_after_main' ); ?>
	<?php
	$thb_id         = get_the_ID();
	$disable_footer = get_post_meta( $thb_id, 'disable_footer', true );
	if ( 'on' === ot_get_option( 'footer', 'on' ) && 'on' !== $disable_footer ) {
		get_template_part( 'inc/templates/footer/footer-style1' );
	}
	?>
	<?php
	if ( 'on' === ot_get_option( 'subfooter', 'on' ) ) {
		get_template_part( 'inc/templates/footer/subfooter-' . ot_get_option( 'subfooter_style', 'style1' ) );
	}
	?>
	<?php

		/*
		 * Always have wp_footer() just before the closing </body>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to reference JavaScript files.
		 */

		wp_footer();
	?>
</div> <!-- End Wrapper -->
<?php do_action( 'thb_after_wrapper' ); ?>
</body>
</html>
