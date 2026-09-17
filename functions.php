<?php
/**
 * Meridian theme bootstrap.
 *
 * @package Meridian
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Disallow direct access.
}

define( 'MERIDIAN_VERSION', '1.0.0' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function meridian_setup() {
	load_theme_textdomain( 'meridian', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'meridian' ),
			'footer'  => esc_html__( 'Footer Menu', 'meridian' ),
		)
	);
}
add_action( 'after_setup_theme', 'meridian_setup' );

/**
 * Sets the content width in pixels, for embeds and iframe content.
 */
function meridian_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meridian_content_width', 800 );
}
add_action( 'after_setup_theme', 'meridian_content_width', 0 );

/**
 * Registers widget areas.
 */
function meridian_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'meridian' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'meridian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer widget area number. */
				'name'          => sprintf( esc_html__( 'Footer %d', 'meridian' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Add widgets here to appear in the footer.', 'meridian' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'meridian_widgets_init' );

/**
 * Enqueues scripts and styles.
 */
function meridian_scripts() {
	wp_enqueue_style( 'meridian-style', get_stylesheet_uri(), array(), MERIDIAN_VERSION );

	wp_enqueue_script( 'meridian-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), MERIDIAN_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'meridian_scripts' );

/**
 * Theme includes.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
