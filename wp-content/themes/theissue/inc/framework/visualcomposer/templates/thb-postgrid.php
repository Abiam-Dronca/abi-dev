<?php
function thb_get_postgrid_templates( $template_list ) {
	$template_list['postgrid_01'] = array(
		'name'      => esc_html__( 'Post Grid - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/01.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="0px" height="30px"][thb_postgrid source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_02'] = array(
		'name'      => esc_html__( 'Post Grid - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/02.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1546883194736{padding-top: 8vh !important;padding-bottom: 6vh !important;}"][vc_column][thb_title title="MOST POPULAR"][vc_empty_space height="30px"][thb_postgrid style="style6" source="size:6|post_type:post"][/vc_column][/vc_row][vc_row]',
	);
	$template_list['postgrid_03'] = array(
		'name'      => esc_html__( 'Post Grid - 03', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/03.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_postgrid style="style9" columns="2" source="size:2|post_type:post"][vc_empty_space mobile_height="30px" height="60px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_04'] = array(
		'name'      => esc_html__( 'Post Grid - 04', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/04.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1548431815636{padding-top: 70px !important;padding-bottom: 70px !important;background-color: #ddfff5 !important;}"][vc_column][vc_row_inner css=".vc_custom_1548691726975{padding-top: 40px !important;}"][vc_column_inner][vc_column_text]<h5 style="text-align: center;">Featured Stories</h5>[/vc_column_text][vc_empty_space height="20px"][/vc_column_inner][/vc_row_inner][vc_row_inner content_placement="middle"][vc_column_inner width="2/3"][thb_postgrid style="style9" columns="1" source="size:1|post_type:post" offset="5"][/vc_column_inner][vc_column_inner el_class="smaller_image" width="1/3" css=".vc_custom_1548666679899{padding-top: 5% !important;padding-right: 5% !important;padding-bottom: 5% !important;padding-left: 5% !important;}"][vc_empty_space height="20px"][thb_postgrid style="style1-left" columns="1" source="size:1|post_type:post" offset="7"][vc_empty_space height="20px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postgrid_05'] = array(
		'name'      => esc_html__( 'Post Grid - 05', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/05.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="40px" height="80px"][thb_title style="style2" title="CREATIVITY" link="url:%23|title:View%20All||"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_06'] = array(
		'name'      => esc_html__( 'Post Grid - 06', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/06.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style2" title="LATEST"][thb_postgrid style="style2" pagination="style2" source="size:6|post_type:post" featured_index="3,6" offset="8"][vc_empty_space mobile_height="40px" height="80px"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][vc_empty_space mobile_height="40px" height="80px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_07'] = array(
		'name'      => esc_html__( 'Post Grid - 07', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/07.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1550139631440{padding-top: 12vh !important;}"][vc_column][thb_title style="style7" title="TRENDING NEWS"][thb_postgrid style="style1-left" columns="4" source="size:8|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_08'] = array(
		'name'      => esc_html__( 'Post Grid - 08', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/08.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1550139798891{padding-top: 8vh !important;padding-bottom: 10vh !important;}"][vc_column][thb_image retina="retina_size" alignment="aligncenter" image="513"][/thb_image][/vc_column][/vc_row][vc_row][vc_column][thb_title style="style7" title="FASHION"][thb_categorylinks cat="29,7,6"][vc_empty_space height="24px"][thb_postgrid style="style1-left" source="size:3|post_type:post" offset="14"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_09'] = array(
		'name'      => esc_html__( 'Post Grid - 09', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/09.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1550139898206{padding-top: 12vh !important;}"][vc_column][thb_title style="style7" title="LATEST NEWS"][thb_postgrid style="style17" source="size:4|post_type:post" offset="17"][vc_separator color="custom" accent_color="#e9e9e9"][vc_empty_space height="60px"][vc_column_text]<h6 style="text-align: center;">YOU MUST HAVE THESE GOODIES</h6>[/vc_column_text][thb_product product_sort="latest-products" animation="animation fade-in" thb_carousel="true" columns="4" autoplay="true"][vc_empty_space height="20px"][vc_separator color="custom" accent_color="#e9e9e9"][vc_empty_space height="40px"][thb_postgrid style="style17" pagination="style3" source="size:3|post_type:post" offset="21"][vc_empty_space height="40px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_10'] = array(
		'name'      => esc_html__( 'Post Grid - 10', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/10.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column width="3/4" el_class="sidebar-content"][thb_postgrid style="style3" columns="2" pagination="true" source="size:9|post_type:post|categories:6"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_11'] = array(
		'name'      => esc_html__( 'Post Grid - 11', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/11.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row el_class="recipe-row" css=".vc_custom_1548845961667{padding-top: 5vh !important;}"][vc_column][thb_title style="style3" title="FAVOURITE ITALIAN RECIPES" icon_image="499" icon_image_width="36"][thb_categorylinks style="style2" cat="29,7,6,1,30"][vc_empty_space height="30px"][thb_postgrid style="style1-left" excerpts="true" columns="4" source="size:4|post_type:post"][vc_row_inner][vc_column_inner el_class="text-center"][thb_button size="small" border_radius="pill-radius" thb_shadow="thb_shadow" link="url:https%3A%2F%2Ftheissue.fuelthemes.net|title:More%20News||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postgrid_12'] = array(
		'name'      => esc_html__( 'Post Grid - 12', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/12.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style3" title="DELICIOUS COOKIES" icon_image="500" icon_image_width="38"][vc_empty_space height="24px"][thb_postgrid style="style4" source="size:3|post_type:post|categories:55"][vc_empty_space height="10px"][vc_row_inner][vc_column_inner el_class="text-center"][thb_button size="small" border_radius="pill-radius" thb_shadow="thb_shadow" link="url:https%3A%2F%2Ftheissue.fuelthemes.net|title:More%20News||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row]',
	);
	$template_list['postgrid_13'] = array(
		'name'      => esc_html__( 'Post Grid - 13', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/13.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1549395322960{padding-bottom: 8vh !important;}"][vc_column][thb_postgrid style="style10" columns="4" source="size:4|post_type:post|categories:55"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_14'] = array(
		'name'      => esc_html__( 'Post Grid - 14', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/14.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1549395423699{padding-bottom: 8vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_postgrid style="style5" pagination="style2" source="size:8|post_type:post" offset="9"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_15'] = array(
		'name'      => esc_html__( 'Post Grid - 15', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/15.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549906821985{padding-top: 40px !important;padding-bottom: 50px !important;}"][vc_column][thb_postgrid style="style10" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_16'] = array(
		'name'      => esc_html__( 'Post Grid - 16', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/16.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][vc_column_text]<h6 style="text-align: center; font-size: 14px; font-weight: 500;">FEATURED POSTS</h6>[/vc_column_text][thb_postgrid style="style7" columns="4" source="size:4|post_type:post" offset="3"][vc_empty_space height="20px"][vc_separator color="custom" accent_color="#e9e9e9"][vc_empty_space height="50px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_17'] = array(
		'name'      => esc_html__( 'Post Grid - 17', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/17.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column width="3/4" el_class="sidebar-content"][thb_postgrid style="style13" pagination="style4" source="size:7|post_type:post" offset="7"][vc_empty_space mobile_height="25px" height="50px"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_18'] = array(
		'name'      => esc_html__( 'Post Grid - 18', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/18.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1551731484132{padding-top: 30px !important;}"][vc_column][thb_title style="style5" title="SPOTLIGHT"][thb_postgrid style="style11" source="size:3|post_type:post" offset="3"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_19'] = array(
		'name'      => esc_html__( 'Post Grid - 19', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/19.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1549910897782{padding-bottom: 8vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style5" text_align="text-left" title="LATEST NEWS"][thb_postgrid style="style1-left" excerpts="true" columns="2" pagination="style2" source="size:6|post_type:post" offset="9"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_20'] = array(
		'name'      => esc_html__( 'Post Grid - 20', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/20.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style6" title="TRENDING POSTS"][vc_empty_space][thb_postgrid style="style12" columns="4" source="size:4|post_type:post" offset="5"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_21'] = array(
		'name'      => esc_html__( 'Post Grid - 21', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/21.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1549454937333{padding-bottom: 6vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style6" text_align="text-left" title="LATEST"][thb_postgrid style="style8" pagination="style2" source="size:5|post_type:post" offset="21"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_22'] = array(
		'name'      => esc_html__( 'Post Grid - 22', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/22.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column width="1/3"][vc_column_text css=".vc_custom_1550076987884{margin-bottom: 22px !important;}"]<span style="color: #ff5a00; font-size: 22px; font-weight: 600;">Celebs</span>[/vc_column_text][thb_postgrid style="style16" columns="1" source="size:4|post_type:post|categories:30"][/vc_column][vc_column width="1/3"][vc_column_text css=".vc_custom_1550077002577{margin-bottom: 22px !important;}"]<span style="color: #0fdd92; font-size: 22px; font-weight: 600;">Shows</span>[/vc_column_text][thb_postgrid style="style16" columns="1" source="size:4|post_type:post|categories:66"][/vc_column][vc_column width="1/3"][vc_column_text css=".vc_custom_1550077008214{margin-bottom: 22px !important;}"]<span style="color: #1f98ed; font-size: 22px; font-weight: 600;">Music</span>[/vc_column_text][thb_postgrid style="style16" columns="1" source="size:4|post_type:post|categories:31"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_23'] = array(
		'name'      => esc_html__( 'Post Grid - 23', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/23.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1549985743169{padding-top: 10vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_postgrid style="style15" source="size:4|post_type:post" offset="22"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1" el_class="sidebar"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_24'] = array(
		'name'      => esc_html__( 'Post Grid - 24', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/24.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_postgrid style="style14" source="size:6|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_25'] = array(
		'name'      => esc_html__( 'Post Grid - 25', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/25.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row el_class="align-center"][vc_column width="3/4"][thb_postgrid style="style18" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_26'] = array(
		'name'      => esc_html__( 'Post Grid - 26', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/26.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_postgrid style="style20" columns="5" source="size:5|post_type:post" offset="3"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_27'] = array(
		'name'      => esc_html__( 'Post Grid - 27', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/27.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1551457925720{padding-bottom: 60px !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_postgrid style="style19" excerpts="true" pagination="style4" source="size:6|post_type:post" offset="8" featured_index="1"][vc_empty_space mobile_height="40px" height="60px"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][vc_empty_space mobile_height="40px" height="60px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_28'] = array(
		'name'      => esc_html__( 'Post Grid - 28', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/28.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1551444663782{padding-top: 30px !important;}"][vc_column width="3/4" el_class="sidebar-content"][vc_empty_space mobile_height="20px" height="45px"][thb_postgrid style="style3" columns="1" source="size:1|post_type:post"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_empty_space mobile_height="20px" height="45px"][thb_title style="style8" text_align="text-left" title="MOST POPULAR"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_29'] = array(
		'name'      => esc_html__( 'Post Grid - 29', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/29.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1547142968882{padding-top: 2vh !important;padding-bottom: 8vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style8" text_align="text-left" title="TRENDING NEWS"][thb_postgrid style="style1-left" excerpts="true" columns="2" pagination="style2" source="size:6|post_type:post" offset="1"][/vc_column][vc_column width="1/4" el_class="sidebar"][thb_title style="style8" text_align="text-left" title="VIDEO UPDATES"][vc_widget_sidebar sidebar_id="homepage_2"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_30'] = array(
		'name'      => esc_html__( 'Post Grid - 30', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/30.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1551284141644{padding-top: 50px !important;padding-bottom: 20px !important;background-color: #f3f3f3 !important;}"][vc_column][vc_row_inner css=".vc_custom_1551444548373{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column_inner][thb_title style="style8" text_align="text-left" title="TOP VIDEOS"][thb_postgrid style="style20" columns="4" source="size:4|post_type:post" offset="12"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postgrid_31'] = array(
		'name'      => esc_html__( 'Post Grid - 31', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/31.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1546883194736{padding-top: 8vh !important;padding-bottom: 6vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style8" text_align="text-left" title="MORE NEWS"][thb_postgrid style="style8" pagination="true" source="size:5|post_type:post" featured_index="4" offset="16"][/vc_column][vc_column width="1/4" el_class="sidebar"][thb_title style="style8" text_align="text-left" title="MOVIE REVIEWS"][vc_widget_sidebar sidebar_id="homepage_3"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_32'] = array(
		'name'      => esc_html__( 'Post Grid - 32', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/32.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row][vc_column][thb_title style="style5" text_align="text-left" title="Politics" link="url:%23|title:View%20All||"][thb_postgrid style="style21" columns="4" source="size:4|post_type:post" offset="5"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_33'] = array(
		'name'      => esc_html__( 'Post Grid - 33', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/33.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1551572606246{padding-top: 30px !important;}"][vc_column][thb_title style="style5" text_align="text-left" title="Economy" link="url:%23|title:View%20All||"][thb_postgrid style="style21" source="size:3|post_type:post" offset="9"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_34'] = array(
		'name'      => esc_html__( 'Post Grid - 34', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/34.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1551572588820{padding-top: 30px !important;}"][vc_column][thb_title style="style5" text_align="text-left" title="Human Rights" link="url:%23|title:View%20All||"][thb_postgrid style="style22" columns="5" source="size:5|post_type:post" offset="12"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_35'] = array(
		'name'      => esc_html__( 'Post Grid - 35', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/35.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1551573341332{padding-bottom: 60px !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style5" text_align="text-left" title="More News" link="|||"][thb_postgrid style="style7" columns="2" source="size:8|post_type:post" offset="24"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row][vc_row][vc_column][vc_separator color="custom" border_width="3" accent_color="#e4e4e4"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_36'] = array(
		'name'      => esc_html__( 'Post Grid - 36', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/36.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column width="2/3" el_class="sidebar-content"][thb_postgrid style="style23" excerpts="true" columns="2" pagination="style4" source="size:9|post_type:post" offset="10"][/vc_column][vc_column width="1/3" el_class="sidebar"][vc_widget_sidebar sidebar_id="home_1"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_37'] = array(
		'name'      => esc_html__( 'Post Grid - 37', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/37.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="30" height="60px"][/vc_column][/vc_row][vc_row css=".vc_custom_1556571167744{padding-bottom: 8vh !important;}"][vc_column width="2/3" el_class="sidebar-content"][thb_postgrid style="style18" pagination="style2" source="size:4|post_type:post" offset="10"][/vc_column][vc_column width="1/3" el_class="sidebar"][vc_widget_sidebar sidebar_id="home_1"][vc_empty_space height="40px"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_38'] = array(
		'name'      => esc_html__( 'Post Grid - 38', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/38.jpg',
		'cat'       => array( 'Post-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1587741627627{padding-bottom: 60px !important;}"][vc_column][thb_title style="style6" title="<em>TODAY’S TOP STORIES</em>"][thb_postgrid style="style24" source="size:6|post_type:post|categories:29"][/vc_column][/vc_row]',
	);
	$template_list['postgrid_39'] = array(
		'name'      => esc_html__( 'Post Grid - 39', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_grid/39.jpg',
		'cat'       => array( 'Post-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1587745757787{padding-top: 90px !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style6" text_align="text-left" title="<em>MUST READ STORIES</em>"][thb_postgrid style="style25" pagination="style2" source="size:6|post_type:post" featured_index="4" offset="8"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage"][vc_empty_space mobile_height="40px" height="80px"][/vc_column][/vc_row]',
	);
	return $template_list;
}
