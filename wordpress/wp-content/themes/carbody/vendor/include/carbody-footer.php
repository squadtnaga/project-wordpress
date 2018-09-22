<?php
$footer_firstarea_on_off = $footer_logo_img = $topbar_facebook = $topbar_twitter = $topbar_google = $topbar_linkedin = $topbar_pinterest = $topbar_youtube = '';
$footer_firstarea_on_off = get_theme_mod('carbody_footer_on_off');
$footer_logo_img = get_theme_mod("carbody_footer_logo_img");
$footer_facebook = get_theme_mod('carbody_footer_facebook');
$footer_twitter = get_theme_mod('carbody_footer_twitter');
$footer_google = get_theme_mod('carbody_footer_google');
$footer_linkedin = get_theme_mod('carbody_footer_linkedin');
$footer_pinterest = get_theme_mod('carbody_footer_pinterest');
$footer_youtube = get_theme_mod('carbody_footer_youtube');
?>
<section class="editable car_footer_wrapper textcenter">
	<div class="container">
		<div class="row ed_element_sorting">
			<div class="car_footer_Section ed_element_sorting">
				<?php if($footer_firstarea_on_off == 'on'){ ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ed_element_wrapper_box">
					<div class="footer_section ed_box bottompadder60 ed_element_sorting text-center">
						<?php if(!empty($footer_logo_img)){ ?>
						<div class="ed_element_wrapper bottompadder20">
							<img src="<?php echo esc_url($footer_logo_img); ?>" width="153" height="83" alt="footer logo img" class="ed_image">
						</div>
						<?php } ?>
						<?php if(get_theme_mod("carbody_footer_title") != ''): ?>
						<div class="ed_element_wrapper">
							<h3 class="subheading ed_subheading"><?php echo esc_html(get_theme_mod("carbody_footer_title")); ?></h3>
						</div>
						<?php endif;?>
						<?php if(get_theme_mod("carbody_footer_content") != ''): ?>
						<div class="ed_element_wrapper">
							<p class="paragraph ed_paragraph"><?php echo esc_html(get_theme_mod("carbody_footer_content")); ?></p>
						</div>
						<?php endif;?>
						<ul class="ed_element_sorting">
							<?php if(isset($footer_facebook) && !empty($footer_facebook)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_facebook).'" class="ed_img_anchor"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>'; 
							}if(isset($footer_twitter) && !empty($footer_twitter)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_twitter).'" class="ed_img_anchor"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>'; 
							}if(isset($footer_google) && !empty($footer_google)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_google).'" class="ed_img_anchor"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>'; 
							}if(isset($footer_linkedin) && !empty($footer_linkedin)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_linkedin).'" class="ed_img_anchor"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>'; 
							}if(isset($footer_pinterest) && !empty($footer_pinterest)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_pinterest).'" class="ed_img_anchor"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>'; 
							}if(isset($footer_youtube) && !empty($footer_youtube)){
							echo '<li class="ed_element_wrapper"><a href="'.esc_url($footer_youtube).'" class="ed_img_anchor"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';
							}
							?>
						</ul>
					</div>
				</div>
				<?php } ?>
				
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				<?php } ?>
				
			</div>
			<div class="car_copyright">
				<div class="ed_element_wrapper">
					<?php do_action( 'carbody_footer_copyright_text' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>