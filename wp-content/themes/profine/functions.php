<?php
/**
 * Profine functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
#-----------------------------------------------------------------#
# INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
#-----------------------------------------------------------------#
include_once(get_template_directory() . '/functions/init.php');
include_once(get_template_directory() . '/includes/customizer.php');

#-----------------------------------------------------------------#
# REGISTER SIDEBARS
#-----------------------------------------------------------------#
function profine_register_sidebar() 
{
	register_sidebar(array(
		'name'          => __( 'Blog Sidebar', 'profine' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Add widgets here to appear in your blog sidebar.', 'profine' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Page Sidebar', 'profine' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Add widgets here to appear in your page sidebar.', 'profine' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => 'Footer Sidebar',
		'id'            => 'footer-sidebar',
		'description'   => __( 'Add widgets here to appear in footer sidebar.', 'profine' ),
		'before_widget' => '<li id="%1$s" class="col-md-3 col-sm-3 col-xs-12 widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));	
}
add_action( 'widgets_init', 'profine_register_sidebar' );


#-----------------------------------------------------------------#
# THEME CONFIGURATION
#-----------------------------------------------------------------#
function profine_theme_config() {
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
	// Load text domain
	load_theme_textdomain('profine');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	
	// Setup the WordPress custom logo feature.
	add_theme_support( 'custom-logo', array(
	   'width'       => 170,
	   'height'      => 40,
	   'flex-width' => true,
	));
	
	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header' );
	
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'profine_blog_post_thumbnail',675,300,true );    // profine_blog_post_thumbnail size
	add_image_size( 'profine_home_project_thumbnail',370,245,true ); // profine_home_project_thumbnail size
	
	// this theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'profine' ),
	));
}
add_action( 'after_setup_theme', 'profine_theme_config' ); 

#-----------------------------------------------------------------#
# FROM HERE YOU CAN ADD YOUR OWN FUNCTIONS
#-----------------------------------------------------------------#
?>