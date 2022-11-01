<?php function thb_page_menu( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'thb_page_menu', $atts );
	extract( $atts );

	$out = '';
	ob_start();

	wp_nav_menu(
		array(
			'menu'       => $menu,
			'depth'      => 1,
			'container'  => false,
			'menu_class' => 'thb-page-menu style1',
		)
	);

	$out = ob_get_clean();
	return $out;
}
thb_add_short( 'thb_page_menu', 'thb_page_menu' );
