<?php

// Download Emails.
function thb_csv_export() {
	$download = filter_input( INPUT_GET, 'thb_download_emails', FILTER_SANITIZE_STRING );
	if ( $download && current_user_can( 'manage_options' ) ) {
		$filename = 'thb_subcribed_emails_' . time() . '.csv';

		// emails.
		$stack = get_option( 'subscribed_emails' );
		$fh    = @fopen( 'php://output', 'w' );

		header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
		header( 'Content-Description: File Transfer' );
		header( 'Content-type: text/csv' );
		header( "Content-Disposition: attachment; filename={$filename}" );
		header( 'Expires: 0' );
		header( 'Pragma: public' );

		foreach ( $stack as $line ) {
			$val = explode( ',', $line );
			fputcsv( $fh, $val );
		}

		fclose( $fh );
		die();
	}

}
add_action( 'admin_init', 'thb_csv_export' );

/* Author FB, TW & G+ Links */
function theissue_my_new_contactmethods( $contactmethods ) {

	// Add Twitter
	$contactmethods['twitter'] = esc_html__( 'Twitter URL', 'theissue' );

	// Add Facebook
	$contactmethods['facebook'] = esc_html__( 'Facebook URL', 'theissue' );

	// Add Instagram
	$contactmethods['instagram'] = esc_html__( 'Instagram Profile URL', 'theissue' );

	// Add YouTube
	$contactmethods['youtube'] = esc_html__( 'YouTube Profile URL', 'theissue' );

	// Add Linkedin
	$contactmethods['linkedin'] = esc_html__( 'Linkedin Profile URL', 'theissue' );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'theissue_my_new_contactmethods', 10, 1 );
