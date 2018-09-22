<?php
/**
 * Carbody functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Carbody
 */

if ( ! function_exists( 'carbody_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carbody_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Carbody, use a find and replace
	 * to change 'carbody' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'carbody', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'carbody-blog-single', 750, 575 );
	add_image_size( 'carbody-blog-full', 1140, 350 );
	add_image_size( 'carbody-blog-small', 750, 350 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top Header Menu', 'carbody' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'carbody_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	   'flex-width' => true
	) );
	
	add_editor_style( array(  get_template_directory_uri() . '/assets/css/custom-style.css') );
}
endif;
add_action( 'after_setup_theme', 'carbody_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carbody_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carbody_content_width', 640 );
}
add_action( 'after_setup_theme', 'carbody_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carbody_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'carbody' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'carbody' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'carbody' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'carbody' ),
		'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ed_element_wrapper_box"><div class="footer_service_section ed_box bottompadder60 ed_element_sorting"><section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section></div></div>',
		'before_title'  => '<div class="ed_element_wrapper"><h1 class="subheading ed_heading">',
		'after_title'   => '</h1></div>',
	) );
}
add_action( 'widgets_init', 'carbody_widgets_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//************************ start carbody Require File *************************//
require_once get_template_directory().'/vendor/cardody-functions.php';
//************************ close carbody Require File ************************//
?>
