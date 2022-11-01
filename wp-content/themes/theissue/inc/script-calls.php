<?php
// De-register Contact Form 7 styles.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// Main Styles.
function thb_main_styles() {
	global $post;
	$i                       = 0;
	$self_hosted_fonts       = ot_get_option( 'self_hosted_fonts' );
	$thb_theme_directory_uri = Thb_Theme_Admin::$thb_theme_directory_uri;
	$thb_theme_version       = Thb_Theme_Admin::$thb_theme_version;
	$inline_dep              = 'thb-app';
	// Enqueue.
	wp_enqueue_style( 'thb-app', esc_url( get_theme_file_uri( 'assets/css/app.css' ) ), null, esc_attr( $thb_theme_version ) );

	if ( is_single() ) {
		wp_enqueue_style( 'thb-post-detail', esc_url( get_theme_file_uri( 'assets/css/app-post-detail.css' ) ), array( 'thb-app' ), esc_attr( $thb_theme_version ) );
		$inline_dep = 'thb-post-detail';
	}
	if ( thb_wc_supported() ) {
		wp_enqueue_style( 'thb-woocommerce', esc_url( get_theme_file_uri( 'assets/css/app-woocommerce.css' ) ), array( 'thb-app' ), esc_attr( $thb_theme_version ) );
	}
	wp_dequeue_style( 'vc_lte_ie9' );
	wp_deregister_style( 'vc_lte_ie9' );

	if ( ! defined( 'THB_DEMO_SITE' ) ) {
		wp_enqueue_style( 'thb-style', get_stylesheet_uri(), null, esc_attr( $thb_theme_version ) );
	}
	wp_enqueue_style( 'thb-google-fonts', thb_google_webfont(), null, esc_attr( $thb_theme_version ) );
	wp_add_inline_style( $inline_dep, thb_selection() );

	if ( $self_hosted_fonts ) {
		foreach ( $self_hosted_fonts as $font ) {
			$i++;
			wp_enqueue_style( 'thb-self-hosted-' . $i, $font['font_url'], null, esc_attr( $thb_theme_version ) );
		}
	}

	if ( $post ) {
		if ( has_shortcode( $post->post_content, 'contact-form-7' ) && function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}
	// Typekit.
	$typekit_id = ot_get_option( 'typekit_id' );
	if ( $typekit_id ) {
		wp_enqueue_style( 'thb-typekit', 'https://use.typekit.net/' . $typekit_id . '.css', null, esc_attr( $thb_theme_version ), false );
	}
	// Dark Mode.
	$general_darkmode = ot_get_option( 'thb_dark_mode', 'off' );
	$has_dark_mode    = false;

	$subheader_sections = array_merge( ot_get_option( 'subheader_left_sections', array() ), ot_get_option( 'subheader_right_sections', array() ) );

	foreach ( $subheader_sections as $section ) {
		if ( array_search( 'dark_mode_toggle', $section, true ) ) {
			$has_dark_mode = true;
		}
	}
	if ( 'on' === $general_darkmode || $has_dark_mode || 'on' === ot_get_option( 'header_dark_mode_toggle', 'off' ) ) {
		wp_enqueue_style( 'thb-darkmode', esc_url( get_theme_file_uri( 'assets/css/dark_mode.css' ) ), array( 'thb-app' ), esc_attr( $thb_theme_version ), false );
	}
	// Remove Dynamic front-end CSS.
	remove_action( 'wp_enqueue_scripts', 'ot_load_dynamic_css', 999 );
}
add_action( 'wp_enqueue_scripts', 'thb_main_styles' );

// Remove default WPBakery styles.
function thb_remove_wpbakery_styles() {
	if ( 'on' === ot_get_option( 'thb_remove_wpbakery_styles', 'off' ) && ! thb_is_vc_frontend() ) {
		wp_dequeue_style( 'js_composer_front' );
		wp_deregister_style( 'js_composer_front' );
		wp_dequeue_script( 'js_composer_front' );
		wp_deregister_script( 'js_composer_front' );
		wp_dequeue_script( 'wpb_composer_front_js' );
	}
}
add_action( 'wp_enqueue_scripts', 'thb_remove_wpbakery_styles', 10001 );

// Main Scripts.
function thb_register_js() {
	if ( ! is_admin() ) {
		global $post;
		$thb_combined_libraries  = ot_get_option( 'thb_combined_libraries', 'on' );
		$thb_api_key             = ot_get_option( 'map_api_key' );
		$thb_dependency          = array( 'jquery', 'underscore' );
		$thb_theme_directory_uri = Thb_Theme_Admin::$thb_theme_directory_uri;
		$thb_theme_version       = Thb_Theme_Admin::$thb_theme_version;

		// Register.
		if ( 'on' === $thb_combined_libraries ) {
			wp_enqueue_script( 'thb-vendor', esc_url( get_theme_file_uri( 'assets/js/vendor.min.js' ) ), array( 'jquery' ), esc_attr( $thb_theme_version ), true );
			$thb_dependency[] = 'thb-vendor';
		} else {
			$thb_js_libraries = array(
				'GSAP'                 => '_0gsap.min.js',
				'GSAP-DrawSVGPlugin'   => '_1DrawSVGPlugin.min.js',
				'GSAP-SplitText'       => '_2SplitText.min.js',
				'GSAP-ScrollToPlugin'  => '_3ScrollToPlugin.min.js',
				'imagesloaded'         => '_6imagesloaded.pkgd.min.js',
				'animsition'           => 'animsition.js',
				'bezier-easing'        => 'bezier-easing.js',
				'headroom'             => 'headroom.min.js',
				'isInViewport'         => 'isInViewport.min.js',
				'isotope'              => 'iso0-isotope.pkgd.min.js',
				'isotope-packery-mode' => 'iso1-packery-mode.pkgd.js',
				'jarallax'             => 'jarallax-0.min.js',
				'jarallax-video'       => 'jarallax-video.min.js',
				'jquery-autocomplete'  => 'jquery.autocomplete.js',
				'jquery-headroom'      => 'jquery.headroom.js',
				'jquery-hotspot'       => 'jquery.hotspot.js',
				'jquery-hoverIntent'   => 'jquery.hoverIntent.js',
				'magnific-popup'       => 'jquery.magnific-popup.min.js',
				'video'                => 'jquery.vide.js',
				'js-cookie'            => 'js.cookie.js',
				'lazysizes'            => 'lazysizes.min.js',
				'mobile-detect'        => 'mobile-detect.min.js',
				'odometer'             => 'odometer.min.js',
				'perfect-scrollbar'    => 'perfect-scrollbar.min.js',
				'slick'                => 'slick.min.js',
				'typed'                => 'typed.min.js',
			);
			foreach ( $thb_js_libraries as $handle => $value ) {
				wp_enqueue_script( $handle, esc_url( $thb_theme_directory_uri ) . 'assets/js/vendor/' . esc_attr( $value ), array( 'jquery' ), esc_attr( $thb_theme_version ), true );
			}
		}
		if ( 'on' === ot_get_option( 'thb_custom_video_player', 'on' ) ) {
			wp_enqueue_script( 'plyr', 'https://cdn.plyr.io/3.6.2/plyr.polyfilled.js', array( 'jquery' ), esc_attr( $thb_theme_version ), true );
		}
		wp_register_script( 'flickity', esc_url( $thb_theme_directory_uri ) . 'assets/js/vendor/flickity.pkgd.min.js', array( 'jquery' ), esc_attr( $thb_theme_version ), true );
		wp_enqueue_script( 'underscore' );
		wp_enqueue_script( 'thb-app', esc_url( get_theme_file_uri( 'assets/js/app.min.js' ) ), $thb_dependency, esc_attr( $thb_theme_version ), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( $post ) {
			if (
				has_shortcode( $post->post_content, 'thb_map_parent' ) ||
				has_shortcode( $post->post_content, 'thb_location_parent' )
			) {
				wp_enqueue_script( 'gmapdep', 'https://maps.google.com/maps/api/js?key=' . esc_attr( $thb_api_key ), null, esc_attr( $thb_theme_version ), false );
			}

			if ( has_shortcode( $post->post_content, 'contact-form-7' ) && function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		}

		wp_localize_script(
			'thb-app',
			'themeajax',
			array(
				'url'      => admin_url( 'admin-ajax.php' ),
				'l10n'     => array(
					'of'               => esc_html__( '%curr% of %total%', 'theissue' ),
					'just_of'          => esc_html__( 'of', 'theissue' ),
					'loading'          => esc_html__( 'Loading', 'theissue' ),
					'lightbox_loading' => esc_html__( 'Loading...', 'theissue' ),
					'nomore'           => esc_html__( 'No More Posts', 'theissue' ),
					'nomore_products'  => esc_html__( 'All Products Loaded', 'theissue' ),
					'loadmore'         => esc_html__( 'Load More', 'theissue' ),
					'added'            => esc_html__( 'Added To Cart', 'theissue' ),
					'no_results'       => esc_html__( 'No Results Found', 'theissue' ),
					'results_found'    => esc_html__( 'Results Found', 'theissue' ),
					'results_all'      => esc_html__( 'View All Results', 'theissue' ),
					'copied'           => esc_html__( 'Copied', 'theissue' ),
					'prev'             => esc_html__( 'Prev', 'theissue' ),
					'next'             => esc_html__( 'Next', 'theissue' ),
					'pinit'            => esc_html__( 'PIN IT', 'theissue' ),
					'adding_to_cart'   => esc_html__( 'Adding to Cart', 'theissue' ),
				),
				'svg'      => array(
					'prev_arrow'  => thb_load_template_part( 'assets/img/svg/prev_arrow.svg' ),
					'next_arrow'  => thb_load_template_part( 'assets/img/svg/next_arrow.svg' ),
					'added_arrow' => thb_load_template_part( 'assets/img/svg/arrows_check.svg' ),
					'close_arrow' => thb_load_template_part( 'assets/svg/arrows_remove.svg' ),
					'pagination'  => thb_load_template_part( 'assets/img/svg/pagination.svg' ),
					'preloader'   => thb_load_template_part( 'assets/img/svg/preloader-material.svg' ),
				),
				'settings' => array(
					'infinite_count'                  => ot_get_option( 'infinite_count' ),
					'site_url'                        => get_home_url(),
					'current_url'                     => get_permalink(),
					'fixed_header_scroll'             => ot_get_option( 'fixed_header_scroll', 'on' ),
					'fixed_header_padding'            => ot_get_option( 'header_padding_fixed' ),
					'general_search_ajax'             => ot_get_option( 'general_search_ajax', 'on' ),
					'newsletter'                      => ot_get_option( 'newsletter', 'on' ),
					'newsletter_length'               => ot_get_option( 'newsletter-interval', '1' ),
					'newsletter_delay'                => ot_get_option( 'newsletter_delay', '0' ),
					'newsletter_mailchimp'            => ot_get_option( 'newsletter_mailchimp_api' ) !== '',
					'page_transition'                 => ot_get_option( 'page_transition', 'on' ),
					'page_transition_style'           => ot_get_option( 'page_transition_style', 'thb-fade' ),
					'page_transition_in_speed'        => ot_get_option( 'page_transition_in_speed', 1000 ),
					'page_transition_out_speed'       => ot_get_option( 'page_transition_out_speed', 500 ),
					'shop_product_listing_pagination' => ot_get_option( 'shop_product_listing_pagination', 'style1' ),
					'right_click'                     => ot_get_option( 'right_click', 'on' ),
					'cart_url'                        => thb_wc_supported() ? wc_get_cart_url() : false,
					'is_cart'                         => thb_wc_supported() ? is_cart() : false,
					'is_checkout'                     => thb_wc_supported() ? is_checkout() : false,
					'touch_threshold'                 => apply_filters( 'theissue_touchthreshold', 5 ),
					'mobile_menu_animation_speed'     => ot_get_option( 'mobile_menu_animation_speed', 0.3 ),
					'thb_custom_video_player'         => ot_get_option( 'thb_custom_video_player', 'on' ),
					'viai_publisher_id'               => ot_get_option( 'viai_publisher_id', '' ),
				),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'thb_register_js' );

// WooCommerce.
function thb_woocommerce_scripts_styles() {

	if ( ! is_admin() ) {
		if ( thb_wc_supported() ) {
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_deregister_style( 'woocommerce_prettyPhoto_css' );

			wp_dequeue_style( 'yith-wcwl-font-awesome' );
			wp_deregister_style( 'yith-wcwl-font-awesome' );

			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );

			wp_dequeue_style( 'jquery-selectBox' );
			wp_dequeue_script( 'jquery-selectBox' );

			wp_dequeue_script( 'vc_woocommerce-add-to-cart-js' );
			if ( ! is_checkout() ) {
				wp_dequeue_script( 'jquery-selectBox' );
				wp_dequeue_style( 'selectWoo' );
				wp_dequeue_script( 'selectWoo' );
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'thb_woocommerce_scripts_styles', 98 );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
