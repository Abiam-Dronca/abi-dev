<?php

function thb_register_sponsor_taxonomy() {

	$labels = array(
		'name'                       => esc_html_x( 'Sponsors', 'taxonomy general name', 'theissue' ),
		'singular_name'              => esc_html_x( 'Sponsor', 'taxonomy singular name', 'theissue' ),
		'search_items'               => esc_html__( 'Search Sponsors', 'theissue' ),
		'all_items'                  => esc_html__( 'All Sponsors', 'theissue' ),
		'popular_items'              => esc_html__( 'Popular Sponsors', 'theissue' ),
		'edit_item'                  => esc_html__( 'Edit Sponsor', 'theissue' ),
		'update_item'                => esc_html__( 'Update Sponsor', 'theissue' ),
		'add_new_item'               => esc_html__( 'Add New Sponsor', 'theissue' ),
		'new_item_name'              => esc_html__( 'New Sponsor Name', 'theissue' ),
		'separate_items_with_commas' => esc_html__( 'Separate sponsors with commas', 'theissue' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove sponsors', 'theissue' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used sponsors', 'theissue' ),
		'not_found'                  => esc_html__( 'No sponsors found.', 'theissue' ),
		'menu_name'                  => esc_html__( 'Sponsors', 'theissue' ),
	);

	register_taxonomy(
		'thb-sponsors',
		array( 'post' ),
		array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => true,
			'query_var'    => false,
			'public'       => false,
			'show_in_rest' => true,
			'rewrite'      => array( 'slug' => 'thb-sponsor' ),
		)
	);

	add_image_size( 'thb-sponsor-x2', 9999, 48, false );
}
add_action( 'init', 'thb_register_sponsor_taxonomy', 10 );
