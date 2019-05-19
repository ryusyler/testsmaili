<?php    
/**
 *Dentist Lite Theme Customizer
 *
 * @package Dentist Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dentist_lite_customize_register( $wp_customize ) {	
	
	function dentist_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function dentist_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'dentist_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'dentist-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
		'title' => __('Site Layout Option','dentist-lite'),			
		'priority' => 1,
		'panel' => 	'dentist_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	'section'   => 'layout_option',    	 
		'label' => __('Check to Box Layout','dentist-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','dentist-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('dentist_lite_color_scheme',array(
		'default' => '#39adff',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'dentist_lite_color_scheme',array(
			'label' => __('Color Scheme','dentist-lite'),			
			'description' => __('More color options in PRO Version','dentist-lite'),
			'section' => 'colors',
			'settings' => 'dentist_lite_color_scheme'
		))
	);	
	
	// Slider Section		
	$wp_customize->add_section( 'dentist_lite_slider_options', array(
		'title' => __('Slider Section', 'dentist-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 500 pixel.','dentist-lite'), 
		'panel' => 	'dentist_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('dentist_lite_hdrslide1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dentist_lite_hdrslide1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','dentist-lite'),
		'section' => 'dentist_lite_slider_options'
	));	
	
	$wp_customize->add_setting('dentist_lite_hdrslide2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dentist_lite_hdrslide2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','dentist-lite'),
		'section' => 'dentist_lite_slider_options'
	));	
	
	$wp_customize->add_setting('dentist_lite_hdrslide3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('dentist_lite_hdrslide3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','dentist-lite'),
		'section' => 'dentist_lite_slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('dentist_lite_hdrslide_morebtn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('dentist_lite_hdrslide_morebtn',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','dentist-lite'),
		'section' => 'dentist_lite_slider_options',
		'setting' => 'dentist_lite_hdrslide_morebtn'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_dentist_lite_hdrslide',array(
		'default' => false,
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_dentist_lite_hdrslide', array(
	    'settings' => 'show_dentist_lite_hdrslide',
	    'section'   => 'dentist_lite_slider_options',
	     'label'     => __('Check To Show This Section','dentist-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // Get an Appointment Section 	
	$wp_customize->add_section('dentist_lite_appointment_section', array(
		'title' => __('Appointment Section','dentist-lite'),
		'description' => __('Select Pages from the dropdown for appointment section','dentist-lite'),
		'priority' => null,
		'panel' => 	'dentist_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('dentist_lite_appointment_page',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_appointment_page',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_appointment_section',
	));		
	
	$wp_customize->add_setting('show_dentist_lite_appointment_page',array(
		'default' => false,
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_dentist_lite_appointment_page', array(
	    'settings' => 'show_dentist_lite_appointment_page',
	    'section'   => 'dentist_lite_appointment_section',
	    'label'     => __('Check To Show This Section','dentist-lite'),
	    'type'      => 'checkbox'
	));//Show Get an Appointment Section
	 
	 
	 // Dentist four Page Services panel
	$wp_customize->add_section('dentist_lite_services_section', array(
		'title' => __('Dental Services Section','dentist-lite'),
		'description' => __('Select pages from the dropdown for dental services section','dentist-lite'),
		'priority' => null,
		'panel' => 	'dentist_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('dentist_lite_services_column1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_services_column1',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_services_section',
	));		
	
	$wp_customize->add_setting('dentist_lite_services_column2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_services_column2',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_services_section',
	));
	
	$wp_customize->add_setting('dentist_lite_services_column3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_services_column3',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_services_section',
	));
	
	$wp_customize->add_setting('dentist_lite_services_column4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_services_column4',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_services_section',
	));
	
	
	$wp_customize->add_setting('show_dentist_lite_services_section',array(
		'default' => false,
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_dentist_lite_services_section', array(
	   'settings' => 'show_dentist_lite_services_section',
	   'section'   => 'dentist_lite_services_section',
	   'label'     => __('Check To Show This Section','dentist-lite'),
	   'type'      => 'checkbox'
	 ));//Show services Section	
	 
	 
	 // Dental About Section
	$wp_customize->add_section('dentist_lite_abtussec', array(
		'title' => __('Dentist About Section','dentist-lite'),
		'description' => __('Select Pages from the dropdown for about us section','dentist-lite'),
		'priority' => null,
		'panel' => 	'dentist_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('dentist_lite_abtuspage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dentist_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'dentist_lite_abtuspage',array(
		'type' => 'dropdown-pages',			
		'section' => 'dentist_lite_abtussec',
	));		
	
	$wp_customize->add_setting('show_dentist_lite_abtuspage',array(
		'default' => false,
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_dentist_lite_abtuspage', array(
	    'settings' => 'show_dentist_lite_abtuspage',
	    'section'   => 'dentist_lite_abtussec',
	    'label'     => __('Check To Show This Section','dentist-lite'),
	    'type'      => 'checkbox'
	));//Show Dental About Section
	 
	 
	  //Footer social icons
	$wp_customize->add_section('dentist_lite_social_section',array(
		'title' => __('Footer social icons','dentist-lite'),
		'description' => __( 'Add social icons link here to display icons in footer', 'dentist-lite' ),			
		'priority' => null,
		'panel' => 	'dentist_lite_panel_area', 
	));
	
	$wp_customize->add_setting('dentist_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('dentist_lite_fb_link',array(
		'label' => __('Add facebook link here','dentist-lite'),
		'section' => 'dentist_lite_social_section',
		'setting' => 'dentist_lite_fb_link'
	));	
	
	$wp_customize->add_setting('dentist_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dentist_lite_twitt_link',array(
		'label' => __('Add twitter link here','dentist-lite'),
		'section' => 'dentist_lite_social_section',
		'setting' => 'dentist_lite_twitt_link'
	));
	
	$wp_customize->add_setting('dentist_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dentist_lite_gplus_link',array(
		'label' => __('Add google plus link here','dentist-lite'),
		'section' => 'dentist_lite_social_section',
		'setting' => 'dentist_lite_gplus_link'
	));
	
	$wp_customize->add_setting('dentist_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('dentist_lite_linked_link',array(
		'label' => __('Add linkedin link here','dentist-lite'),
		'section' => 'dentist_lite_social_section',
		'setting' => 'dentist_lite_linked_link'
	));
	
	$wp_customize->add_setting('dentist_lite_show_socialicons',array(
		'default' => false,
		'sanitize_callback' => 'dentist_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'dentist_lite_show_socialicons', array(
	   'settings' => 'dentist_lite_show_socialicons',
	   'section'   => 'dentist_lite_social_section',
	   'label'     => __('Check To show This Section','dentist-lite'),
	   'type'      => 'checkbox'
	 ));//Show footer Social icons Section 		 
	
		 
}
add_action( 'customize_register', 'dentist_lite_customize_register' );

function dentist_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .dental_blogpost_layout h2 a:hover,
        #sidebar ul li a:hover,								
        .dental_blogpost_layout h3 a:hover,					
        .recent-post h6:hover,					
        .dental_servicesbx:hover .button,									
        .postmeta a:hover,
		.social-icons a:hover,
        .button:hover,
		.denatl_abtcontentdiv h3 span,
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .dental_servicesbx:hover h3 a,		
        .header-top a:hover,	
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a       		
            { color:<?php echo esc_html( get_theme_mod('dentist_lite_color_scheme','#39adff')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .site_readmore:hover,
		.site-primemenu ul li a:hover, 
		.site-primemenu ul li.current-menu-item a,
		.site-primemenu ul li.current-menu-parent a.parent,
		.site-primemenu ul li.current-menu-item ul.sub-menu li a:hover,
		.custom_front_page .article_imagebox,
		.appointwrap,
		.dental_servicesbx .dental_thumbbx,		
		.nivo-caption .slider_morebtn,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current, 
		nav.pagination .page-numbers:hover,     		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('dentist_lite_color_scheme','#39adff')); ?>;}
			
		      		
       .siteheader
            { border-color:<?php echo esc_html( get_theme_mod('dentist_lite_color_scheme','#39adff')); ?>;}		
         	
    </style> 
<?php                           
}
         
add_action('wp_head','dentist_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dentist_lite_customize_preview_js() {
	wp_enqueue_script( 'dentist_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'dentist_lite_customize_preview_js' );