<?php

namespace Nelio_Popups\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}//end if

function enqueue_popups() {

	if ( is_non_popup_preview() && ! show_popup_in_preview() ) {
		return;
	}//end if

	if ( is_singular( 'nelio_popup' ) ) {
		return;
	}//end if

	wp_enqueue_style(
		'nelio-popups-parent',
		nelio_popups_url() . '/dist/nelio-popups-parent.css',
		array( 'dashicons' ),
		nelio_popups_get_script_version( 'parent' )
	);

	wp_add_inline_style(
		'nelio-popups-parent',
		get_style_vars()
	);

	nelio_popups_enqueue_script( 'parent' );
	wp_add_inline_script(
		'nelio-popups-parent',
		sprintf(
			'NelioPopupsFrontendSettings = %s;',
			wp_json_encode( get_frontend_settings() )
		),
		'before'
	);

}//end enqueue_popups()
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_popups' );


// =======
// HELPERS
// =======
// phpcs:ignore
function get_frontend_settings() {
	$settings = array(
		'context' => get_wordpress_context(),
		'popups'  => get_active_popups(),
	);

	/**
	 * Filters the frontend settings.
	 *
	 * @param array $settings frontend settings.
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'nelio_popups_frontend_settings', $settings );
}//end get_frontend_settings()

function get_wordpress_context() {
	return array(
		'isSingular'   => is_singular(),
		'postId'       => is_singular() ? get_the_ID() : 0,
		'postPopups'   => is_singular() ? get_post_popups( get_the_ID() ) : 'auto',
		'postType'     => get_post_type(),
		'parents'      => is_singular() ? get_post_ancestors( get_the_ID() ) : array(),
		'previewPopup' => get_previewed_popup(),
		'specialPage'  => get_special_page(),
		'template'     => is_singular() ? get_page_template_slug( get_the_ID() ) : '',
	);
}//end get_wordpress_context()

function get_active_popups() {
	global $wpdb;
	$key    = 'nelio_popups_active_popups';
	$popups = wp_cache_get( $key );
	if ( false === $popups ) {
		$popups = $wpdb->get_col( // phpcs:ignore
			"SELECT p.ID
			 FROM $wpdb->posts p, $wpdb->postmeta pm
			 WHERE p.post_type = 'nelio_popup' AND
						 p.post_status = 'publish' AND
						 p.ID = pm.post_id AND
						 pm.meta_key = '_nelio_popups_is_enabled'"
		);

		$popups = array_map( 'absint', $popups );
		$popups = array_filter( $popups );
		$popups = array_values( $popups );

		wp_cache_set( $key, $popups, '', HOUR_IN_SECONDS );
	}//end if

	/**
	 * Filters the list of active popups.
	 *
	 * @param int[] $popups list of active popup ids.
	 *
	 * @since 1.0.0
	 */
	$popups = apply_filters( 'nelio_popups_active_popups', $popups );

	return array_map(
		__NAMESPACE__ . '\load_popup',
		$popups
	);
}//end get_active_popups()

function get_post_popups( $post_id ) {
	$popups = get_post_meta( $post_id, '_nelio_popups_active_popup', true );
	$popups = empty( $popups ) ? 'auto' : $popups;
	if ( 'auto' === $popups ) {
		return 'auto';
	}//end if

	$popups = explode( ',', $popups );
	$popups = array_map( 'absint', $popups );
	$popups = array_values( array_filter( $popups ) );
	return $popups;
}//end get_post_popups()

function get_style_vars() {
	global $content_width;
	$default = array(
		'animate-delay'    => '1s',
		'animate-duration' => '1s',
	);

	/**
	 * Filters frontend style vars.
	 *
	 * @param array $default frontend style vars.
	 *
	 * @since 1.0.0
	 */
	$values = apply_filters( 'nelio_popups_frontend_style_vars', $default );
	$values = wp_parse_args( $values, $default );

	$vars = '';
	foreach ( $values as $name => $value ) {
		$vars .= "--nelio-popups-{$name}: $value;\n";
	}//end foreach
	return ":root {\n{$vars}}";
}//end get_style_vars()

function show_popup_in_preview() {
	/** * Filters if popups should be included in previews or not.
	 *
	 * @param boolean $show_in_preview whether popups should be visibles in previews or not. Default: `false`.
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'nelio_popups_show_in_preview', false );
}//end show_popup_in_preview()

function is_non_popup_preview() {
	$popup = get_previewed_popup();
	return is_preview() && empty( $popup );
}//end is_non_popup_preview()

function get_previewed_popup() {
	$popup_id = isset( $_GET['nelio-popup-preview'] )
		? absint( $_GET['nelio-popup-preview'] )
		: 0;

	$valid = isset( $_GET['nonce'] )
		? wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['nonce'] ) ), 'nelio-popup-preview_' . $popup_id )
		: false;

	return $valid ? load_popup( $popup_id ) : false;
}//end get_previewed_popup()

function get_special_page() {
	if ( is_404() ) {
		return '404-page';
	} elseif ( is_home() ) {
		return 'blog-page';
	} elseif ( is_front_page() ) {
		return 'home-page';
	} elseif ( is_search() ) {
		return 'search-result-page';
	} else {
		return 'none';
	}//end if
}//end get_special_page()
