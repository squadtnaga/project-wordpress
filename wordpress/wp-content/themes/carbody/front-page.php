<?php
/**
 *  For displaying home page.
 * @package Carbody
 */
get_header(); ?>
<?php
if ( 'posts' == get_option( 'show_on_front' ) ) {
    get_template_part('index');  
    }
    else{
	?> 
	<?php
	$slider_img = $services_on_off = $portfolio_on_off = $team_on_off ='';
	$welcome_icon=$welcome_bg_image=$testimonial_bg_image= '';
	$slider_img = get_theme_mod("carbody_slider_bg_img");
	$welcome_bg_image = get_theme_mod("welcome_bg_image");
	$services_on_off = get_theme_mod('carbody_services_on_off');
	$portfolio_on_off = get_theme_mod('carbody_portfolio_on_off');
	$team_on_off = get_theme_mod('carbody_team_on_off');
	$welcome_on_off = get_theme_mod('carbody_welcome_on_off');
	$counter_on_off = get_theme_mod('carbody_counter_on_off');
	$testimonial_on_off = get_theme_mod('carbody_testimonial_on_off');
	
	if(empty($slider_img)){
		$slider_img = get_template_directory_uri().'/assets/images/banner_bg.jpg';
	}
	if(empty($welcome_bg_image)){
		$welcome_bg_image = get_theme_mod("carbody_welcome_img");
	}
	if(empty($testimonial_bg_image)){
		$testimonial_bg_image = get_theme_mod("carbody_testimonial_bg_image");
	}
	?>
	<section class="editable car_banner_wrapper" style="background-image:url(<?php echo esc_url($slider_img); ?>)">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ed_element_wrapper_box">
					<div class="car_menu_wrapper ed_box ed_element_sorting">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<?php if((has_custom_logo())): 
							the_custom_logo();
						else: ?>	
							<div class="site-title">						
							<?php if ( is_front_page() && is_home() ) : ?>							
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php endif; 
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($description) ; ?></p>
							
							<?php endif; ?>
							</div>
					<?php	endif; ?>
						<button type="button" class="navbar-toggle collapsed center3" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only"><?php echo esc_html__('Toggle navigation','carbody'); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<nav class="navbar">
								
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<div class="car_menu nav navbar-nav">
										<?php wp_nav_menu( array( 'theme_location'  => 'menu-1','depth' => 4 ,'menu_class' => 'ed_element_sorting','container' => false,'fallback_cb'=>'carbody_menu_editor')); ?>
									</div>
								</div>
							</nav>
						</div>
						<?php if(get_theme_mod("carbody_header_button_text") != ''): ?>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="ed_element_wrapper">
								<a href="<?php echo esc_url(get_theme_mod("carbody_header_button_link")); ?>" class="ed_button car_btn"><?php echo esc_html(get_theme_mod("carbody_header_button_text")); ?></a>
							</div>
						</div>
						<?php endif;?>
					</div>
				</div>				
				<?php $carbody_slider_cat = get_theme_mod('carbody_slider_cat');
				if($carbody_slider_cat){
					wp_reset_postdata();
					$carbody_slider_args = array(
						'post_type' => 'post',
						'order' => 'DESC',
						'posts_per_page' => -1,
						'post_status' => 'publish',
						'category_name' => $carbody_slider_cat
					);
					$carbody_slider_query = new WP_Query($carbody_slider_args);
					if($carbody_slider_query->have_posts()): ?>
				<div class="car_banner_slider text-center">
					<div class="ed_element_wrapper_slider">
						<div class="owl-carousel owl-theme ed_slider"  id="banner_slider" data_number_of_item="1" data_show_bullets="true" data_responsive_item="1,1,1" data_slides_margin="0">
						<?php 
							while($carbody_slider_query->have_posts()): $carbody_slider_query->the_post();
							$carbody_slider_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-slider-image');
							$carbody_slider_image_url = $carbody_slider_image_src[0];
								if(get_the_title() || get_the_content() || $carbody_slider_image_url){ ?>
							<div class="item">
								<div class="car_slides ed_element_sorting">
									<?php if(get_the_content()){?>
									<div class="paragraph">
										<?php the_content();?>
									</div>
									<?php }?>
								</div>
							</div>
							<?php } ?>						
							<?php endwhile; ?>									
						</div>	
					</div>
				</div>
				 <?php 
				endif;
				} ?>				
			</div>
		</div>
	</section>
	<?php if($services_on_off == 'on'){ ?>
	<section class="editable car_service_wrapper textcenter">
		<div class="container">
			<div class="row ed_element_sorting">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0 ed_element_sorting">
					<div class="ed_element_wrapper bottompadder30">
						<?php if(get_theme_mod("carbody_services_title") != ''): ?>
							<h1 class="heading"><?php echo esc_html(get_theme_mod("carbody_services_title")); ?></h1>
						<?php endif;?>
					</div>
					<?php if(get_theme_mod("carbody_services_subtitle") != ''): ?>
					<div class="ed_element_wrapper bottompadder70">
						<p class="ed_paragraph paragraph_italic"><?php echo esc_html(get_theme_mod("carbody_services_subtitle")); ?></p>
					</div>
					<?php endif;?>
				</div>
				<?php $carbody_services_cat = get_theme_mod('carbody_services_cat');
						if($carbody_services_cat){
							wp_reset_postdata();
							$carbody_services_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_services_cat
							);
							$carbody_services_query = new WP_Query($carbody_services_args);
							if($carbody_services_query->have_posts()):  
							while($carbody_services_query->have_posts()): $carbody_services_query->the_post();
							$carbody_services_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-services-image');
							$carbody_services_image_url = $carbody_services_image_src[0];
								
							if(get_the_title() || get_the_content() || $carbody_services_image_url){ ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_element_wrapper_box">
									<div class="car_service_section ed_box text-center content_responsive ed_element_sorting">
										<?php if (has_post_thumbnail()): ?>
										<div class="ed_element_wrapper bottompadder10">
											<img src="<?php echo esc_url($carbody_services_image_url);?>" width="75" height="75" alt="" class="e_image">
										</div>
										<?php endif;?>
										<?php if(get_the_title()):?>
										<div class="ed_element_wrapper">
											<h2 class="ed_subheading subheading"><?php the_title();?></h2>
										</div>
										<?php endif;?>
										<?php if(get_the_content()): ?>
										<div class="ed_element_wrapper">
											<p class="ed_paragraph paragraph"> <?php the_content();?></p>
										</div>
										<?php endif;?>
									</div>
								</div>
							<?php } ?>						
							<?php endwhile; ?>		
						<?php 
							endif;
						} ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<?php if($portfolio_on_off == 'on'){ ?> 
	<section class="editable car_portfolio_wrapper textcenter">
		<div class="container">
			<div class="row ed_element_sorting">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0 ed_element_sorting">
					<div class="ed_element_wrapper bottompadder30">
						<?php if(get_theme_mod("carbody_portfolio_title") != ''): ?>
							<h1 class="heading"><?php echo esc_html(get_theme_mod("carbody_portfolio_title")); ?></h1>
						<?php endif;?>
					</div>
					<?php if(get_theme_mod("carbody_portfolio_subtitle") != ''): ?>
					<div class="ed_element_wrapper bottompadder70">
						<p class="ed_paragraph paragraph_italic"><?php echo esc_html(get_theme_mod("carbody_portfolio_subtitle")); ?></p>
					</div>
					<?php endif;?>
				</div>	
				<?php $carbody_portfolio_cat = get_theme_mod('carbody_portfolio_cat');
						if($carbody_portfolio_cat){
							wp_reset_postdata();
							$carbody_portfolio_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_portfolio_cat
							);
							$carbody_portfolio_query = new WP_Query($carbody_portfolio_args);
							if($carbody_portfolio_query->have_posts()):  
							while($carbody_portfolio_query->have_posts()): $carbody_portfolio_query->the_post();
							$carbody_portfolio_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-portfolio-image');
							$carbody_portfolio_image_url = $carbody_portfolio_image_src[0];										
							if(get_the_title() || get_the_content() || $carbody_portfolio_image_url){ ?>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="portfolio_img ed_element_sorting">
									<div class="ed_element_wrapper_box">
										<div class="portfolio_section ed_box">
											<div class="ed_element_wrapper">
												<img src="<?php echo esc_url($carbody_portfolio_image_url);?>" width="370" height="245" alt="" class="ed_image img-responsive displayblock">
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>						
					<?php endwhile; ?>																			
					<?php 
					endif;
					} ?>					
			</div>
		</div>
	</section>
	<?php } ?>
	<?php if($team_on_off == 'on'){ ?> 
	<section class="editable car_client_wrapper">
		<div class="container">
			<div class="row">
						
				<?php $carbody_team_cat = get_theme_mod('carbody_team_cat');
						if($carbody_team_cat){
							wp_reset_postdata();
							$carbody_team_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_team_cat
							);
							$carbody_team_query = new WP_Query($carbody_team_args);
							if($carbody_team_query->have_posts()):  ?> 
						<div class="ed_element_wrapper_slider">
							<div class="owl-carousel owl-theme ed_slider"  id="clint_slider" data_number_of_item="4" data_show_bullets="true" data_responsive_item="1,2,3" data_slides_margin="30">
								<?php 
									while($carbody_team_query->have_posts()): $carbody_team_query->the_post();
									$carbody_team_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-team-image');
									$carbody_team_image_url = $carbody_team_image_src[0];
										
									if(get_the_title() || get_the_content() || $carbody_team_image_url){ ?>
										<div class="item">
											<div class="client_slider">
												<div class="client_slide text-center ed_element_sorting">
													<?php if (has_post_thumbnail()): ?>
													<div class="ed_element_wrapper bottompadder10">
														<img src="<?php echo esc_url($carbody_team_image_url);?>" width="270" height="230" alt="" class="ed_image img_responsive">
													</div>
													<?php endif;?>
													<?php if(get_the_title()):?>
													<div class="ed_element_wrapper">
														<h2 class="ed_subheading subheading"><?php the_title();?></h2>
													</div>
													<?php endif;?>
													<?php if(get_the_content()): ?>
													<div class="ed_element_wrapper bottompadder10">
														<h2 class="ed_paragraph paragraph"><?php the_content();?></h2>
													</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									<?php } ?>						
									<?php endwhile; ?>														
							</div>
						</div>
					<?php 
					endif;
					} ?>					
			</div>
		</div>
	</section>
	<?php } ?>
	<?php if($welcome_on_off == 'on'){ ?> 
	<section class="editable car_about_wrapper textcenter center1"  style="background-image:url(<?php echo esc_url($welcome_bg_image); ?>)">
		<div class="container">
			<div class="row ed_element_sorting">			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="row">
					<?php $carbody_welcome_cat = get_theme_mod('carbody_welcome_cat');
						if($carbody_welcome_cat){
							wp_reset_postdata();
							$carbody_welcome_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_welcome_cat
							);
							$carbody_welcome_query = new WP_Query($carbody_welcome_args);
							if($carbody_welcome_query->have_posts()):  
							while($carbody_welcome_query->have_posts()): $carbody_welcome_query->the_post();
							$carbody_welcome_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-welcome-image');
							$carbody_welcome_image_url = $carbody_welcome_image_src[0];										
							if(get_the_title() || get_the_content() || $carbody_welcome_image_url){ ?>
								<div class="car_about_section ed_element_sorting">
									<?php if(get_the_title()):?>
									<div class="ed_element_wrapper">
										<h2 class="ed_heading heading"><?php the_title();?></h2>
									</div>
									<?php endif;?>							
									<?php if(get_the_content()): ?>
									<div class="ed_element_wrapper bottompadder20">
										<p class="ed_paragraph paragraph_italic"><?php the_content();?></p>
									</div>
									<?php endif;?>						
								</div>
							<?php } ?>						
						<?php endwhile; ?>																			
						<?php 
						endif;
						} ?>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<!--section5 end-->
