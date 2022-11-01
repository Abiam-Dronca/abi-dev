<?php
function thb_get_archive_layouts() {
	$array = array(
		array(
			'value' => 'style1',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style01.png',
		),
		array(
			'value' => 'style2',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style02.png',
		),
		array(
			'value' => 'style3',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style03.png',
		),
		array(
			'value' => 'style4',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style04.png',
		),
		array(
			'value' => 'style5',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style05.png',
		),
		array(
			'value' => 'style6',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style06.png',
		),
		array(
			'value' => 'style7',
			'label' => esc_html__( 'Single Column', 'theissue' ),
			'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/archives/style07.png',
		),
	);

	return $array;
}
function thb_filter_radio_images( $array, $field_id ) {

	if ( in_array( $field_id, array( 'widget_style' ), true ) ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/widget_styles/style1.jpg',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/widget_styles/style2.jpg',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/widget_styles/style3.jpg',
			),
		);
	}
	if ( in_array( $field_id, array( 'article_style', 'post_style' ), true ) ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style01.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style02.png',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style03.png',
			),
			array(
				'value' => 'style4',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style04.png',
			),
			array(
				'value' => 'style5',
				'label' => esc_html__( 'Style 5', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style05.png',
			),
			array(
				'value' => 'style6',
				'label' => esc_html__( 'Style 6', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style06.png',
			),
			array(
				'value' => 'style7',
				'label' => esc_html__( 'Style 7', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style07.png',
			),
			array(
				'value' => 'style8',
				'label' => esc_html__( 'Style 8', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style08.png',
			),
			array(
				'value' => 'style9',
				'label' => esc_html__( 'Style 9', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style09.png',
			),
			array(
				'value' => 'style10',
				'label' => esc_html__( 'Style 10', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style10.png',
			),
			array(
				'value' => 'style11',
				'label' => esc_html__( 'Style 11', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style11.png',
			),
			array(
				'value' => 'style12',
				'label' => esc_html__( 'Style 12', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/article_styles/style12.png',
			),
		);
	}

	if ( $field_id === 'post_gallery_style' ) {
		$array = array(
			array(
				'value' => 'lightbox',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/gallery_styles/style1.png',
			),
			array(
				'value' => 'smart-list-v1',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/gallery_styles/style2.png',
			),
			array(
				'value' => 'smart-list-v2',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/gallery_styles/style3.png',
			),
			array(
				'value' => 'smart-list-v3',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/gallery_styles/style4.png',
			),
		);
	}

	if ( $field_id === 'header_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style2.png',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style3.png',
			),
			array(
				'value' => 'style4',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style4.png',
			),
			array(
				'value' => 'style5',
				'label' => esc_html__( 'Style 5', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style5.png',
			),
			array(
				'value' => 'style6',
				'label' => esc_html__( 'Style 6', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style6.png',
			),
			array(
				'value' => 'style7',
				'label' => esc_html__( 'Style 7', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style7.png',
			),
			array(
				'value' => 'style8',
				'label' => esc_html__( 'Style 8', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style8.png',
			),
			array(
				'value' => 'style9',
				'label' => esc_html__( 'Style 9', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style9.png',
			),
			array(
				'value' => 'style10',
				'label' => esc_html__( 'Style 10', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/header/style10.png',
			),
		);
	}
	if ( $field_id === 'lightbox_color' ) {
		$array = array(
			array(
				'value' => 'lightbox-light',
				'label' => esc_html__( 'Light', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/light.png',
			),
			array(
				'value' => 'lightbox-dark',
				'label' => esc_html__( 'Dark', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/dark.png',
			),
		);
	}
	if ( $field_id === 'header_trending_icon' ) {
		$array = array(
			array(
				'value' => 'v1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/trending_icons/style1.png',
			),
			array(
				'value' => 'v2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/trending_icons/style2.png',
			),
			array(
				'value' => 'v3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/trending_icons/style3.png',
			),
		);
	}
	if ( in_array( $field_id, array( 'header_color', 'fixed_header_color', 'mobile_header_color' ), true ) ) {
		$array = array(
			array(
				'value' => 'light-header',
				'label' => esc_html__( 'Light - White Background', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/light.png',
			),
			array(
				'value' => 'dark-header',
				'label' => esc_html__( 'Dark - Black Background', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/dark.png',
			),
		);
	}

	if ( in_array( $field_id, array( 'subheader_color', 'mobile_menu_color', 'footer_color', 'subfooter_color', 'full_menu_dropdown_color', 'newsletter_lightbox_color' ), true ) ) {
		$array = array(
			array(
				'value' => 'light',
				'label' => esc_html__( 'Light - White Background', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/light.png',
			),
			array(
				'value' => 'dark',
				'label' => esc_html__( 'Dark - Black Background', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/light_dark/dark.png',
			),
		);
	}

	if ( $field_id === 'sharing_buttons_top_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles/style2.png',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles/style3.png',
			),
			array(
				'value' => 'style4',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles/style4.png',
			),
			array(
				'value' => 'style5',
				'label' => esc_html__( 'Style 5', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles/style5.png',
			),
		);
	}

	if ( $field_id === 'sharing_buttons_bottom_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles_footer/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/share_styles_footer/style2.png',
			),
		);
	}

	if ( $field_id === 'subfooter_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style2.png',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style3.png',
			),
			array(
				'value' => 'style4',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style4.png',
			),
			array(
				'value' => 'style5',
				'label' => esc_html__( 'Style 5', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style5.png',
			),
			array(
				'value' => 'style6',
				'label' => esc_html__( 'Style 6', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/subfooter/style6.png',
			),
		);
	}

	if ( $field_id === 'article_related_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/related_styles/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/related_styles/style2.png',
			),
			array(
				'value' => 'style3',
				'label' => esc_html__( 'Style 3', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/related_styles/style3.png',
			),
			array(
				'value' => 'style4',
				'label' => esc_html__( 'Style 4', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/related_styles/style4.png',
			),
		);
	}

	if ( $field_id === 'footer_columns' ) {
		$array = array(
			array(
				'value' => 'onecolumns',
				'label' => esc_html__( 'Single Column', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/one-columns.png',
			),
			array(
				'value' => 'twocolumns',
				'label' => esc_html__( 'Two Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/two-columns.png',
			),
			array(
				'value' => 'threecolumns',
				'label' => esc_html__( 'Three Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/three-columns.png',
			),
			array(
				'value' => 'fourcolumns',
				'label' => esc_html__( 'Four Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/four-columns.png',
			),
			array(
				'value' => 'doubleleft',
				'label' => esc_html__( 'Double Left Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/doubleleft-columns.png',
			),
			array(
				'value' => 'doubleright',
				'label' => esc_html__( 'Double Right Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/doubleright-columns.png',
			),
			array(
				'value' => 'fivecolumns',
				'label' => esc_html__( 'Five Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/five-columns.png',
			),
			array(
				'value' => 'sixcolumns',
				'label' => esc_html__( 'Six Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/six-columns.png',
			),
			array(
				'value' => 'fivelargerightcolumns',
				'label' => esc_html__( 'Five Columns - Larger Right Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/five-columns-large-right.png',
			),
			array(
				'value' => 'fivelargeleftcolumns',
				'label' => esc_html__( 'Five Columns - Larger Left Columns', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/columns/five-columns-large-left.png',
			),
		);
	}

	if ( $field_id === 'post_review_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style - 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/review_styles/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style - 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/review_styles/style2.png',
			),
		);
	}

	if ( $field_id === 'shop_product_listing' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style - 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/product_list_styles/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style - 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/product_list_styles/style2.png',
			),
		);
	}

	if ( $field_id === 'shop_product_style' ) {
		$array = array(
			array(
				'value' => 'style1',
				'label' => esc_html__( 'Style - 1', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/product_styles/style1.png',
			),
			array(
				'value' => 'style2',
				'label' => esc_html__( 'Style - 2', 'theissue' ),
				'src'   => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/product_styles/style2.png',
			),
		);
	}

	if ( in_array( $field_id, array( 'archive_layout', 'category_layout', 'tag_layout', 'search_layout', 'author_layout' ), true ) ) {
		$array = thb_get_archive_layouts();
	}

	return $array;

}
add_filter( 'ot_radio_images', 'thb_filter_radio_images', 10, 2 );

function thb_social_links_settings( $id ) {

	$settings = array(
		array(
			'label'   => 'Social Network',
			'id'      => 'social_network',
			'type'    => 'select',
			'desc'    => 'Select your social network',
			'choices' => array(
				array(
					'label' => 'Facebook',
					'value' => 'facebook',
				),
				array(
					'label' => 'Twitter',
					'value' => 'twitter',
				),
				array(
					'label' => 'Google Plus',
					'value' => 'google-plus',
				),
				array(
					'label' => 'Pinterest',
					'value' => 'pinterest',
				),
				array(
					'label' => 'Linkedin',
					'value' => 'linkedin',
				),
				array(
					'label' => 'Instagram',
					'value' => 'instagram',
				),
				array(
					'label' => 'Flickr',
					'value' => 'flickr',
				),
				array(
					'label' => 'VK',
					'value' => 'vk',
				),
				array(
					'label' => 'Tumblr',
					'value' => 'tumblr',
				),
				array(
					'label' => 'Spotify',
					'value' => 'spotify',
				),
				array(
					'label' => 'Youtube',
					'value' => 'youtube-play',
				),
				array(
					'label' => 'Vimeo',
					'value' => 'vimeo',
				),
				array(
					'label' => 'Dribbble',
					'value' => 'dribbble',
				),
				array(
					'label' => '500px',
					'value' => '500px',
				),
				array(
					'label' => 'Behance',
					'value' => 'behance',
				),
				array(
					'label' => 'Soundcloud',
					'value' => 'soundcloud',
				),
				array(
					'label' => 'Telegram',
					'value' => 'telegram',
				),
				array(
					'label' => 'IMDB',
					'value' => 'imdb',
				),
				array(
					'label' => 'Whatsapp',
					'value' => 'whatsapp',
				),
			),
		),
		array(
			'id'    => 'href',
			'label' => 'Link',
			'desc'  => sprintf( __( 'Enter a link to the profile or page on the social website. Remember to add the %s part to the front of the link.', 'theissue' ), '<code>http://</code>' ),
			'type'  => 'text',
		),
	);

	return $settings;

}
add_filter( 'ot_social_links_settings', 'thb_social_links_settings' );
add_filter( 'ot_type_social_links_load_defaults', '__return_false' );

function thb_filter_options_name() {
	return wp_kses(
		__( '<a href="https://fuelthemes.net">Fuel Themes</a>', 'theissue' ),
		array(
			'a' => array(
				'href'  => array(),
				'title' => array(),
			),
		)
	);
}
add_filter( 'ot_header_version_text', 'thb_filter_options_name', 10, 2 );

function thb_filter_page_title() {
	return wp_kses(
		__( 'The Issue Theme Options', 'theissue' ),
		array(
			'a' => array(
				'href'  => array(),
				'title' => array(),
			),
		)
	);
}
add_filter( 'ot_theme_options_page_title', 'thb_filter_page_title', 10, 2 );

function thb_filter_menu_title() {
	return wp_kses(
		__( 'The Issue Options', 'theissue' ),
		array(
			'a' => array(
				'href'  => array(),
				'title' => array(),
			),
		)
	);
}
add_filter( 'ot_theme_options_menu_title', 'thb_filter_menu_title', 10, 2 );

function thb_filter_upload_text() {
	return wp_kses(
		__( 'Send to Theme Options', 'theissue' ),
		array(
			'a' => array(
				'href'  => array(),
				'title' => array(),
			),
		)
	);
}
add_filter( 'ot_upload_text', 'thb_filter_upload_text', 10, 2 );

function thb_header_list() {
	echo '<li class="theme_link"><a href="http://fuelthemes.ticksy.com/" target="_blank">Support Forum</a></li>';
}
add_filter( 'ot_header_list', 'thb_header_list' );

function thb_filter_ot_recognized_font_families( $array, $field_id ) {
	$array['helveticaneue'] = '"Helvetica Neue", Helvetica, Roboto, Arial, sans-serif';
	ot_fetch_google_fonts( true, false );
	$ot_google_fonts = wp_list_pluck( get_theme_mod( 'ot_google_fonts', array() ), 'family' );
	$array           = array_merge( $array, $ot_google_fonts );

	if ( ot_get_option( 'typekit_id' ) ) {
		$typekit_fonts = trim( ot_get_option( 'typekit_fonts' ), ' ' );
		$typekit_fonts = explode( ',', $typekit_fonts );

		$array = array_merge( $array, $typekit_fonts );
	}
	$self_hosted_names = array();
	if ( ot_get_option( 'self_hosted_fonts' ) ) {
		$self_hosted_fonts = ot_get_option( 'self_hosted_fonts' );

		foreach ( $self_hosted_fonts as $font ) {
			$self_hosted_names[] = $font['font_name'];
		}

		$array = array_merge( $array, $self_hosted_names );
	}

	foreach ( $array as $font => $value ) {
		$thb_font_array[ $value ] = $value;
	}
	return $thb_font_array;
}
add_filter( 'ot_recognized_font_families', 'thb_filter_ot_recognized_font_families', 10, 2 );


function thb_filter_typography_fields( $array, $field_id ) {

	if ( in_array( $field_id, array( 'primary_font', 'tertiary_font', 'button_font', 'fullmenu_font', 'mobilemenu_font', 'widget_title_font' ) ) ) {
		$array = array( 'font-family' );
	} elseif ( in_array( $field_id, array( 'em_font', 'label_font' ) ) ) {
		$array = array( 'font-family', 'font-style', 'font-weight' );
	} elseif ( in_array( $field_id, array( 'secondary_font' ) ) ) {
		$array = array( 'font-family', 'font-style', 'font-weight', 'text-transform', 'letter-spacing' );
	} elseif ( in_array( $field_id, array( 'h1_type', 'h2_type', 'h3_type', 'h4_type', 'h5_type', 'h6_type' ) ) ) {
		$array = array( 'font-family', 'font-size', 'font-style', 'font-weight', 'text-transform', 'line-height', 'letter-spacing' );
	} elseif ( in_array(
		$field_id,
		array( 'body_type', 'article_category_type', 'article_executive_type', 'article_excerpt_type', 'fullmenu_type', 'fullmenu_sub_type', 'mobilemenu_type', 'mobilemenu_sub_type', 'mobilemenu_secondary_type', 'mobilemenu_footer_type', 'mobilemenu_social_type', 'article_dropcap_type', 'widget_title_type', 'widget_title_type_footer', 'footer_type', 'secondarymenu_text_font_1', 'secondarymenu_text_font_2', 'subfooter_fullmenu_type', 'subfooter_copyright_type', 'scrolltotop_type', 'archive_description_type' )
	) ) {
		$array = array( 'font-size', 'font-style', 'font-weight', 'text-transform', 'line-height', 'letter-spacing' );
	} elseif ( in_array( $field_id, array( 'fullmenu_social_type', 'subfooter_social_type' ) ) ) {
		$array = array( 'font-size' );
	}
	return $array;

}

add_filter( 'ot_recognized_typography_fields', 'thb_filter_typography_fields', 10, 2 );

function thb_filter_spacing_fields( $array, $field_id ) {

	if ( in_array( $field_id, array( 'header_padding', 'header_padding_fixed', 'header_padding_mobile', 'footer_padding', 'subfooter_padding', 'footerbar_padding', 'logo_padding', 'logo_mobile_padding' ) ) ) {
		$array = array( 'top', 'bottom' );
	}
	return $array;

}

add_filter( 'ot_recognized_spacing_fields', 'thb_filter_spacing_fields', 10, 2 );

function thb_filter_measurement_unit_types( $array, $field_id ) {
	if ( in_array( $field_id, array( 'site_borders_width' ), true ) ) {
		$array = array(
			'px' => 'px',
			'em' => 'em',
			'pt' => 'pt',
		);
	}
	if ( in_array( $field_id, array( 'thb_grid_size' ), true ) ) {
		$array = array(
			'px'  => 'px',
			'em'  => 'em',
			'rem' => 'rem',
			'%'   => '%',
		);
	}
	return $array;
}
add_filter( 'ot_measurement_unit_types', 'thb_filter_measurement_unit_types', 10, 2 );

function thb_ot_line_height_unit_type( $array, $field_id ) {
	return 'em';
}
add_filter( 'ot_line_height_unit_type', 'thb_ot_line_height_unit_type', 10, 2 );

function thb_ot_line_height_high_range( $array, $field_id ) {
	return 3;
}
add_filter( 'ot_line_height_high_range', 'thb_ot_line_height_high_range', 10, 2 );

function thb_ot_line_height_range_interval( $array, $field_id ) {
	return 0.05;
}
add_filter( 'ot_line_height_range_interval', 'thb_ot_line_height_range_interval', 10, 2 );

function thb_ot_letter_spacing_high_range( $array, $field_id ) {
	return '0.2';
}
add_filter( 'ot_letter_spacing_high_range', 'thb_ot_letter_spacing_high_range', 10, 2 );

function thb_ot_letter_spacing_low_range( $array, $field_id ) {
	return '-0.2';
}
add_filter( 'ot_letter_spacing_low_range', 'thb_ot_letter_spacing_low_range', 10, 2 );

function thb_filter_ot_recognized_link_color_fields( $array, $field_id ) {
	$array = array(
		'link'  => esc_html_x( 'Standard', 'color picker', 'theissue' ),
		'hover' => esc_html_x( 'Hover', 'color picker', 'theissue' ),
	);
	return $array;
}
add_filter( 'ot_recognized_link_color_fields', 'thb_filter_ot_recognized_link_color_fields', 10, 2 );

function thb_clear_font_cache() {
	$clear = filter_input( INPUT_GET, 'thb_clear_font_cache', FILTER_VALIDATE_BOOLEAN );
	if ( $clear && current_user_can( 'manage_options' ) ) {
		delete_transient( 'ot_google_fonts_cache' );
	}
}
add_action( 'admin_init', 'thb_clear_font_cache' );
