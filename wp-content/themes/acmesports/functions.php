<?php

/** Enable use of transients */
define( 'WP_CACHE', true );

/**
 * Basic setup theme
 */
// Add suport for Post Thumbnails
 add_theme_support('post-thumbnails');

// Add suport for Widgets
add_theme_support('widgets');

// Add suport for Custom Background
add_theme_support('custom-background');

// Add suport for Custom Header
add_theme_support('custom-header');

// Add suport for Custom Logo
add_theme_support('custom-logo');

// Add support for Block Styles.
add_theme_support( 'wp-block-styles' );

// Add support for full and wide align images.
add_theme_support( 'align-wide' );

/**
 * Load and enqueue custom scripts and styles
 */
add_action('wp_enqueue_scripts','mst_custom_scripts');
function mst_custom_scripts() {

    wp_enqueue_script( 'fontawesome','https://kit.fontawesome.com/9f7a4566fb.js', array( 'jquery' ), false, true );

    $google_fonts = 'https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Roboto:wght@400;700&display=swap';
    wp_register_style( 'google-fonts', $google_fonts, '', null );
    wp_enqueue_style( 'google-fonts' );

    wp_enqueue_style( 'styles',get_template_directory_uri().'/style.css' );

}
/**
 * Register menu theme
 */
function register_mst_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header menu', 'acmesports' ),
        )
    );
}
add_action( 'init', 'register_mst_menus' );

/**
 *  Avoid WP creates additional thumbnail sizes
 */ 
function mst_disable_media_sizes( $sizes ) {
	
	unset($sizes['medium_large']); // Disabled medium-large size
	unset($sizes['1536x1536']);    // Disabled medium-large size x2
	unset($sizes['2048x2048']);    // Disabled large size x2

    return $sizes;
    
}
add_action('intermediate_image_sizes_advanced', 'mst_disable_media_sizes');


