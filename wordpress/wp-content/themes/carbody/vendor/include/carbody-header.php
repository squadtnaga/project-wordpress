<section class="editable car_banner_wrapper inner_menu_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="car_menu_wrapper ed_element_sorting">
					<div class="col-lg-2 col-md-2 col-sm-9 col-xs-6">
						<?php if((has_custom_logo())): 
							the_custom_logo();
						else:?>
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
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-2">
						<nav class="navbar">
							
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<div class="car_menu nav navbar-nav">
									 <?php wp_nav_menu( array( 'theme_location'  => 'menu-1','depth' => 4 ,'menu_class' => 'ed_element_sorting','container' => false,'fallback_cb'=>'carbody_menu_editor')); ?>
								</div>
							</div>
						</nav>
					</div>
					<?php if(get_theme_mod("carbody_header_button_text") != ''): ?>
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
						<div class="ed_element_wrapper">
							<a href="<?php echo esc_url(get_theme_mod("carbody_header_button_link")); ?>" class="ed_button car_btn"><?php echo esc_html(get_theme_mod("carbody_header_button_text")); ?></a>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>
