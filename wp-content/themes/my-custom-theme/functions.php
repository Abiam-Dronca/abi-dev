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