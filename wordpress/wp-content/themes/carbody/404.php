<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Carbody
 */
get_header(); ?>
<div class="error_wrapper">
	<div class="container">
		<div class="row">			
			<div class="col-lg-8 col-md-8  col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0 col-sm-12 col-xs-12">
				<div class="error_heading">
					<h1><?php echo esc_html__("404","carbody")?></h1>
					<h2><?php echo esc_html__("Oops!!!Page Not Found!","carbody")?></h2>
					<h3><?php echo esc_html__( 'This Page is not exist or some other issues, please go to home', 'carbody' ); ?></h3><br>								
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html('Back To Home', 'carbody'); ?></a><br>
				</div>
			</div>			
		</div>
	</div>
</div>
<?php get_footer(); ?>