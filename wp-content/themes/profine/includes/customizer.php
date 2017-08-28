<?php
/**
 * Profine Customizer functionality
 *
 * @subpackage Profine
 * @since Profine 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Profine 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function profine_customize_register( $wp_customize ) 
{
	
	$image_dirpath = get_template_directory_uri() . '/images/';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	//-----------------------------------------------------------------
	// PROFINE : CUSTOMIZER PANELS ------------------------------------
	//-----------------------------------------------------------------

	$wp_customize->add_panel( 'general_options', array(
		'title' 	=> __( 'General Options','profine'),
		'priority' 	=> 11,
	));
	
	$wp_customize->add_panel( 'home_temp_options', array(
		'title' 	=> __( 'Home Template Options','profine'),
		'priority' 	=> 11,
	));
		

	//-----------------------------------------------------------------
	// PROFINE : COLOR SCHEME SECTION ---------------------------------
	//-----------------------------------------------------------------
	
	// Create "Color Scheme" section in customizer 
	$wp_customize->add_section(
		'profine_color_scheme_section',
		array(
			'title'       => __('Color Setting','profine'),
			'description' => __('Please choose color setting for your site.','profine'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Set "Color Scheme" option color default value
	$wp_customize->add_setting(
		'color_scheme',
		array(
			'default' => '#e67e22',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	// Add "Color Scheme" color picker Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,'color_scheme',
			array(
				'label'    => __('Site Color Scheme','profine'),
				'section'  => 'profine_color_scheme_section',
			)
		)
	);
	
	//-----------------------------------------------------------------
	// PROFINE : HEADER SETTINGS SECTION ------------------------------
	//-----------------------------------------------------------------
	
	// Create "HEDAER SETTINGS" section in customizer 
	$wp_customize->add_section(
		'profine_header_section',
		array(
			'title'       => __('Header Settings','profine'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Mobile Menu Activation Width
	$wp_customize->add_setting( 
		'mob_menu_active', 
		array(
			'default'        => '1024',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mob_menu_active', 
		array(
			'label'       => __('Mobile Menu Activate Width','profine'),
			'description' => __('Layout width (without unit) after which mobile menu will get activated (default : 1024)','profine'),
			'section'     => 'profine_header_section',
		)
	);
	
	// Header Sticky Option
	
	$wp_customize->add_setting( 
		'header_sticky', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'profine_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'header_sticky', 
		array(
			'label'       => __('Header Sticky (On/Off)','profine'),
			'description' => __('Enable/disable header sticky feature for desktop viewers.','profine'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'profine' ),
				'off'=> __('Off', 'profine' ),
			),
			'section'     => 'profine_header_section'

		)
	);
	

	//-----------------------------------------------------------------
	// PROFINE : HEADER CONTACT SECTION -------------------------------
	//-----------------------------------------------------------------
	
	// Create "CONTACT INFORMATION" section in customizer 
	$wp_customize->add_section(
		'profine_header_contact_section',
		array(
			'title'       => __('Header Contact Info','profine'),
			'description' => __('Add contact information about your business.','profine'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Contact Title Text 
	$wp_customize->add_setting( 
		'contact_email', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_email', 
		array(
			'label'       => __('Contact Email Address','profine'),
			'section'     => 'profine_header_contact_section',
		)
	);
	
	// Contact Address
	$wp_customize->add_setting( 
		'contact_phone', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 
		'contact_phone', 
		array(
			'label'       => __('Contact Phone Number','profine'),
			'section'     => 'profine_header_contact_section',
		)
	);	
	
	//-----------------------------------------------------------------
	// PROFINE : HEADER FOLLOW ICONS SECTION --------------------------
	//-----------------------------------------------------------------
	
	// Create "Follow Icons" section in customizer 
	$wp_customize->add_section(
		'profine_follow_icons_section',
		array(
			'title'       => __('Header Follow Icons','profine'),
			'description' => __('Please add your social profile (if you want to make disable icon, please leave icon url field blank).','profine'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Facebook Icon URL 
	$wp_customize->add_setting( 
		'fbicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'fbicon', 
		array(
			'label'       => __('Facebook URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	// Twitter Icon URL 
	$wp_customize->add_setting( 
		'twicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'twicon', 
		array(
			'label'       => __('Twitter URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	// Google Plus Icon URL 
	$wp_customize->add_setting( 
		'gpicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'gpicon', 
		array(
			'label'       => __('Google+ URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	// Dribbble Icon URL 
	$wp_customize->add_setting( 
		'dribicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dribicon', 
		array(
			'label'       => __('Dribbble URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	// Linkedin Icon URL 
	$wp_customize->add_setting( 
		'linkdicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'linkdicon', 
		array(
			'label'       => __('Linkedin URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);	
	
	// Pinterest Icon URL 
	$wp_customize->add_setting( 
		'piniticon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'piniticon', 
		array(
			'label'       => __('Pinterest URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	// Flickr Icon URL 
	$wp_customize->add_setting( 
		'flickricon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'flickricon', 
		array(
			'label'       => __('Flickr URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);	
	
	// Instagram Icon URL 
	$wp_customize->add_setting( 
		'instaicon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'instaicon', 
		array(
			'label'       => __('Instagram URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);	
	
	// Youtube Icon URL 
	$wp_customize->add_setting( 
		'yticon', 
		array(
			'default'        => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'yticon', 
		array(
			'label'       => __('Youtube URL','profine'),
			'section'     => 'profine_follow_icons_section',
		)
	);
	
	//-----------------------------------------------------------------
	// PROFINE : FOOTER SECTION ---------------------------------------
	//-----------------------------------------------------------------
	
	// Create "Footer" section in customizer 
	$wp_customize->add_section(
		'profine_footer_section',
		array(
			'title'       => __('Footer Settings','profine'),
			'description' => __('Add information about footer copyright.','profine'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Footer Copyright
	$wp_customize->add_setting( 
		'profine_copyright', 
		array(
			'default'        => '',
			'sanitize_callback' => 'profine_sanitize_textarea',
		)
	);
	
	$wp_customize->add_control( 
		'profine_copyright', 
		array(
			'label'       => __('Footer Copyright Text','profine'),
			'type'        => 'textarea',
			'section'     => 'profine_footer_section',
		)
	);	
	
	//-----------------------------------------------------------------
	// PROFINE : HOME TEMPLATE OPTIONS (PANEL) ------------------------
	//-----------------------------------------------------------------
	
	//-----------------------------------------------------------------
	// PROFINE : HEADER IMAGE CONTENT SECTION -------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Image Content" section in customizer 
	$wp_customize->add_section(
		'profine_header_image_content_section',
		array(
			'title'       => __('Header Image Content','profine'),
			'description' => __('Please add content for home header image section.','profine'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Header Banner (Enable/Disable)
	$wp_customize->add_setting( 
		'banner_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'profine_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'banner_display', 
		array(
			'label'       => __('Header Image Banner (On/Off)','profine'),
			'description' => __('Enable/disable header image banner.','profine'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'profine' ),
				'off'=> __('Off', 'profine' ),
			),
			'section'     => 'profine_header_image_content_section'
		)
	);

	// Banner Title
	$wp_customize->add_setting( 
		'banner_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'banner_title', 
		array(
			'label'       => __('Header Image Title','profine'),
			'section'     => 'profine_header_image_content_section',
		)
	);
	
	// Banner Description
	$wp_customize->add_setting( 
		'banner_description', 
		array(
			'default'        => '',
			'sanitize_callback' => 'profine_sanitize_textarea',
		)
	);
	
	$wp_customize->add_control( 
		'banner_description', 
		array(
			'label'       => __('Header Image Description','profine'),
			'type'        => 'textarea',
			'section'     => 'profine_header_image_content_section',
		)
	);	
	
	// Learn More URL
	$wp_customize->add_setting( 
		'banner_more_url', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 
		'banner_more_url', 
		array(
			'label'       => __('Learn More Button URL','profine'),
			'section'     => 'profine_header_image_content_section',
		)
	);	
	
	//-----------------------------------------------------------------
	// PROFINE : HOME SERVICES CONTENT SECTION ------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Services" section in customizer 
	$wp_customize->add_section(
		'profine_home_services_section',
		array(
			'title'       => __('Home Services Section','profine'),
			'description' => __('Please add content for home service items.','profine'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Services Section (Enable/Disable)
	$wp_customize->add_setting( 
		'services_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'profine_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'services_display', 
		array(
			'label'       => __('Services Section (On/Off)','profine'),
			'description' => __('Enable/disable services section.','profine'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'profine' ),
				'off'=> __('Off', 'profine' ),
			),
			'section'     => 'profine_home_services_section'
		)
	);

	// Section Title
	$wp_customize->add_setting( 
		'home_service_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_service_title', 
		array(
			'label'       => __('Services Section Title','profine'),
			'section'     => 'profine_home_services_section',
		)
	);
	
	for ( $count = 1; $count <= 3; $count++ ) 
	{
		$wp_customize->add_setting( 'service-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'service-page-' . $count, array(
			'label'    => __( 'Select Service Page', 'profine' ),
			'section'  => 'profine_home_services_section',
			'type'     => 'dropdown-pages'
		) );
	}
	
	
	//-----------------------------------------------------------------
	// PROFINE : HOME PARALLAX BANNER SECTION -------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Parallax" section in customizer 
	$wp_customize->add_section(
		'profine_home_parallax_section',
		array(
			'title'       => __('Home Parallax Section','profine'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Parallax Section (Enable/Disable)
	$wp_customize->add_setting( 
		'parallax_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'profine_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'parallax_display', 
		array(
			'label'       => __('Parallax Section (On/Off)','profine'),
			'description' => __('Enable/disable parallax section.','profine'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'profine' ),
				'off'=> __('Off', 'profine' ),
			),
			'section'     => 'profine_home_parallax_section'
		)
	);

	// Parallax Section
	$wp_customize->add_setting( 'parallax-page', array(
		'default'           => '',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'parallax-page', array(
		'label'    => __( 'Select Parallax Page', 'profine' ),
		'section'  => 'profine_home_parallax_section',
		'type'     => 'dropdown-pages'
	) );

	
	//-----------------------------------------------------------------
	// PROFINE : HOME PROJECTS SECTION --------------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Projects" section in customizer 
	$wp_customize->add_section(
		'profine_home_projects_section',
		array(
			'title'       => __('Home Projects Section','profine'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Projects Section (Enable/Disable)
	$wp_customize->add_setting( 
		'projects_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'profine_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'projects_display', 
		array(
			'label'       => __('Projects Section (On/Off)','profine'),
			'description' => __('Enable/disable projects section.','profine'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'profine' ),
				'off'=> __('Off', 'profine' ),
			),
			'section'     => 'profine_home_projects_section'
		)
	);

	// Projects Section Title
	$wp_customize->add_setting( 
		'home_project_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_project_title', 
		array(
			'label'       => __('Projects Section Title','profine'),
			'section'     => 'profine_home_projects_section',
		)
	);
	
	for ( $count = 1; $count <= 3; $count++ ) 
	{
		$wp_customize->add_setting( 'project-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'project-page-' . $count, array(
			'label'    => __( 'Select Project Page', 'profine' ),
			'section'  => 'profine_home_projects_section',
			'type'     => 'dropdown-pages'
		) );
	}
	
	// Button "Load More" button URL
	$wp_customize->add_setting( 
		'home_project_btnurl', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_project_btnurl', 
		array(
			'label'       => __('Load More Button URL','profine'),
			'section'     => 'profine_home_projects_section',
		)
	);
	
	
}
add_action( 'customize_register', 'profine_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Profine 1.0
 */
function profine_customize_preview_js() {
	wp_enqueue_script( 'profine-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'profine_customize_preview_js' );

// Santize a Textarea Field
function profine_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

// Sanitize On-Off Field
function profine_sanitize_on_off( $input ) {
	if ( $input == 'on' ) {
        return 'on';
    } else {
        return 'off';
    }
}