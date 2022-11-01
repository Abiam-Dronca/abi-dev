<?php

function thb_register_reaction_taxonomy() {

	$labels = array(
		'name'                       => esc_html_x( 'Reactions', 'taxonomy general name', 'theissue' ),
		'singular_name'              => esc_html_x( 'Reaction', 'taxonomy singular name', 'theissue' ),
		'search_items'               => esc_html__( 'Search Reactions', 'theissue' ),
		'all_items'                  => esc_html__( 'All Reactions', 'theissue' ),
		'popular_items'              => esc_html__( 'Popular Reactions', 'theissue' ),
		'edit_item'                  => esc_html__( 'Edit Reaction', 'theissue' ),
		'update_item'                => esc_html__( 'Update Reaction', 'theissue' ),
		'add_new_item'               => esc_html__( 'Add New Reaction', 'theissue' ),
		'new_item_name'              => esc_html__( 'New Reaction Name', 'theissue' ),
		'separate_items_with_commas' => esc_html__( 'Separate reactions with commas', 'theissue' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove reactions', 'theissue' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used reactions', 'theissue' ),
		'not_found'                  => esc_html__( 'No reactions found.', 'theissue' ),
		'menu_name'                  => esc_html__( 'Reactions', 'theissue' ),
	);

	register_taxonomy(
		'thb-reactions',
		array( 'post' ),
		array(
			'hierarchical'       => false,
			'labels'             => $labels,
			'show_ui'            => true,
			'query_var'          => false,
			'public'             => false,
			'show_in_quick_edit' => false,
			'meta_box_cb'        => false,
			'rewrite'            => array(
				'slug' => 'thb-reaction',
			),
		)
	);
}
add_action( 'init', 'thb_register_reaction_taxonomy', 10 );
