<?php
/*********=============== Sidebar ============*****************/
if(!function_exists('carbody_sidebar')){
	function carbody_sidebar(){
		get_sidebar();
	}
}
/*********=============== add a menu start ============****************/
if(!function_exists('carbody_menu_editor')){
 function carbody_menu_editor($args){
	    if ( ! current_user_can( 'edit_theme_options' ) ){
		    return;
	   	}
        // see wp-includes/nav-menu-template.php for available arguments
        extract( $args );
        $link = $link_before
              . '<a href="' .esc_url(admin_url( 'nav-menus.php' )) . '">' . $before . esc_html__('Add a menu','carbody') . $after . '</a>'
             . $link_after;
        // We have a list
       if ( FALSE !== stripos( $items_wrap, '<ul' )
        
	       or FALSE !== stripos( $items_wrap, '<ol' )
		)
		{
			$link = "<li>$link</li>";
		}
		$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
		if ( ! empty ( $container ) ){
			$output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
		}
		if ( $echo ){
			echo "$output";
		}
		return $output;
	}
}
/*********========= start edit archive count ======*********/
add_filter('get_archives_link', 'carbody_archive_count');
function carbody_archive_count($links) {
$links = str_replace('</a>&nbsp;(', '&nbsp;<span>(', $links);
$links = str_replace(')', ')</span></a>', $links);
return $links;
} 

add_filter('get_archives_link', 'carbody_archive_count1');
function carbody_archive_count1($links) {
$links = str_replace(')</span></a></option>', ')</option>', $links);
return $links;
}
/*********========= close edit archive count ======*********/
/*********========= edit category ======*********/
add_filter('wp_list_categories', 'carbody_cat_count');
function carbody_cat_count($links) {
$links = str_replace('</a> (', ' <span>(', $links);
$links = str_replace(')', ')</span></a>', $links);
return $links;
}

// Load Google fonts
function carbody_google_fonts_url() {
    $fonts_url = '';
    $Alegreya = _x( 'on', 'Alegreya font: on or off', 'carbody' );   

    if (  'off' !== $Alegreya  )
    {
        $font_families = array();
		
		if ('off' !== $Alegreya) {
            $font_families[] = 'Alegreya:400,400i,700,700i,900,900i';
        }

        $query_args = array(
            'family' => rawurlencode(implode('|', $font_families )),
            'subset' => rawurlencode('latin,latin-ext')
        );
        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }
    return esc_url_raw($fonts_url); 
}

// Google fonts
function carbody_enqueue_googlefonts() {
    wp_enqueue_style( 'carbody-googlefonts', carbody_google_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'carbody_enqueue_googlefonts');

// Footer copyrigth
if ( ! function_exists( 'carbody_footer_copyright_text' ) ) {

	/**
	 * Displays the footer copyright text information
	 */
	function carbody_footer_copyright_text() { 
		$site_link = '<span>' . get_bloginfo( 'name', 'display' ) . '</span>';

		$wp_link = '<span>' . esc_html__( 'WordPress', 'carbody' ) . '</span>';
         
		$tg_link =  '<a href="'.esc_url( 'http://pixelnx.com/wp/demo/carbody-wordpress-theme' ).'" target="_blank" title="'.esc_attr__( 'PixelNX', 'carbody' ).'" rel="designer"><span>'.esc_html__( 'PixelNX', 'carbody') .'</span></a>';
		
		$default_footer_value = sprintf( __( 'Copyright %1$s %2$s. All rights reserved.', 'carbody' ), date_i18n( __( 'Y', 'carbody' ) ), $site_link ).' '.sprintf( __( 'Theme: %1$s by %2$s.', 'carbody' ), 'carbody', $tg_link ); 

		$carbody_footer_copyright = '<p class="ed_paragraph paragraph">'.$default_footer_value.'</p>';
		echo $carbody_footer_copyright; 
	}
} 
add_action( 'carbody_footer_copyright_text', 'carbody_footer_copyright_text', 10 );

function carbody_Category_list(){
    $carbody_cat_lists = get_categories(
        array(
            'hide_empty' => '0',
            'exclude' => '1',
        )
    );
    $carbody_cat_array = array();
    $carbody_cat_array[''] = esc_html__('--Choose--','carbody');
    foreach($carbody_cat_lists as $carbody_cat_list){
        $carbody_cat_array[$carbody_cat_list->slug] = $carbody_cat_list->name;
    }
    return $carbody_cat_array;
}

/*********************** Require File Start **********************************/
get_template_part( 'vendor/include/carbody','enqueue' ); 
/************************* Require File End ************************************/
