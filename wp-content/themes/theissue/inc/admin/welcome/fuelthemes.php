<?php
class Thb_Theme_Admin {
	/**
	 * Main instance
	 */
	private static $_instance;

	/**
	 * Theme Name
	 */
	public static $thb_theme_name;

	/**
	 * Theme Version
	 */
	public static $thb_theme_version;

	/**
	 * Theme Slug
	 */
	public static $thb_theme_slug;

	/**
	 * Theme Directory
	 */
	public static $thb_theme_directory;

	/**
	 * Theme Directory URL
	 */
	public static $thb_theme_directory_uri;

	/**
	 * Product Key
	 */
	public static $thb_product_key;

	/**
	 * Product Key Expiration
	 */
	public static $thb_product_key_expired;


	/**
	 * Mobile Check
	 */
	public static $thb_is_mobile;

	/**
	 * Theme Constructor executed only once per request
	 */
	public function __construct() {
		if ( self::$_instance ) {
			_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
		}
	}

	/**
	 * You cannot clone this class
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	/**
	 * You cannot unserialize instances of this class
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '2.0' );
	}

	public static function instance() {
		global $thb_Theme_Admin;
		if ( ! self::$_instance ) {
			self::$_instance = new self();
			$thb_Theme_Admin = self::$_instance;

			// Theme Variables.
			$theme                         = wp_get_theme();
			self::$thb_theme_name          = $theme->get( 'Name' );
			self::$thb_theme_version       = $theme->parent() ? $theme->parent()->get( 'Version' ) : $theme->get( 'Version' );
			self::$thb_theme_slug          = $theme->template;
			self::$thb_theme_directory     = get_template_directory() . '/';
			self::$thb_theme_directory_uri = get_template_directory_uri() . '/';

			self::$thb_product_key         = get_option( 'thb_' . self::$thb_theme_slug . '_key' );
			self::$thb_product_key_expired = get_option( 'thb_' . self::$thb_theme_slug . '_key_expired' );

			// Mobile Detect.
			self::$thb_is_mobile = new thb_mobile_detect();

			// After Setup Theme.
			add_action( 'after_setup_theme', array( self::$_instance, 'afterSetupTheme' ) );

			// Setup Admin Menus.
			if ( is_admin() ) {
				self::$_instance->initAdminPages();
			}
		}

		return self::$_instance;
	}
	/**
	 * After Theme Setup
	 */
	public function afterSetupTheme() {

		// Yoast Breadcrumbs.
		add_theme_support( 'yoast-seo-breadcrumbs' );

		// WooCommerce Support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		if ( ot_get_option( 'shop_product_lightbox', 'lightbox' ) === 'zoom' ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Catalog Mode.
		if ( ot_get_option( 'shop_catalog_mode', 'off' ) === 'on' ) {
			remove_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		}

		/* Gutenberg */
		add_theme_support( 'align-wide' );
		add_theme_support( 'align-full' );
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Accent Color', 'theissue' ),
					'slug'  => 'thb-accent',
					'color' => ot_get_option( 'accent_color', '#f75454' ),
				),
			)
		);

		/* WooCommerce Products per Page */
		add_filter( 'loop_shop_per_page', 'thb_shops_per_page', 20 );

		function thb_shops_per_page( $products_per_page ) {
			$products_per_page_get = filter_input( INPUT_GET, 'products_per_page', FILTER_VALIDATE_INT );
			$products_per_page     = isset( $products_per_page_get ) ? $products_per_page_get : ot_get_option( 'products_per_page' );
			return $products_per_page;
		}

		/* Post Formats */
		add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

		/* Text Domain */
		load_theme_textdomain( 'theissue', get_stylesheet_directory() . '/inc/languages' );

		/* Background Support */
		add_theme_support(
			'custom-background',
			array(
				'default-color'    => 'ffffff',
				'wp-head-callback' => 'thb_change_custom_background_cb',
			)
		);

		/* Title Support */
		add_theme_support( 'title-tag' );

		/* Required Settings */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1170;
		}
		add_theme_support( 'automatic-feed-links' );

		/* Editor Styling */
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		/* Image Settings */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 180, 180, true );

		$thb_image_sizes = self::$_instance->thb_image_sizes();

		// Register image size
		foreach ( $thb_image_sizes as $image_size ) {
			add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
		}

		/* HTML5 Galleries */
		add_theme_support( 'html5', array( 'comment-list', 'gallery', 'caption' ) );

		/* Register Menus */
		add_theme_support( 'nav-menus' );
		register_nav_menus(
			array(
				'nav-menu'       => esc_html__( 'Navigation Menu', 'theissue' ),
				'secondary-menu' => esc_html__( 'Secondary Menu', 'theissue' ),
			)
		);

		/* Sidebars */
		$thb_sidebar_defaults = array(
			'before_widget' => '<div id="%1$s" class="widget ' . esc_attr( ot_get_option( 'widget_style', 'style1' ) ) . ' %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="thb-widget-title"><span>',
			'after_title'   => '</div></span>',
		);

		$thb_sidebars = array(
			array(
				'name'        => esc_html__( 'Article Sidebar', 'theissue' ),
				'id'          => 'single',
				'description' => esc_html__( 'The sidebar next to articles', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Article Ajax Sidebar', 'theissue' ),
				'id'          => 'single-ajax',
				'description' => esc_html__( 'The sidebar next to articles loaded via Ajax', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Author Sidebar', 'theissue' ),
				'id'          => 'author',
				'description' => esc_html__( 'The sidebar on author pages', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Archive Sidebar', 'theissue' ),
				'id'          => 'archive',
				'description' => esc_html__( 'The sidebar on archive pages', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Category Sidebar', 'theissue' ),
				'id'          => 'category',
				'description' => esc_html__( 'The sidebar on category page. You can assign different categories inside Edit Category page.', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Tag Sidebar', 'theissue' ),
				'id'          => 'tag',
				'description' => esc_html__( 'The sidebar on tag pages', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Search Sidebar', 'theissue' ),
				'id'          => 'search',
				'description' => esc_html__( 'The sidebar on search result pages', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Page Sidebar', 'theissue' ),
				'id'          => 'page',
				'description' => esc_html__( 'The sidebar for the default page layouts', 'theissue' ),
			),
			array(
				'name'        => esc_html__( 'Mobile Menu Sidebar', 'theissue' ),
				'id'          => 'mobile-menu',
				'description' => esc_html__( 'You can also add widgets inside your mobile menu.', 'theissue' ),
			),
		);
		for ( $x = 1; $x <= 6; $x++ ) {
			$thb_sidebars[] = array(
				'name'        => esc_html__( 'Footer Column - ', 'theissue' ) . $x,
				'id'          => 'footer' . $x,
				'description' => esc_html__( 'Contents of the column #', 'theissue' ) . $x,
			);
		}

		// Shop Sidebar
		if ( thb_wc_supported() ) {
			array_unshift(
				$thb_sidebars,
				array(
					'name'        => esc_html__( 'Shop Sidebar', 'theissue' ),
					'id'          => 'thb-shop-filters',
					'description' => esc_html__( 'Sidebar used for filters on the Shop page', 'theissue' ),
				)
			);
		}
		// Register Sidebars
		foreach ( $thb_sidebars as $sidebar ) {
			register_sidebar( array_merge( $sidebar, $thb_sidebar_defaults ) );
		}

		/* Sidebars created in Theme Options */
		$option_sidebars = ot_get_option( 'sidebars' );
		if ( ! empty( $option_sidebars ) ) {
			foreach ( $option_sidebars as $sidebar ) {
				$the_sidebar = array(
					'name' => $sidebar['title'],
					'id'   => $sidebar['id'],
				);
				register_sidebar( array_merge( $the_sidebar, $thb_sidebar_defaults ) );
			}
		}
		function thb_remove_recent_comments_style() {
			global $wp_widget_factory;
			if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
				return;
			}
			if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
				remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
			}
		}
		add_action( 'widgets_init', 'thb_remove_recent_comments_style' );
	}
	public function thb_image_sizes() {
		$thb_image_sizes = apply_filters(
			'thb_image_sizes_filter',
			array(
				array(
					'slug'   => 'theissue-thumbnail',
					'width'  => 90,
					'height' => 90,
					'crop'   => true,
					'triple' => false,
				),
				array(
					'slug'   => 'theissue-square',
					'width'  => 370,
					'height' => 355,
					'crop'   => true,
					'triple' => true,
				),
				array(
					'slug'   => 'theissue-squaresmall',
					'width'  => 370,
					'height' => 300,
					'crop'   => true,
					'triple' => false,
				),
				array(
					'slug'   => 'theissue-rectangle',
					'width'  => 370,
					'height' => 230,
					'crop'   => true,
					'triple' => true,
				),
				array(
					'slug'   => 'theissue-masonry',
					'width'  => 370,
					'height' => 9999,
					'crop'   => false,
					'triple' => false,
				),
				array(
					'slug'   => 'theissue-full',
					'width'  => 800,
					'height' => 9999,
					'crop'   => false,
					'triple' => false,
				),
			)
		);

		function thb_calculate_image_orientation( $thb_image_sizes ) {
			if ( ! is_array( $thb_image_sizes ) ) {
				return;
			}
			$new_sizes = array();
			foreach ( $thb_image_sizes as $image_size ) {
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-small',
					'width'  => absint( $image_size['width'] / 2 ),
					'height' => 9999 === $image_size['height'] ? 9999 : absint( $image_size['height'] * 2 ),
					'crop'   => $image_size['crop'],
				);
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-x2',
					'width'  => $image_size['width'] * 2,
					'height' => 9999 === $image_size['height'] ? 9999 : $image_size['height'] * 2,
					'crop'   => $image_size['crop'],
				);
				if ( true === $image_size['triple'] ) {
					$new_sizes[] = array(
						'slug'   => $image_size['slug'] . '-x3',
						'width'  => $image_size['width'] * 3,
						'height' => 9999 === $image_size['height'] ? 9999 : $image_size['height'] * 3,
						'crop'   => $image_size['crop'],
					);
				}
				$new_sizes[] = array(
					'slug'   => $image_size['slug'] . '-mini',
					'width'  => 20,
					'height' => 9999 === $image_size['height'] ? 9999 : absint( ( $image_size['height'] * 20 ) / $image_size['width'] ),
					'crop'   => $image_size['crop'],
				);
			}
			return $new_sizes;
		}
		$new_sizes = thb_calculate_image_orientation( $thb_image_sizes );
		foreach ( $new_sizes as $new_size ) {
			$thb_image_sizes[] = $new_size;
		}
		return $thb_image_sizes;
	}
	public function thbDemos() {
		return array(
			array(
				'import_file_name'         => 'Issue - 01',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/01/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/01/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/01/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/01.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/',
			),
			array(
				'import_file_name'         => 'Issue - 02',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/02/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/02/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/02/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/02.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-02/',
			),
			array(
				'import_file_name'         => 'Issue - 03',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/03/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/03/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/03/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/03.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-03/',
			),
			array(
				'import_file_name'         => 'Issue - 04',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/04/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/04/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/04/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/04.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-04/',
			),
			array(
				'import_file_name'         => 'Issue - 05',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/05/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/05/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/05/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/05.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-05/',
			),
			array(
				'import_file_name'         => 'Issue - 06',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/06/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/06/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/06/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/06.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-06/',
			),
			array(
				'import_file_name'         => 'Issue - 07',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/07/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/07/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/07/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/07.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-07/',
			),
			array(
				'import_file_name'         => 'Issue - 08',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/08/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/08/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/08/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/08.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-08/',
			),
			array(
				'import_file_name'         => 'Issue - 09',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/09/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/09/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/09/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/09.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-09/',
			),
			array(
				'import_file_name'         => 'Issue - 10',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/10/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/10/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/10/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/10.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-10/',
			),
			array(
				'import_file_name'         => 'Issue - 11',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/11/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/11/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/11/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/11.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-11/',
			),
			array(
				'import_file_name'         => 'Issue - 12',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/12/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/12/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/12/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/12.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-12/',
			),
			array(
				'import_file_name'         => 'Issue - 13',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/13/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/13/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/13/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/13.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-13/',
			),
			array(
				'import_file_name'         => 'Issue - 14',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/14/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/14/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/14/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/14.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-14/',
			),
			array(
				'import_file_name'         => 'Issue - 15',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/15/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/15/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/15/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/15.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-15/',
			),
			array(
				'import_file_name'         => 'Issue - 16',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/16/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/16/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/16/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/16.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-16/',
			),
			array(
				'import_file_name'         => 'Issue - 17',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/17/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/17/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/17/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/17.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-17/',
			),
			array(
				'import_file_name'         => 'Issue - 18',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/18/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/18/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/18/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/18.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-18/',
			),
			array(
				'import_file_name'         => 'Issue - 19',
				'import_file_url'          => 'https://themes.fuelthemes.net/theme-demo-files/theissue/19/democontent.xml',
				'import_widget_file_url'   => 'https://themes.fuelthemes.net/theme-demo-files/theissue/19/widget_data.json',
				'import_theme_options_url' => 'https://themes.fuelthemes.net/theme-demo-files/theissue/19/theme-options.txt',
				'import_image'             => self::$thb_theme_directory_uri . 'assets/img/admin/demo_images/homepages/19.jpg',
				'import_demo_url'          => 'https://theissue.fuelthemes.net/issue-19/',
			),
		);
	}
	/**
	 * Inintialize Admin Pages
	 */
	public function initAdminPages() {
		global $pagenow;

		// Script and styles
		add_action( 'admin_enqueue_scripts', array( & $this, 'adminPageEnqueue' ) );

		// Menu Pages
		add_action( 'admin_menu', array( & $this, 'adminSetupMenu' ), 1 );

		// Theme Options Redirect
		if ( $pagenow ) {
			if ( 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'thb-theme-options' == wp_unslash( $_GET['page'] ) ) {
				if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
					wp_redirect( admin_url( 'themes.php?page=ot-theme-options' ) );
					die();
				}
			}
		}
		// Redirect to Main Page
		add_action( 'after_switch_theme', array( & $this, 'thb_activation_redirect' ) );

		// Ajax Option Update
		add_action( 'wp_ajax_thb_update_options', array( & $this, 'thb_update_options' ) );
		add_action( 'wp_ajax_nopriv_thb_update_options', array( & $this, 'thb_update_options' ) );

		// Admin Notices
		add_action( 'admin_notices', array( & $this, 'thb_admin_notices' ) );

		// Theme Updates
		add_action( 'admin_init', array( & $this, 'thb_theme_update' ) );

		// Plugin Update Nonce
		add_action( 'register_sidebar', array( & $this, 'thb_theme_admin_init' ) );

	}
	public function thb_admin_notices() {
		$remote_ver = get_option( 'thb_' . self::$thb_theme_slug . '_remote_ver' ) ? get_option( 'thb_' . self::$thb_theme_slug . '_remote_ver' ) : self::$thb_theme_version;
		$local_ver  = self::$thb_theme_version;

		if ( version_compare( $local_ver, $remote_ver, '<' ) ) {
			if (
				( ! self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) ) ||
				( self::$thb_product_key && ( self::$thb_product_key_expired == 1 ) )
			) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html( self::$thb_theme_name ) . '</strong> theme. Go to <a href="' . esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) . '">Product Registration</a> to enable theme updates.</p>
				</div>';
			}

			if ( ( self::$thb_product_key && ( self::$thb_product_key_expired == 0 ) ) ) {
				echo '<div class="notice is-dismissible error thb_admin_notices">
				<p>There is an update available for the <strong>' . esc_html( self::$thb_theme_name ) . '</strong> theme. <a href="' . esc_url( admin_url() ) . 'update-core.php">Update now</a>.</p>
				</div>';
			}
		}
	}
	public function thb_update_options() {
		check_ajax_referer( 'thb_register_ajax', 'security' );
		$key     = filter_input( INPUT_POST, 'key', FILTER_SANITIZE_STRING );
		$expired = filter_input( INPUT_POST, 'expired', FILTER_VALIDATE_BOOLEAN );
		update_option( 'thb_' . self::$thb_theme_slug . '_key', $key );
		update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', $expired );
		wp_die();
	}
	public function thb_theme_update() {
		add_filter( 'pre_set_site_transient_update_themes', array( & $this, 'thb_check_for_update_theme' ) );
		add_filter( 'upgrader_pre_download', array( $this, 'thb_upgradeFilter' ), 10, 4 );
	}
	public function thb_check_for_update_plugins() {
		$name = 'thb_' . self::$thb_theme_slug . '_plugin_transient';
		$data = get_transient( $name );
		if ( ! $data ) {
			$args = array(
				'timeout' => 30,
				'body'    => array(
					'item_ids'    => '242431',
					'product_key' => self::$thb_product_key,
				),
			);

			$request = wp_remote_get( self::$_instance->thb_dashboard_url( 'plugin/version' ), $args );

			$data = '';
			if ( ! is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
				$data = json_decode( wp_remote_retrieve_body( $request ) );
			}
			set_transient( $name, $data, 6 * HOUR_IN_SECONDS );
		}
		return $data;
	}
	public function thb_check_for_update_theme( $transient ) {
		$args = array(
			'timeout' => 30,
			'body'    => array(
				'theme_name'  => self::$thb_theme_name,
				'product_key' => self::$thb_product_key,
			),
		);

		$request = wp_remote_get( self::$_instance->thb_dashboard_url( 'version' ), $args );

		if ( ! is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) === 200 ) {
			$data = json_decode( wp_remote_retrieve_body( $request ) );
			update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', 0 );

			if ( isset( $data->success ) && $data->success == false ) {
				self::$thb_product_key_expired = 1;
				update_option( 'thb_' . self::$thb_theme_slug . '_key_expired', 1 );
			} else {
				if ( version_compare( self::$thb_theme_version, $data->version, '<' ) ) {
					$transient->response[ self::$thb_theme_slug ] = array(
						'new_version' => $data->version,
						'package'     => $data->download_url,
						'url'         => 'https://fuelthemes.net',
					);

					update_option( 'thb_' . self::$thb_theme_slug . '_remote_ver', $data->version );
				}
			}
		}
		return $transient;
	}
	public function thb_upgradeFilter( $reply, $package, $updater ) {
		$cond = ( ! self::$thb_product_key || ( self::$thb_product_key_expired == 1 ) );

		if ( isset( $updater->skin->theme_info ) && $updater->skin->theme_info['Name'] == self::$thb_theme_name ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'theissue' ), esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) ) );
			}
		}

		// VisualComposer
		if ( ( isset( $updater->skin->plugin ) ) && ( $updater->skin->plugin == 'js_composer/js_composer.php' ) ) {
			if ( $cond ) {
				return new WP_Error( 'no_credentials', sprintf( __( 'To receive automatic updates, registration is required. Please visit <a href="%1$s" target="_blank">Product Registration</a> to activate your theme.', 'theissue' ), esc_url( admin_url( 'admin.php?page=thb-product-registration' ) ) ) );
			}
		}
		return $reply;
	}
	public function thb_plugins_install( $item ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$installed_plugins = get_plugins();

		$item['sanitized_plugin'] = $item['name'];

		// WordPress Repository
		if ( ! $item['version'] ) {
			$item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
		}

		// Install Link
		if ( ! isset( $installed_plugins[ $item['file_path'] ] ) ) {
			$actions = array(
				'install' => sprintf(
					'<a href="%1$s" class="button" title="Install %2$s">Install Now</a>',
					esc_url(
						wp_nonce_url(
							add_query_arg(
								array(
									'page'          => urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'        => urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'tgmpa-install' => 'install-plugin',
									'return_url'    => network_admin_url( 'admin.php?page=thb-plugins' ),
								),
								TGM_Plugin_Activation::$instance->get_tgmpa_url()
							),
							'tgmpa-install',
							'tgmpa-nonce'
						)
					),
					$item['sanitized_plugin']
				),
			);
		}
		// Activate Link
		elseif ( is_plugin_inactive( $item['file_path'] ) ) {
			$actions = array(
				'activate' => sprintf(
					'<a href="%1$s" class="button button-primary" title="Activate %2$s">Activate</a>',
					esc_url(
						add_query_arg(
							array(
								'plugin'             => urlencode( $item['slug'] ),
								'plugin_name'        => urlencode( $item['sanitized_plugin'] ),
								'thb-activate'       => 'activate-plugin',
								'thb-activate-nonce' => wp_create_nonce( 'thb-activate' ),
								'return_url'         => network_admin_url( 'admin.php?page=thb-plugins' ),
							),
							admin_url( 'admin.php?page=thb-plugins' )
						)
					),
					$item['sanitized_plugin']
				),
			);
		}
		// Update Link

		elseif ( version_compare( $installed_plugins[ $item['file_path'] ]['Version'], $item['version'], '<' ) ) {
			$actions = array(
				'update' => sprintf(
					'<a href="%1$s" class="button button-update" title="Install %2$s"><span class="dashicons dashicons-update"></span> Update</a>',
					wp_nonce_url(
						add_query_arg(
							array(
								'page'         => urlencode( TGM_Plugin_Activation::$instance->menu ),
								'plugin'       => urlencode( $item['slug'] ),
								'tgmpa-update' => 'update-plugin',
								'version'      => urlencode( $item['version'] ),
								'return_url'   => network_admin_url( 'admin.php?page=thb-plugins' ),
							),
							TGM_Plugin_Activation::$instance->get_tgmpa_url()
						),
						'tgmpa-update',
						'tgmpa-nonce'
					),
					$item['sanitized_plugin']
				),
			);
		} elseif ( self::$_instance->thb_ispluginactive( $item['file_path'] ) ) {
			$actions = array(
				'deactivate' => sprintf(
					'<a href="%1$s" class="button" title="Deactivate %2$s">Deactivate</a>',
					esc_url(
						add_query_arg(
							array(
								'plugin'               => urlencode( $item['slug'] ),
								'plugin_name'          => urlencode( $item['sanitized_plugin'] ),
								'thb-deactivate'       => 'deactivate-plugin',
								'thb-deactivate-nonce' => wp_create_nonce( 'thb-deactivate' ),
							),
							admin_url( 'admin.php?page=thb-plugins' )
						)
					),
					$item['sanitized_plugin']
				),
			);
		}

		return $actions;
	}
	public function thb_theme_admin_init() {
		$get_name = filter_input( INPUT_GET, 'plugin_name', FILTER_SANITIZE_STRING );

		if ( isset( $_GET['thb-deactivate'] ) && $_GET['thb-deactivate'] == 'deactivate-plugin' ) {

			check_admin_referer( 'thb-deactivate', 'thb-deactivate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {

				if ( $plugin['Name'] == $get_name ) {
						deactivate_plugins( $plugin_name );
				}
			}
		}

		if ( isset( $_GET['thb-activate'] ) && $_GET['thb-activate'] == 'activate-plugin' ) {

			check_admin_referer( 'thb-activate', 'thb-activate-nonce' );

			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			$plugins = get_plugins();

			foreach ( $plugins as $plugin_name => $plugin ) {
				if ( $plugin['Name'] == $get_name ) {
					activate_plugin( $plugin_name );
				}
			}
		}

	}
	public function thb_activation_redirect() {
		if ( ! ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			$theissue_installed = 'theissue_installed';

			if ( false == get_option( $theissue_installed, false ) ) {
				update_option( $theissue_installed, true );
				wp_redirect( admin_url( 'admin.php?page=thb-product-registration' ) );
				die();
			}

			delete_option( $theissue_installed );
		}
	}
	public function adminPageEnqueue( $hook_suffix ) {
		wp_enqueue_script( 'select2', self::$thb_theme_directory_uri . 'assets/select2/select2.min.js', array( 'jquery' ), '4.0.5' );
		wp_enqueue_style( 'select2', self::$thb_theme_directory_uri . 'assets/select2/select2.min.css', null, '4.0.5' );

		wp_enqueue_script( 'thb-admin-meta', self::$thb_theme_directory_uri . 'assets/js/admin-meta.min.js', array( 'jquery' ), esc_attr( self::$thb_theme_version ) );

		wp_enqueue_style( 'thb-admin-css', self::$thb_theme_directory_uri . 'assets/css/admin.css', null, esc_attr( self::$thb_theme_version ) );
		wp_enqueue_style( 'thb-admin-vs-css', self::$thb_theme_directory_uri . 'assets/css/admin_vc.css', null, esc_attr( self::$thb_theme_version ) );

		if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
			wp_enqueue_style( 'vc_extra_css', self::$thb_theme_directory_uri . 'assets/css/vc_extra.css' );
			wp_enqueue_script( 'thb-admin-vc', self::$thb_theme_directory_uri . 'assets/js/admin-vc.min.js', array( 'jquery' ), esc_attr( self::$thb_theme_version ) );
		}
		if ( in_array( $hook_suffix, array( 'term.php', 'edit-tags.php' ) ) ) {
			$screen = get_current_screen();

			if ( is_object( $screen ) && 'thb-sponsors' == $screen->taxonomy ) {
				wp_enqueue_media();
			}
		}
	}
	public function adminSetupMenu() {

		// Product Registration
		add_menu_page( self::$thb_theme_name, self::$thb_theme_name, 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_product_registration' ), self::$thb_theme_directory_uri . 'assets/img/admin/fuelthemes-icon.svg', 3 );

		// Product Registration
		add_submenu_page( 'thb-product-registration', 'Registration', 'Registration', 'edit_theme_options', 'thb-product-registration', array( & $this, 'thb_product_registration' ) );

		// Main Menu Item
		add_submenu_page( 'thb-product-registration', 'Plugins', 'Plugins', 'edit_theme_options', 'thb-plugins', array( & $this, 'thb_plugins' ) );

		// Demo Import
		add_submenu_page( 'thb-product-registration', 'Demo Import', 'Demo Import', 'edit_theme_options', 'thb-demo-import', array( & $this, 'thb_demo_import' ) );

		// Theme Options
		add_submenu_page( 'thb-product-registration', 'Theme Options', 'Theme Options', 'edit_theme_options', 'thb-theme-options', '__return_false' );

	}
	public function thb_plugins() {
		get_template_part( 'inc/admin/welcome/pages/plugins' );
	}
	public function thb_product_registration() {
		get_template_part( 'inc/admin/welcome/pages/registration' );
	}
	public function thb_demo_import() {
		get_template_part( 'inc/admin/welcome/pages/demo-import' );
	}
	public function thb_ispluginactive( $value ) {
		$func = 'is_plugin' . '_active';
		return $func( $value );
	}
	/**
	 * Inintialize API
	 */
	public function thb_dashboard_url( $type = null ) {
		$url = 'https://my.fuelthemes.net';
		switch ( $type ) {
			case 'verify':
				$url .= '/api/verify';
				break;
			case 'verify-by-purchase':
				$url .= '/api/verify-by-purchase';
				break;
			case 'version':
				$url .= '/api/version';
				break;
			case 'plugin/version':
				$url .= '/api/plugin/version';
				break;
			case 'demo':
				$url .= '/api/demo';
				break;
		}
		return $url;
	}
}
// Main instance shortcut
function thb_Theme_Admin() {
	global $thb_Theme_Admin;
	return $thb_Theme_Admin;
}
Thb_Theme_Admin::instance();
