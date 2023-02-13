<?php

namespace Nelio_Popups\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}//end if

function enqueue_iframe_assets() {
	if ( ! is_singular( 'nelio_popup' ) ) {
		return;
	}//end if
	nelio_popups_enqueue_style( 'block-customizations' );
	nelio_popups_enqueue_script( 'child' );

	$settings = array(
		'popupId'                 => get_the_ID(),
		'isScrollLocked'          => is_scroll_locked( get_the_ID() ),
		'resizeDelay'             => 200,
		'horizontalSizeTolerance' => 10,
		'verticalSizeTolerance'   => 20,
	);

	/**
	 * Filters the popup child settings.
	 *
	 * @param array $settings child settings.
	 *
	 * @since 1.0.20
	 */
	$settings = apply_filters( 'nelio_popups_child_settings', $settings, get_the_ID() );

	wp_add_inline_script(
		'nelio-popups-child',
		sprintf(
			'NelioPopupsChildSettings = %s;',
			wp_json_encode( $settings )
		),
		'before'
	);
}//end enqueue_iframe_assets()
add_filter( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_iframe_assets' );

function disable_admin_bar( $disabled ) {
	return ! is_singular( 'nelio_popup' ) && $disabled;
}//end disable_admin_bar()
// phpcs:ignore
add_filter( 'show_admin_bar', __NAMESPACE__ . '\disable_admin_bar', 999999 );

function disable_robots( $robots ) {
	$norobots = array(
		'noindex'  => true,
		'nofollow' => true,
	);
	return is_singular( 'nelio_popup' ) ? $norobots : $robots;
}//end disable_robots()
add_filter( 'wp_robots', __NAMESPACE__ . '\disable_robots', 999999 );

function use_custom_classic_template( $template ) {
	if ( current_theme_supports( 'block-templates' ) ) {
		return $template;
	}//end if

	if ( ! is_singular( 'nelio_popup' ) ) {
		return $template;
	}//end if

	if ( locate_template( 'single-nelio_popup.php' ) ) {
		return $template;
	}//end if

	return nelio_popups_path() . '/includes/frontend/template.php';
}//end use_custom_classic_template()
add_filter( 'template_include', __NAMESPACE__ . '\use_custom_classic_template' );

function use_custom_block_template( $templates, $_, $template_type ) {
	if ( 'wp_template' !== $template_type ) {
		return $templates;
	}//end if

	if ( ! is_singular( 'nelio_popup' ) ) {
		return $templates;
	}//end if

	$template                 = new \WP_Block_Template();
	$template->id             = 'nelio-popups/nelio-popup-template';
	$template->theme          = 'nelio-popups-plugin';
	$template->content        = '<!-- wp:post-content {"layout":{"inherit":true}} /-->';
	$template->slug           = 'nelio-popup-template';
	$template->source         = 'plugin';
	$template->type           = 'wp_template';
	$template->title          = 'Nelio Popup';
	$template->status         = 'publish';
	$template->has_theme_file = false;
	$template->is_custom      = true;

	return array( $template );
}//end use_custom_block_template()
add_filter( 'get_block_templates', __NAMESPACE__ . '\use_custom_block_template', 10, 3 );
