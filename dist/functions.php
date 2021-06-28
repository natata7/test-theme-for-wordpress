<?php

add_theme_support( 'custom-logo' );

function mytheme_custom_logo_setup() {
    $defaults = array(
        'height'               => 28,
        'width'                => 106,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'mytheme_custom_logo_setup' );

function mytheme_assets() {
  wp_enqueue_style( 
    'mytheme-stylesheet', get_stylesheet_directory_uri() . '/style.css', 
    array(), 
    time(), 
    'all' );
  wp_enqueue_script( 
		'mytheme-js', 
		get_stylesheet_directory_uri() . '/js/main.js',
		array( 'jquery' ), 
		time(), 
		true 
	);
}
add_action('wp_enqueue_scripts', 'mytheme_assets');