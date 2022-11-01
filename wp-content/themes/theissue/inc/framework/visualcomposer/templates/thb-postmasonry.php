<?php
function thb_get_postmasonry_templates( $template_list ) {
	$template_list['postmasonry_01'] = array(
		'name'      => esc_html__( 'Post Masonry - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_masonry/01.jpg',
		'cat'       => array( 'Post-Masonry' ),
		'sc'        => '[vc_row css=".vc_custom_1547133921692{padding-top: 2vh !important;padding-bottom: 6vh !important;}"][vc_column][thb_title title="LATEST"][thb_postmasonry columns="3" loadmore="true" source="size:6|post_type:post" offset="3"][/vc_column][/vc_row]',
	);
	$template_list['postmasonry_02'] = array(
		'name'      => esc_html__( 'Post Masonry - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_masonry/02.jpg',
		'cat'       => array( 'Post-Masonry' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style2" title="POPULAR NEWS"][/vc_column][/vc_row][vc_row][vc_column][thb_postmasonry style="style2" columns="3" loadmore="true" source="size:6|post_type:post" offset="2"][vc_empty_space mobile_height="20px" height="40px"][/vc_column][/vc_row]',
	);
	return $template_list;
}
