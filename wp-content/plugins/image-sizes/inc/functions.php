<?php
if( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/**
 * Sanitize number input
 * 
 * @param mix $value the value
 * 
 * @uses sanitize_text_field()
 * 
 * @return int The sanitized value
 */
if( ! function_exists( 'image_sizes_sanitize_number' ) ) :
function image_sizes_sanitize_number( $value, $type = 'int' ){
	if ( $type == 'float' ) {
		return (float) sanitize_text_field( $value );
	}
	else{
		return (int) sanitize_text_field( $value );
	}
}
endif;