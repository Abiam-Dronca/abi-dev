<?php

function thb_mailchimp_request( $http = 'GET', $method, $data = array() ) {
	$mc_token = ot_get_option( 'newsletter_mailchimp_api' );

	if ( ! $mc_token || false === strpos( $mc_token, '-' ) ) {
		return false;
	}

	$url = 'https://<dc>.api.mailchimp.com/3.0/' . ltrim( $method, '/' );

	list(, $data_center ) = explode( '-', $mc_token );

	$url = str_replace( '<dc>', $data_center, $url );

	$args = array(
		'url'       => $url,
		'method'    => $http,
		'headers'   => array(
			'Authorization' => 'apikey: ' . $mc_token,
			'Accept'        => 'application/json',
			'Content-Type'  => 'application/json',
			'User-Agent'    => 'DrewM/MailChimp-API/3.0',
		),
		'timeout'   => 10,
		'sslverify' => true,
	);

	if ( ! empty( $data ) ) {
		if ( in_array( $http, array( 'GET', 'DELETE' ), true ) ) {
			$url = add_query_arg( $data, $url );
		} else {
			$args['body'] = wp_json_encode( $data );
		}
	}

	// Perform request.
	$response = wp_remote_request( $url, $args );

	// MailChimp response.
	if ( ! is_wp_error( $response ) ) {
		$response = wp_remote_retrieve_body( $response );

		$response = json_decode( $response, true );
	} else {
		return esc_html__( 'This client has not been approved to access this resource. Please check your MailChimp API key.', 'theissue' );
	}

	return $response;
}
// Email Subscribe.
function thb_subscribe_mailchimp() {
	check_ajax_referer( 'thb_subscription', 'security' );
	// the email.
	$email   = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
	$privacy = filter_input( INPUT_POST, 'privacy', FILTER_VALIDATE_BOOLEAN );
	$checked = filter_input( INPUT_POST, 'checked', FILTER_VALIDATE_BOOLEAN );
	$list_id = ot_get_option( 'newsletter_mailchimp_list' );

	if ( $privacy && ! $checked ) {
		echo '<div class="woocommerce-error">' . esc_html__( 'Please accept the terms of our newsletter.', 'theissue' ) . '</div>';
		wp_die();
	}
	// if the email is valid.
	if ( is_email( $email ) ) {

		$args = array(
			'email_address' => $email,
			'status'        => 'subscribed',
		);

		if ( '' === $list_id ) {
			echo '<div class="woocommerce-error">' . esc_html__( 'Please select a MailChimp List from your Theme Options.', 'theissue' ) . '</div>';
			wp_die();
		}
		$result = thb_mailchimp_request( 'POST', "lists/$list_id/members", $args );

		if ( isset( $result['status'] ) && 'subscribed' === $result['status'] ) {

			echo '<div class="woocommerce-success">' . __( '<strong>Well done!</strong> Your address has been added.', 'theissue' ) . '</div>';

		} elseif ( isset( $result['title'] ) && 'Member Exists' === $result['title'] ) {

			echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> That email address is already subscribed!', 'theissue' ) . '</div>';

		} else {

			if ( isset( $result['status'] ) && isset( $result['detail'] ) && 400 <= $result['status'] ) {
				$result = $result['detail'];
			}
			echo '<div class="woocommerce-error">' . $result . '</div>';
		}
	} else {
		echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> Please enter a valid email address.', 'theissue' ) . '</div>';
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_subscribe_mailchimp', 'thb_subscribe_mailchimp' );
add_action( 'wp_ajax_thb_subscribe_mailchimp', 'thb_subscribe_mailchimp' );
