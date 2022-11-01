<?php
function thb_get_postslider_templates( $template_list ) {
	$template_list['postslider_01'] = array(
		'name'      => esc_html__( 'Post Slider - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_slider/01.jpg',
		'cat'       => array( 'Post-Slider' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true"][vc_column][thb_postslider pagination="true" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postslider_02'] = array(
		'name'      => esc_html__( 'Post Slider - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_slider/02.jpg',
		'cat'       => array( 'Post-Slider' ),
		'sc'        => '[vc_row css=".vc_custom_1549909255882{padding-top: 30px !important;}"][vc_column][thb_postslider pagination="true" navigation="true" autoplay_speed="5000" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	return $template_list;
}
