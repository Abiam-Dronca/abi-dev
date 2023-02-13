<?php

namespace Nelio_Popups\Frontend;

use \WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}//end if

function load_popup( $popup_id ) {
	$query = new WP_Query(
		array(
			'p'         => $popup_id,
			'post_type' => 'nelio_popup',
		)
	);
	if ( ! $query->have_posts() ) {
		wp_reset_postdata();
		return false;
	}//end if

	$query->the_post();
	$popup = array(
		'id'     => get_the_ID(),
		'url'    => get_the_permalink(),
		'name'   => get_the_title(),
		'config' => call_user_func_array(
			'array_merge',
			array_map(
				function( $meta ) use ( $popup_id ) {
					return \Nelio_Popups\Frontend\load_popup_meta( $popup_id, $meta );
				},
				\Nelio_Popups\Popups\get_popup_metas()
			)
		),
	);

	wp_reset_postdata();
	return $popup;
}//end load_popup()

function load_popup_meta( $popup_id, $key ) {
	$exists = metadata_exists( 'post', $popup_id, "_nelio_popups_{$key}" );
	$value  = get_post_meta( $popup_id, "_nelio_popups_{$key}", true );
	return $exists ? array( $key => $value ) : array();
}//end load_popup_meta()

function is_scroll_locked( $popup_id ) {
	$meta          = load_popup_meta( $popup_id, 'size' );
	$size          = empty( $meta['size'] ) ? false : $meta['size'];
	$custom_height = (
		is_array( $size ) &&
		isset( $size['height'] ) &&
		is_array( $size['height'] ) &&
		isset( $size['height']['type'] ) &&
		'custom-height' === $size['height']['type']
	);
	return $custom_height && empty( $size['height']['isContentScrollable'] );
}//end is_scroll_locked()
