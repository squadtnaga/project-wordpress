<?php
/**
 * Carbody Theme Customizer
 *
 * @package Carbody
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function carbody_customize_register( $wp_customize ) {
	
	$carbody_cat_list = carbody_Category_list();
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	//___ start header setting___//
    $wp_customize->add_section(
        'carbody_header_button_setting',
        array(
            'title'         => __('Header Button Setting', 'carbody'),
			'priority'      => 21,
        )
    );
    $wp_customize->add_setting(
        'carbody_header_button_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'carbody_header_button_text',
        array(
            'label'         => __( 'Header Button', 'carbody' ),
			'description' => __( 'Provide button text to be displayed on header section.', 'carbody' ), 
            'section'       => 'carbody_header_button_setting',
            'type'          => 'text', 
			'input_attrs'   => array( 'placeholder' => 'Button Text' )
        )
    );
	 $wp_customize->add_setting(
        'carbody_header_button_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'carbody_header_button_link',
        array(
            'label'         => __( 'Header Button Link', 'carbody' ),
			'description' => __( 'Provide button link to be set on header button.', 'carbody' ), 
            'section'       => 'carbody_header_button_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://example.com' )
        )
    );
	
	
	
	//___ add a panel front page setting ___//
	$wp_customize->add_panel( 'Carbody-Front-Page-Setting', array(
		'title'       => __( 'Front page Setting', 'carbody' ),
		'priority'      => 22,
	) );
	//___ slider setting___//
	$wp_customize->add_section(
        'carbody_slider',
        array(
            'title'         => __('Slider Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	//background image
	$wp_customize->add_setting(
		'carbody_slider_bg_img',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carbody_slider_bg_img',
			array(
			   'label'          => __( 'Background Image', 'carbody' ),
			   'description' => __( 'Add background image for slider section.', 'carbody' ),   
			   'type'           => 'image',
			    'priority' => 1,
			   'section'        => 'carbody_slider',
			)
		)
	);
	 //slider category
     	$wp_customize->add_setting(
		'carbody_slider_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_slider_cat',
		array(
        'label' => esc_html__('Slider Category','carbody'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_slider'
		)
	);
	// Services Setting
	$wp_customize->add_section(
        'carbody_services_setting',
        array(
            'title'         => __('Services Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	$wp_customize->add_setting("carbody_services_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_services_on_off",
			array(
			'type' => 'radio',
			 'priority' => 1,
			'label' => __("Services On/Off", "carbody"),
			'description' => __( 'On and Off setting for services section', 'carbody' ), 
			'section' => 'carbody_services_setting',
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	
	$wp_customize->add_setting(
		'carbody_services_title',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'carbody_services_title',
		array(
			'label'         => __( 'Services Heading', 'carbody' ),
			 'description' => __( 'Provide the main heading to be displayed on top of services section.', 'carbody' ), 
			'section'       => 'carbody_services_setting',
			 'priority' => 2,
			'type'          => 'text',    
		)
	);
	$wp_customize->add_setting(
		'carbody_services_subtitle',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'carbody_services_subtitle',
		array(
			'label'         => __( 'Services  Subheading', 'carbody' ),
			'description' => __( 'Provide short description about your services section.', 'carbody' ), 
			'section'       => 'carbody_services_setting',
			 'priority' => 3,
			'type'          => 'textarea',    
		)
	);
	 //services category
     	$wp_customize->add_setting(
		'carbody_services_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_services_cat',
		array(
        'label' => esc_html__('Services Category','carbody'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_services_setting'
		)
	);
	// portfolio Setting
	$wp_customize->add_section(
        'carbody_portfolio_setting',
        array(
            'title'         => __('Portfolio Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	$wp_customize->add_setting("carbody_portfolio_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_portfolio_on_off",
			array(
			'type' => 'radio',
			 'priority' => 1,
			'label' => __("Portfolio On/Off", "carbody"),
			'description' => __( 'On and Off setting for portfolio section', 'carbody' ), 
			'section' => 'carbody_portfolio_setting',
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	$wp_customize->add_setting(
		'carbody_portfolio_title',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'carbody_portfolio_title',
		array(
			'label'         => __( 'Portfolio Heading', 'carbody' ),
			'description' => __( 'Provide the main heading to be displayed on top of portfolios section', 'carbody' ), 
			'section'       => 'carbody_portfolio_setting',
			 'priority' => 2,
			'type'          => 'text',    
		)
	);
	$wp_customize->add_setting(
		'carbody_portfolio_subtitle',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'carbody_portfolio_subtitle',
		array(
			'label'         => __( 'Portfolio  Subheading', 'carbody' ),
			'description' => __( 'Provide short description about your portfolio section.', 'carbody' ), 
			'section'       => 'carbody_portfolio_setting',
			 'priority' => 3,
			'type'          => 'textarea',    
		)
	);
	 //portfolio category
     	$wp_customize->add_setting(
		'carbody_portfolio_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_portfolio_cat',
		array(
        'label' => esc_html__('Portfolio Category','carbody'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_portfolio_setting'
		)
	);
	// Team Setting
	$wp_customize->add_section(
        'carbody_team_setting',
        array(
            'title'         => __('Team Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	$wp_customize->add_setting("carbody_team_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_team_on_off",
			array(
			'type' => 'radio',
			'label' => __("Team On/Off", "carbody"),
			'description' => __( 'On and Off setting for team section', 'carbody' ), 
			'section' => 'carbody_team_setting',
			  'priority' => 1,
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	
	 //team category
     	$wp_customize->add_setting(
		'carbody_team_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_team_cat',
		array(
        'label' => esc_html__('Team Category','carbody'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_team_setting'
		)
	);
	
	// Welcome Setting
	$wp_customize->add_section(
        'carbody_welcome_setting',
        array(
            'title'         => __('Welcome Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	//welcome switch
	$wp_customize->add_setting("carbody_welcome_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_welcome_on_off",
			array(
			'type' => 'radio',
			 'priority' => 1,
			'label' => __("Welcome On/Off", "carbody"),
			'description' => __( 'On and Off setting for welcome section', 'carbody' ), 
			'section' => 'carbody_welcome_setting',
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	//welcome image
	$wp_customize->add_setting(
		'carbody_welcome_img',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carbody_welcome_img',
			array(
			   'label'          => __( 'Welcome Image', 'carbody' ),
			   'type'           => 'image',
			    'priority' => 2,
			   'section'        => 'carbody_welcome_setting',
			)
		)
	);
	 //welcome category
     	$wp_customize->add_setting(
		'carbody_welcome_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_welcome_cat',
		array(
        'label' => esc_html__('Welcome Category','carbody'),
        'priority' => 3,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_welcome_setting'
		)
	);
	// Counter Setting
	$wp_customize->add_section(
        'carbody_counter_setting',
        array(
            'title'         => __('Counter Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	//counter switch
	$wp_customize->add_setting("carbody_counter_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_counter_on_off",
			array(
			'type' => 'radio',
			 'priority' => 1,
			'label' => __("Counter On/Off", "carbody"),
			'description' => __( 'On and Off setting for counter section', 'carbody' ), 
			'section' => 'carbody_counter_setting',
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	 //counter category
     	$wp_customize->add_setting(
		'carbody_counter_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_counter_cat',
		array(
        'label' => esc_html__('Counter Category','carbody'),
        'priority' => 2,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_counter_setting'
		)
	);
	
// Testimonial Setting
	$wp_customize->add_section(
        'carbody_testimonial_setting',
        array(
            'title'         => __('Testimonial Setting', 'carbody'),
			'panel' => 'Carbody-Front-Page-Setting',
        )
    );
	//testimonial switch
	$wp_customize->add_setting("carbody_testimonial_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_testimonial_on_off",
			array(
			'type' => 'radio',
			  'priority' => 1,
			'label' => __("Testimonial On/Off", "carbody"),
			'description' => __( 'On and Off setting for testimonial section', 'carbody' ), 
			'section' => 'carbody_testimonial_setting',
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	//Testimonial Bg image
	$wp_customize->add_setting(
		'carbody_testimonial_bg_image',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carbody_testimonial_bg_image',
			array(
			   'label'          => __( 'Background Image', 'carbody' ),
			   'description' => __( 'Add image to be display in background of testimonial section.', 'carbody' ), 
			     'priority' => 2,
			   'type'           => 'image',
			   'section'        => 'carbody_testimonial_setting',
			)
		)
	);
	$wp_customize->add_setting(
		'carbody_testimonial_title',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'carbody_testimonial_title',
		array(
			'label'         => __( 'Testimonial Heading', 'carbody' ),
			 'description' => __( 'Provide the main heading to be displayed on top of testimonial section.', 'carbody' ), 
			'section'       => 'carbody_testimonial_setting',
			 'priority' => 3,
			'type'          => 'text',    
		)
	);
	 //testimonial category
     	$wp_customize->add_setting(
		'carbody_testimonial_cat',
		array(
        'default' => '',
        'sanitize_callback' => 'carbody_sanitize_post_cat_list',
		)
	);
		$wp_customize->add_control(
		'carbody_testimonial_cat',
		array(
        'label' => esc_html__('Testimonial Category','carbody'),
        'priority' => 4,
        'type' => 'select',
        'choices' => $carbody_cat_list,
        'section' => 'carbody_testimonial_setting'
		)
	);

	//Sidebar Position
	$wp_customize->add_section(
        'carbody_sidebar_position',
        array(
            'title'         => __('Sidebar Position', 'carbody'),
            'priority'      => 21,
        )
    );
	$wp_customize->add_setting(
        'carbody_sidebar_layout',
        array(
            'default'           => 'right',
			'transport' => 'refresh',
			'sanitize_callback' => 'carbody_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'carbody_sidebar_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Theme Sidebar Position', 'carbody'),
            'section'   => 'carbody_sidebar_position',
			'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'carbody'),      
            'choices'   => array(
                'full'           => __( 'Full', 'carbody' ),
                'left'         => __( 'Left', 'carbody' ),
                'right'    => __( 'Right', 'carbody' )
            ),
        )
    ); 
	$wp_customize->add_setting(
        'carbody_page_sidebar_layout',
        array(
            'default'           => 'right',
			'transport' => 'refresh',
			'sanitize_callback' => 'carbody_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'carbody_page_sidebar_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Page Sidebar Position', 'carbody'),
            'section'   => 'carbody_sidebar_position',
            'priority'  => 11,
			'description'   => __('This option work for pages.', 'carbody'), 
            'choices'   => array(
                'full'           => __( 'Full', 'carbody' ),
                'left'         => __( 'Left', 'carbody' ),
                'right'    => __( 'Right', 'carbody' )
            ),
        )
    ); 
	
	//___ start footer setting___//
    $wp_customize->add_section(
        'carbody_footer_setting',
        array(
            'title'         => __('Footer Widget Setting', 'carbody'),
			'priority'      => 22,
        )
    );
	$wp_customize->add_setting("carbody_footer_on_off", array(
			"default" => 'off',
			"transport" => "refresh",
			'sanitize_callback' => 'carbody_radio_sanitize_row',
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"carbody_footer_on_off",
			array(
			'type' => 'radio',
			'label' => __("Footer Setting area On/Off", "carbody"),
			'section' => 'carbody_footer_setting',
			'description' => __( 'On and off setting for first footer area.', 'carbody' ),   
			'choices' => array(
				'on' => __('On', 'carbody'),
				'off' => __('Off', 'carbody'),
			),
		)
	));	
	$wp_customize->add_setting(
		'carbody_footer_logo_img',
		array(
			'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carbody_footer_logo_img',
			array(
			   'label'          => __( 'Logo Image', 'carbody' ),
			   'description' => __( 'Add footer logo image to be displayed on footer section.', 'carbody' ),   
			   'type'           => 'image',
			   'section'        => 'carbody_footer_setting',
			)
		)
	);
    $wp_customize->add_setting(
        'carbody_footer_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_title',
        array(
            'label'         => __( 'Title', 'carbody' ),
			'description' => __( 'Provide  text to be displayed on footer section.', 'carbody' ), 
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
        )
    );
	 $wp_customize->add_setting(
        'carbody_footer_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_content',
        array(
            'label'         => __( 'Content', 'carbody' ),
			'description' => __( 'Provide content to be set on footer section.', 'carbody' ), 
            'section'       => 'carbody_footer_setting',
            'type'          => 'textarea',    
        )
    );
	//Footer facebook
    $wp_customize->add_setting( 
        'carbody_footer_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_facebook',
        array(
            'label'         => __( 'Facebook Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://facebook.com' )
        )
    );
	//Footer twitter
    $wp_customize->add_setting(
        'carbody_footer_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_twitter',
        array(
            'label'         => __( 'Twitter Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://twitter.com' )
        )
    );
	//Footer google
    $wp_customize->add_setting(
        'carbody_footer_google',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_google',
        array(
            'label'         => __( 'Google+ Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://google.com' )
        )
    );
	//Footer linkedin
    $wp_customize->add_setting(
        'carbody_footer_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_linkedin',
        array(
            'label'         => __( 'Linkedin Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://linkedin.com' )
        )
    );
	//Footer pinterest
    $wp_customize->add_setting(
        'carbody_footer_pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_pinterest',
        array(
            'label'         => __( 'Pinterest Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://pintrest.com' )
        )
    );
	//Footer youtube
    $wp_customize->add_setting(
        'carbody_footer_youtube',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'carbody_footer_youtube',
        array(
            'label'         => __( 'Youtube Link', 'carbody' ),
            'section'       => 'carbody_footer_setting',
            'type'          => 'text',    
			'input_attrs'   => array( 'placeholder' => 'https://youtube.com' )
        )
    );
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'carbody_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'carbody_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'carbody_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function carbody_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function carbody_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function carbody_customize_preview_js() {
	wp_enqueue_script( 'carbody-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'carbody_customize_preview_js' );

function carbody_radio_sanitize_row($input) {
  $valid_keys = array(
		'on' => 'On',
		'off' => 'Off',
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
	 return $input;
  } else {
	 return '';
  }
}
function carbody_sanitize_layout( $value ) {
    if ( ! in_array( $value, array( 'full', 'left', 'right' ) ) )
        $value = 'right';
 
    return $value;
}
/** Customizer Category List Sanitize **/
function carbody_sanitize_post_cat_list($input){
    $carbody_cat_list = carbody_Category_list();
    if(array_key_exists($input,$carbody_cat_list)){
        return $input;
    }
    else{
        return '';
    }
}