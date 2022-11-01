<?php

/** Author Search. */
function thb_json_search_authors() {
	check_ajax_referer( 'thb_json_search_ajax', 'security' );
	$term = filter_input( INPUT_GET, 'term', FILTER_SANITIZE_STRING );
	if ( empty( $term ) ) {
		wp_die();
	}
	$args = array(
		'count_total'    => false,
		'search'         => sprintf( '*%s*', $term ),
		'search_columns' => array(
			'ID',
			'display_name',
			'user_email',
			'user_login',
		),
		'fields'         => 'all_with_meta',
	);

	$search_query = get_users( $args );
	$found_users  = array();
	foreach ( $search_query as $author ) {
		$found_users[ $author->data->ID ] = $author->data->display_name;
	}
	wp_send_json( $found_users );
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_json_search_authors', 'thb_json_search_authors' );
add_action( 'wp_ajax_thb_json_search_authors', 'thb_json_search_authors' );

/** Post Search. */
function thb_json_search_posts() {
	check_ajax_referer( 'thb_json_search_ajax', 'security' );
	$term = filter_input( INPUT_GET, 'term', FILTER_SANITIZE_STRING );
	if ( empty( $term ) ) {
		wp_die();
	}
	$args = array(
		'posts_per_page'      => 10,
		'ignore_sticky_posts' => true,
		'post_type'           => 'post',
		's'                   => $term,
		'no_found_rows'       => true,
		'orderby'             => 'relevance',
	);

	$search_query = new WP_Query( $args );
	$posts        = array();

	if ( $search_query->have_posts() ) :
		while ( $search_query->have_posts() ) :
			$search_query->the_post();
			$id           = get_the_ID();
			$title        = get_the_title();
			$posts[ $id ] = $title;
		endwhile;
	endif;
	wp_send_json( $posts );
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_json_search_posts', 'thb_json_search_posts' );
add_action( 'wp_ajax_thb_json_search_posts', 'thb_json_search_posts' );

// Dark Mode Ajax.
function thb_dark_mode_ajax() {
	$dark_mode_on = filter_input( INPUT_POST, 'dark_mode_on', FILTER_VALIDATE_BOOLEAN );

	if ( $dark_mode_on ) {
		update_option( 'thb_dark_mode', true );
	} else {
		update_option( 'thb_dark_mode', false );
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_dark_mode', 'thb_dark_mode_ajax' );
add_action( 'wp_ajax_thb_dark_mode', 'thb_dark_mode_ajax' );

/** Infinite Scroll. */
function thb_infinite_ajax() {

	check_ajax_referer( 'thb_infinite_ajax', 'security' );
	global $post;
	$id                     = filter_input( INPUT_POST, 'post_id', FILTER_VALIDATE_INT );
	$post                   = get_post( $id );
	$infinite_load_category = 'on' === ot_get_option( 'infinite_load_category', 'off' ) ? true : false;
	$previous_post          = get_previous_post( $infinite_load_category );

	if ( $id && $previous_post ) {

		$args = array(
			'p'              => $previous_post->ID,
			'no_found_rows'  => true,
			'posts_per_page' => 1,
			'post_status'    => 'publish',
		);

		$infinite_query = new WP_Query( $args );

		do_action( 'thb_vc_ajax' );

		add_filter( 'wp_get_attachment_image_attributes', 'thb_lazy_low_quality', 10, 3 );
		if ( $infinite_query->have_posts() ) :
			while ( $infinite_query->have_posts() ) :
				$infinite_query->the_post();
				global $more;
				$more  = -1;
				$style = thb_get_article_style( $previous_post->ID );
				get_template_part( 'inc/templates/post-detail-styles/' . $style );
			endwhile;
		endif;
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_infinite_ajax', 'thb_infinite_ajax' );
add_action( 'wp_ajax_thb_infinite_ajax', 'thb_infinite_ajax' );

/** Ajax Search. */
function thb_ajax_search() {
	check_ajax_referer( 'thb_autocomplete_ajax', 'security' );
	$search_keyword = filter_input( INPUT_GET, 'query', FILTER_SANITIZE_STRING );
	$time_start     = microtime();
	$suggestions    = array();

	$args = array(
		's'                   => $search_keyword,
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 6,
		'orderby'             => 'relevance',
	);

	$posts = get_posts( $args );

	if ( ! empty( $posts ) ) {
		foreach ( $posts as $post ) {

			$suggestions[] = array(
				'id'        => $post->ID,
				'value'     => get_the_title( $post ),
				'url'       => get_the_permalink( $post ),
				'thumbnail' => get_the_post_thumbnail( $post ),
			);
		}
	} else {
		$suggestions = false;
	}

	$time_end    = microtime();
	$time        = $time_end - $time_start;
	$suggestions = array(
		'suggestions' => $suggestions,
		'time'        => $time,
	);
	echo wp_json_encode( $suggestions );
	wp_die();
}

add_action( 'wp_ajax_nopriv_thb_ajax_search', 'thb_ajax_search' );
add_action( 'wp_ajax_thb_ajax_search', 'thb_ajax_search' );

/** Video playlist. */
function thb_ajax_parse_embed() {
	check_ajax_referer( 'thb_ajax_parse_embed', 'security' );
	$thb_id   = filter_input( INPUT_POST, 'post_ID', FILTER_VALIDATE_INT );
	$thb_post = get_post( $thb_id );
	if ( ! $thb_post ) {
		wp_send_json_error();
	}
	$embed_url = get_post_meta( $thb_id, 'post_video', true );

	$wp_embed = wp_oembed_get( $embed_url );
	if ( ! $wp_embed ) {
		$wp_embed = wp_video_shortcode(
			array(
				'src' => $embed_url,
			)
		);
	}
	$parsed = '<div class="flex-video widescreen">' . $wp_embed . '</div>';
	wp_send_json_success(
		array(
			'body' => $parsed,
		)
	);
}
add_action( 'wp_ajax_thb-parse-embed', 'thb_ajax_parse_embed', 1 );
add_action( 'wp_ajax_nopriv_thb-parse-embed', 'thb_ajax_parse_embed', 1 );

/** Email Subscribe. */
function thb_subscribe_emails() {
	check_ajax_referer( 'thb_subscription', 'security' );
	// the email.
	$email   = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
	$privacy = filter_input( INPUT_POST, 'privacy', FILTER_VALIDATE_BOOLEAN );
	$checked = filter_input( INPUT_POST, 'checked', FILTER_VALIDATE_BOOLEAN );

	if ( $privacy && ! $checked ) {
		echo '<div class="woocommerce-error">' . __( 'Please accept the terms of our newsletter.', 'theissue' ) . '</div>';
		wp_die();
	}
	// if the email is valid.
	if ( is_email( $email ) ) {

		// get all the current emails.
		$stack = get_option( 'subscribed_emails' );

		// if there are no emails in the database.
		if ( ! $stack ) {
			// update the option with the first email as an array.
			update_option( 'subscribed_emails', array( $email ) );
		} else {
			// if the email already exists in the array.
			if ( in_array( $email, $stack ) ) {
				echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> That email address is already subscribed!', 'theissue' ) . '</div>';
			} else {

				// If there is more than one email, add the new email to the array.
				array_push( $stack, $email );

				// update the option with the new set of emails.
				update_option( 'subscribed_emails', $stack );

				echo '<div class="woocommerce-success">' . __( '<strong>Well done!</strong> Your address has been added.', 'theissue' ) . '</div>';
			}
		}
	} else {
		echo '<div class="woocommerce-error">' . __( '<strong>Oh snap!</strong> Please enter a valid email address.', 'theissue' ) . '</div>';
	}
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_subscribe_emails', 'thb_subscribe_emails' );
add_action( 'wp_ajax_thb_subscribe_emails', 'thb_subscribe_emails' );

/** Post Grid Ajax. */
function thb_posts() {
	check_ajax_referer( 'thb_posts_ajax', 'security' );
	$style          = filter_input( INPUT_POST, 'style', FILTER_SANITIZE_STRING );
	$loop           = filter_input( INPUT_POST, 'loop', FILTER_SANITIZE_STRING );
	$page           = filter_input( INPUT_POST, 'page', FILTER_SANITIZE_STRING );
	$columns        = filter_input( INPUT_POST, 'columns', FILTER_SANITIZE_STRING );
	$excerpts       = filter_input( INPUT_POST, 'excerpts', FILTER_SANITIZE_STRING );
	$i              = filter_input( INPUT_POST, 'thb_i', FILTER_VALIDATE_INT );
	$featured_index = filter_input( INPUT_POST, 'featured_index', FILTER_SANITIZE_STRING );

	$source_data          = VcLoopSettings::parseData( $loop );
	$source_data['paged'] = $page;
	$query_builder        = new ThbLoopQueryBuilder( $source_data );
	$posts                = $query_builder->build();
	$ajax_posts           = $posts[1];

	ob_start();
	add_filter( 'wp_get_attachment_image_attributes', 'thb_lazy_low_quality', 10, 3 );

	if ( in_array( $style, array( 'style2', 'style19' ), true ) ) {
		$i = 1;
	}
	if ( $ajax_posts->have_posts() ) :
		while ( $ajax_posts->have_posts() ) :
			$ajax_posts->the_post();
			thb_DisplayPostGrid( $style, $columns, $excerpts, $featured_index, $i );
			$i++;
	endwhile;
	endif;
	$out = ob_get_contents();
	if ( $out ) {
		ob_end_clean();
	}

	echo '' . $out;
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_posts', 'thb_posts' );
add_action( 'wp_ajax_thb_posts', 'thb_posts' );

/** Post Masonry Ajax */
function thb_masonry_posts() {
	check_ajax_referer( 'thb_masonry_ajax', 'security' );
	$style   = filter_input( INPUT_POST, 'style', FILTER_SANITIZE_STRING );
	$loop    = filter_input( INPUT_POST, 'loop', FILTER_SANITIZE_STRING );
	$page    = filter_input( INPUT_POST, 'page', FILTER_SANITIZE_STRING );
	$columns = filter_input( INPUT_POST, 'columns', FILTER_SANITIZE_STRING );

	$source_data          = VcLoopSettings::parseData( $loop );
	$source_data['paged'] = $page;
	$source_data          = thb_move_key_before( $source_data, 'offset', 'paged' );
	$query_builder        = new ThbLoopQueryBuilder( $source_data );
	$masonry_posts        = $query_builder->build();
	$masonry_posts        = $masonry_posts[1];

	$col = thb_translate_columns( $columns );
	ob_start();
	add_filter( 'wp_get_attachment_image_attributes', 'thb_lazy_low_quality', 10, 3 );
	if ( $masonry_posts->have_posts() ) :
		while ( $masonry_posts->have_posts() ) :
			$masonry_posts->the_post();
			?><div class="small-12 <?php echo esc_attr( $col ); ?> columns"><?php get_template_part( 'inc/templates/post-styles/masonry/masonry-' . $style ); ?></div><?php /* phpcs:ignore */
		endwhile;
	endif;
	$out = ob_get_clean();
	echo '' . $out;
	wp_die();
}
add_action( 'wp_ajax_nopriv_thb_masonry_posts', 'thb_masonry_posts' );
add_action( 'wp_ajax_thb_masonry_posts', 'thb_masonry_posts' );

/** Thb Newsletter Popup. */
function thb_newsletter() {

	if ( ! class_exists( 'TheIssue_plugin' ) ) {
		return; }

	$newsletter                = ot_get_option( 'newsletter', 'on' );
	$header_left_content       = ot_get_option( 'header_left_content', '' );
	$header_right_content      = ot_get_option( 'header_right_content', '' );
	$newsletter_lightbox_color = ot_get_option( 'newsletter_lightbox_color', 'light' );

	if ( 'on' !== $newsletter && 'subscribe' !== ( $header_left_content && $header_right_content ) ) {
		return; }

	if ( ! is_admin() ) {
			$newsletter_image = ot_get_option( 'newsletter_image' );
		?>
		<aside id="newsletter-popup" class="mfp-hide theme-popup newsletter-popup <?php echo esc_attr( $newsletter_lightbox_color ); ?>">
			<?php if ( $newsletter_image ) { ?>
				<figure class="newsletter-image"><?php echo wp_get_attachment_image( $newsletter_image, 'theissue-square-x2' ); ?></figure>
			<?php } ?>
			<div class="newsletter-content">
				<?php get_template_part( 'inc/templates/post-detail-bits/subscribe' ); ?>
			</div>
		</aside>
		<?php
	}
}
add_action( 'wp_footer', 'thb_newsletter' );

add_action( 'wp_ajax_ajax_action', 'thb_newsletter' );
add_action( 'wp_ajax_nopriv_ajax_action', 'thb_newsletter' );
