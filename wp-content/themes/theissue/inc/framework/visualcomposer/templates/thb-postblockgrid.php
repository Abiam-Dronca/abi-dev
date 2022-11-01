<?php
function thb_get_postblockgrid_templates( $template_list ) {
	$template_list['postblockgrid_01'] = array(
		'name'      => esc_html__( 'Post Block Grid - 01', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/01.jpg',
		'cat'       => array( 'Post-Block-Grid', 'Sidebar' ),
		'sc'        => '[vc_row][vc_column][thb_title title="CELEBRITY"][vc_row_inner thb_max_width=""][vc_column_inner el_class="sidebar-content" width="3/4"][thb_blockgrid style="style4" source="size:6|post_type:post|categories:7" offset="2"][/vc_column_inner][vc_column_inner fixed="thb-fixed" el_class="sidebar" width="1/4"][thb_image retina="retina_size" alignment="alignnone" image="140"][/thb_image][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_02'] = array(
		'name'      => esc_html__( 'Post Block Grid - 02', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/02.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1550139889921{padding-top: 8vh !important;padding-bottom: 12vh !important;}"][vc_column][thb_title style="style7" title="EDITORS PICKS"][thb_blockgrid style="style9" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_03'] = array(
		'name'      => esc_html__( 'Post Block Grid - 03', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/03.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="20" height="40px"][thb_blockgrid style="style5" source="size:5|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_04'] = array(
		'name'      => esc_html__( 'Post Block Grid - 04', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/04.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549395269837{padding-bottom: 6vh !important;}"][vc_column][thb_title style="style4" title="XBOX ONE"][thb_blockgrid style="style6" source="size:5|post_type:post|categories:1" offset="3"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_05'] = array(
		'name'      => esc_html__( 'Post Block Grid - 05', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/05.jpg',
		'cat'       => array( 'Post-Block-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1549910897782{padding-bottom: 8vh !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_title style="style5" text_align="text-left" title="MUSIC NEWS"][thb_blockgrid style="style7" source="size:3|post_type:post|categories:55"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_06'] = array(
		'name'      => esc_html__( 'Post Block Grid - 06', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/06.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549960345068{padding-top: 30px !important;}"][vc_column][thb_blockgrid source="size:5|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_07'] = array(
		'name'      => esc_html__( 'Post Block Grid - 07', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/07.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549454874133{padding-top: 6vh !important;padding-bottom: 8vh !important;}"][vc_column][thb_title style="style6" title="FASHION"][thb_blockgrid style="style2" source="size:6|post_type:post|categories:6" offset="1"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_08'] = array(
		'name'      => esc_html__( 'Post Block Grid - 08', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/08.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549454921290{padding-top: 8vh !important;padding-bottom: 6vh !important;}"][vc_column][thb_title style="style6" title="VIDEOS"][thb_blockgrid style="style3" source="size:3|post_type:post|categories:55"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_09'] = array(
		'name'      => esc_html__( 'Post Block Grid - 09', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/09.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row css=".vc_custom_1549455843846{padding-top: 80px !important;}"][vc_column][thb_blockgrid style="style8" source="size:3|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_10'] = array(
		'name'      => esc_html__( 'Post Block Grid - 10', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/10.jpg',
		'cat'       => array( 'Post-Block-Grid', 'Sidebar' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1550249030363{padding-top: 50px !important;padding-bottom: 50px !important;background-color: #fef7e3 !important;}"][vc_column][vc_row_inner css=".vc_custom_1550486272675{padding-top: 4vh !important;padding-bottom: 4vh !important;}"][vc_column_inner el_class="sidebar-content" width="3/4"][vc_column_text]<h5 style="text-align: left;"><span style="font-size: 18px; font-weight: bold; letter-spacing: 0.05em;">CELEBRITY</span></h5>[/vc_column_text][thb_blockgrid style="style10" source="size:7|post_type:post" offset="9"][/vc_column_inner][vc_column_inner fixed="thb-fixed" el_class="sidebar" width="1/4"][vc_empty_space height="64px"][vc_widget_sidebar sidebar_id="homepage" el_class="sidebar"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_11'] = array(
		'name'      => esc_html__( 'Post Block Grid - 11', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/11.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row thb_full_width="true" thb_row_padding="true" thb_column_padding="true" css=".vc_custom_1550498423513{padding-top: 40px !important;padding-bottom: 40px !important;background: #f3f9f7 url(https://theissue.fuelthemes.net/issue-12/wp-content/uploads/sites/12/2019/02/yh17.jpg?id=528) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][vc_row_inner css=".vc_custom_1550497492184{padding-top: 4vh !important;padding-bottom: 4vh !important;}"][vc_column_inner][vc_column_text]<h5 style="text-align: center;"><span style="font-size: 18px; font-weight: bold; letter-spacing: 0.05em;">TRENDS</span></h5>[/vc_column_text][thb_blockgrid style="style11" source="size:5|post_type:post" offset="28"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_12'] = array(
		'name'      => esc_html__( 'Post Block Grid - 12', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/12.jpg',
		'cat'       => array( 'Post-Block-Grid' ),
		'sc'        => '[vc_row][vc_column][vc_empty_space mobile_height="25" height="55px"][thb_blockgrid style="style12" source="size:5|post_type:post"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_13'] = array(
		'name'      => esc_html__( 'Post Block Grid - 13', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/13.jpg',
		'cat'       => array( 'Post-Block-Grid', 'Sidebar' ),
		'sc'        => '[vc_row css=".vc_custom_1551573341332{padding-bottom: 60px !important;}"][vc_column width="3/4" el_class="sidebar-content"][thb_blockgrid style="style13" source="size:5|post_type:post" offset="17"][/vc_column][vc_column width="1/4" el_class="sidebar"][vc_widget_sidebar sidebar_id="homepage_1"][/vc_column][/vc_row][vc_row][vc_column][vc_separator color="custom" border_width="3" accent_color="#e4e4e4"][/vc_column][/vc_row]',
	);
	$template_list['postblockgrid_14'] = array(
		'name'      => esc_html__( 'Post Block Grid - 14', 'theissue' ),
		'thumbnail' => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/demo_images/post_block_grid/14.jpg',
		'cat'       => array( 'Post-Block-Grid', 'Sidebar' ),
		'sc'        => '[vc_row thb_full_width="true" css=".vc_custom_1587741307352{background-image: url(https://theissue.fuelthemes.net/issue-18/wp-content/uploads/sites/18/2020/04/bg-repeat.png?id=666) !important;background-position: 0 0 !important;background-repeat: repeat !important;}"][vc_column][vc_row_inner css=".vc_custom_1587741535281{padding-top: 90px !important;padding-bottom: 60px !important;}"][vc_column_inner][thb_title style="style6" title="<em>EDITOR’S PICKS</em>"][thb_blockgrid style="style14" source="size:8|post_type:post|categories:7"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]',
	);
	return $template_list;
}
