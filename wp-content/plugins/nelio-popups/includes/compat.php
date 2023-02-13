<?php

namespace Nelio_Popups\Compat;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}//end if

function sitemap_exclude_post_type( $excluded, $post_type ) {
	return $excluded || 'nelio_popup' === $post_type;
}//end sitemap_exclude_post_type()
add_filter( 'wpseo_sitemap_exclude_post_type', __NAMESPACE__ . '\sitemap_exclude_post_type', 10, 2 );
