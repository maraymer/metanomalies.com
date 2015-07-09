<?php
/**
 * Metanomalies functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

add_theme_support( 'post-thumbnails' );

/**
 * Enqueue scripts and styles.
 *
 */

function metanomalies_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'metanomalies-style', get_stylesheet_uri() );

	// Owl Carousel
	wp_enqueue_style( 'metanomalies-owl-carousel', get_template_directory_uri() . '/js/vendor/owl-carousel/owl.carousel.css', array( 'metanomalies-style' ) );
	wp_enqueue_style( 'metanomalies-owl-theme', get_template_directory_uri() . '/js/vendor/owl-carousel/owl.theme.css', array( 'metanomalies-owl-carousel' ) );
	
	// Normalize
	wp_enqueue_style( 'metanomalies-normalize', get_template_directory_uri() . '/css/normalize.min.css', array( 'metanomalies-owl-theme' ) );
	
	// Main CSS
	wp_enqueue_style( 'metanomalies-main', get_template_directory_uri() . '/css/main.css', array( 'metanomalies-normalize' ) );	
	
	// JQuery
	if( !is_admin()){
		wp_deregister_script('jquery');		
		wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"), false, '1.11.2');
		wp_enqueue_script('jquery');
	}

	// Modernizr
	wp_register_script('modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array('jquery'), false, false);
    wp_enqueue_script('modernizr');
	
	//
	// Footer Scripts
	//
	
	// Images Loaded
	wp_register_script('images_loaded', get_stylesheet_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array('jquery'), false, true);
    wp_enqueue_script('images_loaded');
    
    // Images Loaded
	wp_register_script('owl_carousel_js', get_stylesheet_directory_uri() . '/js/vendor/owl-carousel/owl.carousel.min.js', array('images_loaded'), false, true);
    wp_enqueue_script('owl_carousel_js');
	
	// Main JS
	wp_register_script('main_js', get_stylesheet_directory_uri() . '/js/main.js', array('owl_carousel_js'), false, true);
    wp_enqueue_script('main_js');
    
}
add_action( 'wp_enqueue_scripts', 'metanomalies_scripts' );

add_filter( "the_excerpt", "add_class_to_excerpt" );
function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
}
