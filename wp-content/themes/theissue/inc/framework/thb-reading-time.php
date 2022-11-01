<?php
// You can call the function as you like.
if ( ! function_exists( 'mb_str_word_count' ) ) {
	function mb_str_word_count( $string, $format = 0, $charlist = '[]' ) {
		$string = trim( $string );
		if ( empty( $string ) ) {
			$words = array();
		} else {
			$words = preg_split( '~[^\p{L}\p{N}\']+~u', $string );
		}
		switch ( $format ) {
			case 0:
				return count( $words );
				break;
			case 1:
			case 2:
				return $words;
				break;
			default:
				return $words;
				break;
		}
	}
}
function thb_reading_time( $post_id ) {
	$post_id = isset( $post_id ) ? $post_id : get_the_ID();

	$the_content      = get_post_field( 'post_content', $post_id );
	$number_of_images = substr_count( strtolower( $the_content ), '<img ' );

	// Strip Shortcodes.
	$the_content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $the_content );

	// Strip Tags.
	$the_content = wp_strip_all_tags( $the_content );

	// Word Count.
	$word_count = mb_str_word_count( $the_content );

	// Images.
	$additional_words_for_images = thb_calculate_images( $number_of_images, 300 );
	$word_count                 += $additional_words_for_images;

	// Calculate Time.
	$reading_time = ceil( $word_count / 300 );

	if ( 1 > $reading_time ) {
		$reading_time = esc_html__( '< 1', 'theissue' );
	}

	// Append text.
	if ( $reading_time > 1 ) {
		$postfix = esc_html__( 'mins Read', 'theissue' );
	} else {
		$postfix = esc_html__( 'min Read', 'theissue' );
	}
	echo esc_html( $reading_time . ' ' . $postfix );
}
add_action( 'thb_reading_time', 'thb_reading_time', 10, 1 );

// Image Time Calculation.
function thb_calculate_images( $total_images ) {
	$additional_time = 0;
	// For the first image add 12 seconds, second image add 11, ..., for image 10+ add 3 seconds.
	for ( $i = 1; $i <= $total_images; $i++ ) {
		if ( $i >= 10 ) {
			$additional_time += 3 * (int) 300 / 60;
		} else {
			$additional_time += ( 12 - ( $i - 1 ) ) * (int) 300 / 60;
		}
	}

	return $additional_time;
}
