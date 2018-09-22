<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carbody
 */

$page_sidebar_position =$page_sidebar= '';
$page_sidebar=get_theme_mod('carbody_page_sidebar_layout');
if(!empty($page_sidebar)){
	$page_sidebar_position = get_theme_mod('carbody_page_sidebar_layout');
}
else{
$page_sidebar_position = 'right';
}
get_header(); ?>
<section class="editable car_inner_banner">
	<div class="container">
		<div class="row">
			<div class="inner_banner ed_element_sorting">
				<div class="ed_element_wrapper">
					<h1 class="ed_heading heading"><?php  the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="wrapper_main_blog_section">	
	<div class="container">
		<div class="row">
		<?php if($page_sidebar_position == 'left') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">		
			<div class="wdp_sidebar_area">	
				<?php carbody_sidebar(); ?>	
			</div>		
		</div>
		<?php } if($page_sidebar_position!= 'full') { ?>
		<div class="col-lg-8 col-md-8 col-sm-12">
		<?php } else { ?>
		<div class="col-lg-12 col-md-12 col-sm-12">
		<?php } ?>
		<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
		</div><!-- #primary -->
	<?php
		if($page_sidebar_position != 'full') { ?>
		</div>
		<?php }else { ?>
		</div>
		<?php } if($page_sidebar_position == 'right') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="wdp_sidebar_area">	
				<?php carbody_sidebar(); ?>	
			</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div> 
<?php get_footer(); ?>