<?php
function mytheme_enqueue_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','mytheme_enqueue_scripts');


add_theme_support('post-thumbnails');

function mytheme_register_menus() {
    register_nav_menus(array('main-menu' => ('Main Menu')));
}

add_action('after_setup_theme','mytheme_register_menus');

function abi_register_portfolio_post_type() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name'=>'Portfolio',
            'singular_name' => 'Portfolio Item',
            'add_new_item' => 'Add new Portfolio Item',
            'edit_item' => 'Edit Portfolio Item',
        ),
        'public' => true,
        'has_archive' => true, 
        'rewrite' => array('slug' => 'portfolio'),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio',
    ));
}

add_action('init', 'abi_register_portfolio_post_type');

add_theme_support('post-thumbnails');
