<?php
if ( ! is_admin() ) {
	return;
}

function thb_ocdi_import_files() {
	return thb_Theme_Admin()->thbDemos();
}
add_filter( 'pt-ocdi/import_files', 'thb_ocdi_import_files' );

function thb_ocdi_before_widgets_import( $selected_import_files ) {
	update_option( 'sidebars_widgets', array() );
	$options_import_data = $selected_import_files;
	$options             = unserialize( ot_decode( $options_import_data ) );

	/* get settings array */
	$settings = get_option( ot_settings_id() );

	/* has options */
	if ( is_array( $options ) ) {

		/* validate options */
		if ( is_array( $settings ) ) {

			foreach ( $settings['settings'] as $setting ) {

				if ( isset( $options[ $setting['id'] ] ) ) {

					$content = ot_stripslashes( $options[ $setting['id'] ] );

					$options[ $setting['id'] ] = ot_validate_setting( $content, $setting['type'], $setting['id'] );

				}
			}
		}

		/* update the option tree array */
		update_option( ot_options_id(), $options );
	}
}
add_action( 'pt-ocdi/before_widgets_import', 'thb_ocdi_before_widgets_import', 2, 2 );

function thb_ocdi_after_import( $selected_import ) {

	$args = array(
		'body' => array(
			'theme' => Thb_Theme_Admin::$thb_theme_name,
			'demo'  => $selected_import['import_file_name'],
		),
	);

	$url = Thb_Theme_Admin()->thb_dashboard_url( 'demo' );

	$response = wp_remote_post( $url, $args );

	// Set Pages.
	update_option( 'show_on_front', 'page' );

	$home      = get_page_by_title( 'Home' );
	$myaccount = get_page_by_title( 'My Account' );
	$shop      = get_page_by_title( 'Shop' );
	$cart      = get_page_by_title( 'Cart' );
	$checkout  = get_page_by_title( 'Checkout' );

	// Set Pages.
	update_option( 'page_on_front', $home->ID );

	// Set WC Pages.
	update_option( 'woocommerce_myaccount_page_id', $myaccount->ID );
	update_option( 'woocommerce_shop_page_id', $shop->ID );
	update_option( 'woocommerce_cart_page_id', $cart->ID );
	update_option( 'woocommerce_checkout_page_id', $checkout->ID );

	/* Set Menus */
	$navigation = get_term_by( 'name', 'navigation', 'nav_menu' );
	$secondary  = get_term_by( 'name', 'footer', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'nav-menu'       => $navigation->term_id,
			'secondary-menu' => $secondary->term_id,
		)
	);
}
add_action( 'pt-ocdi/after_import', 'thb_ocdi_after_import' );

/* Disable Branding */
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/** Remove Plugin Page */
function thb_ocdi_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = false;

		return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'thb_ocdi_plugin_page_setup' );

// Disable Image Regeneration.
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
