<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package AdThrive Ads
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Cleaning up site.js file if it was downloaded
require_once ABSPATH . 'wp-admin/includes/file.php';
if ( \WP_Filesystem() ) {
	global $wp_filesystem;
	$filename = ADTHRIVE_ADS_PATH . 'site.js';

	if ( $wp_filesystem->is_file( $filename ) ) {
		$wp_filesystem->delete( $filename );
	}
}
