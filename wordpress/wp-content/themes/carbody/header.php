<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carbody
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11','carbody');?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( !is_front_page() || is_home()) {	
	get_template_part( 'vendor/include/carbody','header' );
} ?>