<?php if($counter_on_off == 'on'){ ?>
	<!--section6 start-->
	<section class="editable car_award_wrapper">
		<div class="container">
			<div class="row ed_element_sorting">
				<?php $carbody_counter_cat = get_theme_mod('carbody_counter_cat');
						if($carbody_counter_cat){
							wp_reset_postdata();
							$carbody_counter_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_counter_cat
							);
							$carbody_counter_query = new WP_Query($carbody_counter_args);
							if($carbody_counter_query->have_posts()):  
							while($carbody_counter_query->have_posts()): $carbody_counter_query->the_post();
							$carbody_counter_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-counter-image');
							$carbody_counter_image_url = $carbody_counter_image_src[0];										
							if(get_the_title() || get_the_content() || $carbody_counter_image_url){ ?>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ed_element_wrapper_box">
								<div class="car_award_section ed_box ed_element_sorting text-center">
									<?php if(get_the_content()): ?>
									<div class="ed_element_wrapper bottompadder20">
										<h1 class="ed_heading heading"><?php the_content();?></h1>
									</div>
									<?php endif;?>
									<?php if(get_the_title()):?>
									<div class="ed_element_wrapper">
										<p class="ed_paragraph subheading"><?php the_title();?></p>
									</div>
									<?php endif;?>	
								</div>
							</div>
						<?php } ?>						
						<?php endwhile; ?>																			
						<?php 
						endif;
						} ?>					
			</div>
		</div>
	</section>
	<!--section6 end-->
	<?php } ?>
	<!--section7 start-->
	<?php if($testimonial_on_off == 'on'){ ?>
	<section class="editable car_customer_wrapper" style="background-image:url(<?php echo esc_url($testimonial_bg_image); ?>)">
		<div class="container">
			<div class="row ed_element_sorting">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0 ed_element_sorting">
					<?php if(get_theme_mod("carbody_testimonial_title") != ''): ?>
					<div class="ed_element_wrapper bottompadder30">
						<h1 class="ed_heading heading"><?php echo esc_html(get_theme_mod("carbody_testimonial_title")); ?></h1>
					</div>
					<?php endif;?>
				</div>
				<?php $carbody_testimonial_cat = get_theme_mod('carbody_testimonial_cat');
						if($carbody_testimonial_cat){
							wp_reset_postdata();
							$carbody_testimonial_args = array(
								'post_type' => 'post',
								'order' => 'DESC',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'category_name' => $carbody_testimonial_cat
							);
							$carbody_testimonial_query = new WP_Query($carbody_testimonial_args);
							if($carbody_testimonial_query->have_posts()):  ?>
							<div class="car_testimonial_slider ed_element_wrapper_slider">
								<div class="owl-carousel owl-theme ed_slider"  id="testimonial_slider" data_number_of_item="1" data_show_bullets="true" data_responsive_item="1,1,1" data_slides_margin="0">	
									<?php while($carbody_testimonial_query->have_posts()): $carbody_testimonial_query->the_post();
									$carbody_testimonial_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'carbody-testimonial-image');
									$carbody_testimonial_image_url = $carbody_testimonial_image_src[0];										
									if(get_the_title() || get_the_content() || $carbody_testimonial_image_url){ ?>
									<div class="item">
										<div class="car_customer_section ed_element_sorting text-center">									
											<?php if(get_the_content()): ?>
											<div class="ed_element_wrapper bottompadder10">
												<p class="ed_paragraph paragraph"><?php echo esc_html(get_the_content());?></p>
											</div>
											<?php endif;?>	
											<?php if(get_the_title()):?>
											<div class="ed_element_wrapper">
												<h2 class="ed_heading heading"><?php the_title();?></h2>
											</div>
											<?php endif;?>													
										</div>
									</div>
									<?php } ?>						
									<?php endwhile; ?>	
								</div>
							</div>
						<?php 
					endif;
					} ?>		
			</div>
		</div>
	</section>
	<?php } ?>
	<!--section7 end-->		
	<?php } ?>
<?php get_footer(); ?>