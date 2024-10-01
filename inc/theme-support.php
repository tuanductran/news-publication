<?php

/*
@package newspub
*/

/**
 * Enable excerpt function to pages
 *
 * @return void
 */
function npub_excerpt_init() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'npub_excerpt_init' );

/**
 * Add Theme Supports.
 *
 * @return void
 */
function npub_cafter_setup_theme_callback() {

	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false,
	);

	add_theme_support( 'custom-logo', $defaults );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus(
		array(
			'top-menu'     => __( 'Top Menu', 'news-publication' ),
			'footer-menu1' => __( 'Footer Menu1', 'news-publication' ),
			'footer-menu2' => __( 'Footer Menu2', 'news-publication' ),
		)
	);

	add_theme_support( 'title-tag' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	add_theme_support( 'html5' );

	add_theme_support( 'align-wide' );

	global $content_width;
	if ( ! isset( $content_width ) ){
		$content_width = 760;
	}

}
add_action( 'after_setup_theme', 'npub_cafter_setup_theme_callback' );

// Custom thumbnail sizes for blog posts.
add_theme_support( 'post-thumbnails' );
add_image_size( 'smallest', 255, 230, true );
add_image_size( 'small', 350, 230, true );
add_image_size( 'smedium', 445, 292, true );
add_image_size( 'medium', 530, 305, true );
add_image_size( 'large', 667, 305, true );
add_image_size( 'one-col', 720, 405, true );
add_image_size( 'featured-l', 805, 355, true );
add_image_size( 'grande', 1046, 697, true );
add_image_size( 'npub-tiny', 100, 100, true );
add_image_size( 'npub-small', 255, 143, true );
add_image_size( 'npub-small-square', 255, 231, true );
add_image_size( 'npub-large', 821, 462, true );
add_image_size( 'npub-medium', 350, 231, true );

