<?php
function thb_get_postbackground_templates( $template_list ) {
	$template_list['postbackground_01'] = array(
		'name'      => esc_html__( 'Post Background - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_background/01.jpg',
		'cat'       => array( 'Post-Background' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true"][vc_column][thb_postbackground style="style2" source="size:4|post_type:post|categories:55"][/vc_column][/vc_row]',
	);
	$template_list['postbackground_02'] = array(
		'name'      => esc_html__( 'Post Background - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_background/02.jpg',
		'cat'       => array( 'Post-Background' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true"][vc_column][thb_postbackground style="style3" columns="4" source="size:4|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postbackground_03'] = array(
		'name'      => esc_html__( 'Post Background - 03', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_background/03.jpg',
		'cat'       => array( 'Post-Background' ),
		'sc'        => '[vc_row css=".vc_custom_1587740024036{padding-top: 30px !important;}"][vc_column][thb_postbackground style="style4" source="size:4|post_type:post|categories:67"][/vc_column][/vc_row]',
	);
	return $template_list;
}
