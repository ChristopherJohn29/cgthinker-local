<?php
#-----------------------------------------------------------------#
#------------- PROFINE : WP-ENQUEUE STYLES & SCRIPTS -------------#
#-----------------------------------------------------------------#

#-----------------------------------------------------------------#
# FRONT SCRIPT : REGISTER/ENQUEUE JS
#-----------------------------------------------------------------#

if( !function_exists('profine_front_enqueue_scripts') ){
    add_action('wp_enqueue_scripts', 'profine_front_enqueue_scripts');
	
	function profine_front_enqueue_scripts() 
	{	
		// Enqueue 
		wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', TRUE);
		wp_enqueue_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ), '1.0.4', TRUE);
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.4', TRUE);
		wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '1.8.1', TRUE);
		wp_enqueue_script('profine-customjs', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', TRUE);
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Customizer Options
		$header_sticky    = get_theme_mod('header_sticky');
		$mob_menu_active  = get_theme_mod('mob_menu_active');
		$header_sticky    = (!empty($header_sticky)) ? $header_sticky : 'on';
		$mob_menu_active  = (!empty($mob_menu_active)) ? esc_attr($mob_menu_active) : '1024';
		
		wp_register_script( 'profine-customjs', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', TRUE);

		// Localize the script with Customizer data
		$translation_array = array(
			'activewidth' => $mob_menu_active,
			'header_sticky' => $header_sticky
		);
		wp_localize_script( 'profine-customjs', 'object_name', $translation_array );

		// Enqueued script with localized data.
		wp_enqueue_script( 'profine-customjs' );
		
	}
}

#-----------------------------------------------------------------#
# FRONT STYLES : REGISTER/ENQUEUE CSS
#-----------------------------------------------------------------#

if( !function_exists('profine_front_enqueue_styles') ){
	add_action('wp_enqueue_scripts', 'profine_front_enqueue_styles');
	
	function profine_front_enqueue_styles() {	
		// Enqueue 
		wp_enqueue_style('profine-google-opensans-font','//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700','', '1.0.0');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.css", '', '4.2.0');
		wp_enqueue_style('profine-style', get_stylesheet_uri());
		wp_enqueue_style('profine-responsive', get_template_directory_uri() . "/css/bootstrap.css", '', '3.3.5');
	}
}

#-----------------------------------------------------------------#
# APPEND REQUIRED INFO IN SITE HEAD SECTION
#-----------------------------------------------------------------#
function profine_head_info() 
{
	if(!is_admin()) 
	{
		include_once(get_template_directory().'/includes/profine-custom-css.php');
	}
}
add_action('wp_head', 'profine_head_info');
?>