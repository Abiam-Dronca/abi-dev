<?php
function thb_get_postcarousel_templates( $template_list ) {
	$template_list['postcarousel_01'] = array(
		'name'      => esc_html__( 'Post Carousel - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/01.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row css=".vc_custom_1547142968882{padding-top: 2vh !important;padding-bottom: 8vh !important;}"][vc_column][thb_title title="BEAUTY"][thb_categorylinks cat="30,31,33"][vc_empty_space height="30px"][thb_postcarousel columns="4" pagination="true" navigation="true" source="size:6|post_type:post|categories:29"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_02'] = array(
		'name'      => esc_html__( 'Post Carousel - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/02.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row css=".vc_custom_1546883188626{padding-top: 8vh !important;padding-bottom: 8vh !important;}"][vc_column][thb_title title="FASHION"][thb_categorylinks cat="68,66,67"][vc_empty_space height="30px"][thb_postcarousel excerpts="true" navigation="true" carousel_button="true" autoplay="" source="size:6|post_type:post|categories:6" link="url:https%3A%2F%2Ftheissue.fuelthemes.net%2Fcategory%2Ffashion%2F|title:View%20All%20Fashion||"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_03'] = array(
		'name'      => esc_html__( 'Post Carousel - 03', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/03.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1550058259111{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #fbf0eb !important;}"][vc_column][vc_empty_space height="40px"][vc_column_text]<h5 style="text-align: center;">MOST POPULAR</h5>[/vc_column_text][vc_row_inner][vc_column_inner][thb_postcarousel style="style4" infinite="true" source="size:6|post_type:post" offset="9"][/vc_column_inner][/vc_row_inner][vc_empty_space height="10px"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_04'] = array(
		'name'      => esc_html__( 'Post Carousel - 04', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/04.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row thb_full_width="true" css=".vc_custom_1548848706404{padding-top: 50px !important;padding-bottom: 45px !important;background-color: #f0f0f0 !important;}"][vc_column][thb_postcarousel style="style2" navigation="true" infinite="true" source="size:6|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_05'] = array(
		'name'      => esc_html__( 'Post Carousel - 05', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/05.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true"][vc_column][thb_postcarousel style="style5" navigation="true" infinite="true" source="size:6|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_06'] = array(
		'name'      => esc_html__( 'Post Carousel - 06', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/06.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row css=".vc_custom_1551698680766{padding-top: 8vh !important;padding-bottom: 8vh !important;}"][vc_column][vc_column_text]<h5 style="text-align: center;"><span style="font-size: 18px; font-weight: bold; letter-spacing: 0.05em;">LIFESTYLE</span></h5>[/vc_column_text][thb_postcarousel columns="4" navigation="true" carousel_button="true" infinite="" autoplay="" source="size:5|post_type:post" link="url:%23|title:MORE%20NEWS||" offset="16"][/vc_column][/vc_row]',
	);
	$template_list['postcarousel_07'] = array(
		'name'      => esc_html__( 'Post Carousel - 07', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_carousel/07.jpg',
		'cat'       => array( 'Post-Carousel' ),
		'sc'        => '[vc_row thb_full_width="true" css=".vc_custom_1556526429962{padding-right: 8vw !important;padding-bottom: 20px !important;padding-left: 8vw !important;}"][vc_column][thb_postcarousel style="style6" navigation="true" infinite="" source="size:6|post_type:post"][/vc_column][/vc_row]',
	);
	return $template_list;
}
