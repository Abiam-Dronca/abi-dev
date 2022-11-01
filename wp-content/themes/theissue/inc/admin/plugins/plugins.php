<?php

if ( ! is_admin() ) {
	return;
}

require Thb_Theme_Admin::$thb_theme_directory . 'inc/admin/plugins/class-tgm-plugin-activation.php';

function thb_register_required_plugins() {
	$data = thb_Theme_Admin()->thb_check_for_update_plugins();

	if ( isset( $data->plugins ) ) {
		foreach ( $data->plugins as $plugin ) {
			switch ( $plugin->plugin_name ) {
				case 'WPBakery Visual Composer':
				case 'WPBakery Page Builder':
					$slug = 'js_composer';
					break;
			}
			$plugins[] = array(
				'name'               => $plugin->plugin_name,
				'slug'               => $slug,
				'source'             => $plugin->download_url,
				'force_activation'   => false,
				'force_deactivation' => false,
				'version'            => $plugin->version,
				'required'           => true,
				'external_url'       => '',
				'image_url'          => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/plugins/' . esc_attr( $slug ) . '.png',
			);
		}
	} else {
		$plugins[] = array(
			'name'               => 'WPBakery Visual Composer',
			'slug'               => 'js_composer',
			'source'             => get_template_directory() . '/inc/admin/plugins/plugins/codecanyon-NbzyMfMB-visual-composer-page-builder-for-wordpress-wordpress-plugin.zip',
			'version'            => '6.6.0',
			'force_activation'   => false,
			'force_deactivation' => false,
			'required'           => true,
			'image_url'          => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/plugins/js_composer.png',
		);
	}
	$plugins[] = array(
		'name'               => esc_html__( 'WooCommerce', 'theissue' ),
		'slug'               => 'woocommerce',
		'required'           => true,
		'force_activation'   => false,
		'force_deactivation' => false,
		'image_url'          => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/plugins/woo.png',
	);
	$plugins[] = array(
		'name'               => esc_html__( 'The Issue - Required Plugin', 'theissue' ),
		'slug'               => 'theissue-plugin',
		'source'             => get_template_directory() . '/inc/plugins/theissue-plugin.zip',
		'version'            => '1.4.1',
		'required'           => true,
		'force_activation'   => false,
		'force_deactivation' => false,
		'image_url'          => Thb_Theme_Admin::$thb_theme_directory_uri . 'assets/img/admin/plugins/theissue.png',
	);
	$plugins[] = array(
		'name'               => esc_html__( 'MailChimp for WordPress', 'theissue' ),
		'slug'               => 'mailchimp-for-wp',
		'required'           => false,
		'force_activation'   => false,
		'force_deactivation' => false,
	);
	$plugins[] = array(
		'name'               => esc_html__( 'Contact Form 7', 'theissue' ),
		'slug'               => 'contact-form-7',
		'required'           => false,
		'force_activation'   => false,
		'force_deactivation' => false,
	);

	$config = array(
		'id'           => 'thb',
		'domain'       => 'theissue',
		'default_path' => '',
		'parent_slug'  => 'themes.php',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'return' => esc_html__( 'Return to Theme Plugins', 'theissue' ),
		),
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'thb_register_required_plugins' );
