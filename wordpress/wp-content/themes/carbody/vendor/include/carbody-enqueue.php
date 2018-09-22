<?php
/**
 * Enqueue scripts.
 */
function carbody_scripts() {

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'),null,true);
	wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'),null,true);
	wp_enqueue_script( 'carbody-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'carbody-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script('carbody-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'),null,true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carbody_scripts' );

/**
 * Enqueue styles.
 */
function carbody_styles() {
	wp_enqueue_style('carbody-defaultbasic', get_stylesheet_uri(), array(), '1', 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1', 'all');	
	wp_enqueue_style('carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1', 'all');	
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '1', 'all');
	wp_enqueue_style('carbody-style', get_template_directory_uri() . '/assets/css/custom-style.css', array(), '1', 'all');
}
add_action( 'wp_enqueue_scripts', 'carbody_styles' );
?>