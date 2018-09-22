<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carbody
 */
get_header();
$theme_sidebar_position =$theme_sidebar= '';
$theme_sidebar=get_theme_mod('carbody_sidebar_layout');
if(!empty($theme_sidebar)){
	$theme_sidebar_position = get_theme_mod('carbody_sidebar_layout');
}
else{
$theme_sidebar_position = 'right';
}
?>
<section class="editable car_inner_banner">
	<div class="container">
		<div class="row">
			<div class="inner_banner ed_element_sorting">
				<div class="ed_element_wrapper">
					<h1 class="ed_heading heading"><?php  echo esc_html__('Blog','carbody'); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="wrapper_main Blog_details_section ">
	<div class="container">
		<div class="row">
		<?php if($theme_sidebar_position == 'left') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">
		<div class="carbody_sidebar_area">
		<?php carbody_sidebar(); ?>
		</div>
		</div>
		<?php } if($theme_sidebar_position != 'full') { ?>
		<div class="col-lg-8 col-md-8 col-sm-12">
		<?php } else { ?>
		<div class="col-lg-12 col-md-12 col-sm-12">
		<?php } ?>
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_pagination(
				array(
					'prev_text' => esc_html__('PREVIOUS','carbody'),
					'next_text' => esc_html__('NEXT','carbody')
				)
			);
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		if($theme_sidebar_position != 'full') { ?>
		</div>
		<?php }else { ?>
		</div>
		<?php } if($theme_sidebar_position == 'right') { ?>
		<div class="col-lg-4 col-md-4 col-sm-12">
		<div class="carbody_sidebar_area">
		<?php carbody_sidebar(); ?>
		</div>
		</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>