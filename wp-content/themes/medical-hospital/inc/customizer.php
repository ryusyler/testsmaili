<?php
/**
 * Medical Hospital Theme Customizer
 * @package Medical Hospital
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function medical_hospital_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'medical_hospital_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'medical-hospital' ),
	    'description' => __( 'Description of what this panel does.', 'medical-hospital' ),
	) );

	//layout setting
	$wp_customize->add_section( 'medical_hospital_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'medical-hospital' ),
		'priority'   => null,
		'panel' => 'medical_hospital_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('medical_hospital_layout',array(
	        'default' => __( 'Right Sidebar', 'medical-hospital' ),
	        'sanitize_callback' => 'medical_hospital_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('medical_hospital_layout',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'medical-hospital' ),
	        'section' => 'medical_hospital_theme_layout',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','medical-hospital'),
	            'Right Sidebar' => __('Right Sidebar','medical-hospital'),
	            'One Column' => __('One Column','medical-hospital'),
	            'Three Columns' => __('Three Columns','medical-hospital'),
	            'Four Columns' => __('Four Columns','medical-hospital'),
	            'Grid Layout' => __('Grid Layout','medical-hospital')
	        ),
	    )
    );

    $font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );


	//Typography
	$wp_customize->add_section( 'medical_hospital_typography', array(
    	'title'      => __( 'Typography', 'medical-hospital' ),
		'priority'   => 30,
		'panel' => 'medical_hospital_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'medical_hospital_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_paragraph_color', array(
		'label' => __('Paragraph Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_paragraph_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'Paragraph Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('medical_hospital_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'medical_hospital_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_atag_color', array(
		'label' => __('"a" Tag Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_atag_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( '"a" Tag Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'medical_hospital_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_li_color', array(
		'label' => __('"li" Tag Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_li_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( '"li" Tag Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h1_color', array(
		'label' => __('H1 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h1_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H1 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('medical_hospital_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h1_font_size',array(
		'label'	=> __('H1 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h2_color', array(
		'label' => __('H2 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h2_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H2 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('medical_hospital_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h2_font_size',array(
		'label'	=> __('H2 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h3_color', array(
		'label' => __('H3 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h3_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H3 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('medical_hospital_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h3_font_size',array(
		'label'	=> __('H3 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h4_color', array(
		'label' => __('H4 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h4_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H4 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('medical_hospital_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h4_font_size',array(
		'label'	=> __('H4 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h5_color', array(
		'label' => __('H5 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h5_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H5 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('medical_hospital_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h5_font_size',array(
		'label'	=> __('H5 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'medical_hospital_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'medical_hospital_h6_color', array(
		'label' => __('H6 Color', 'medical-hospital'),
		'section' => 'medical_hospital_typography',
		'settings' => 'medical_hospital_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('medical_hospital_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'medical_hospital_sanitize_choices'
	));
	$wp_customize->add_control(
	    'medical_hospital_h6_font_family', array(
	    'section'  => 'medical_hospital_typography',
	    'label'    => __( 'H6 Fonts','medical-hospital'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('medical_hospital_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_h6_font_size',array(
		'label'	=> __('H6 Font Size','medical-hospital'),
		'section'	=> 'medical_hospital_typography',
		'setting'	=> 'medical_hospital_h6_font_size',
		'type'	=> 'text'
	));

    //Social Icons(topbar)
	$wp_customize->add_section('medical_hospital_social_media',array(
		'title'	=> __('Social Icon','medical-hospital'),
		'description'	=> __('Add Header Content here','medical-hospital'),
		'priority'	=> null,
		'panel' => 'medical_hospital_panel_id',
	));

	$wp_customize->add_setting('medical_hospital_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_facebook',array(
		'label'	=> __('Add Facebook link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_facebook',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_twitter',array(
		'label'	=> __('Add Twitter link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_twitter',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_google',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_google',array(
		'label'	=> __('Add Google Plus link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_google',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_pintrest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_pintrest',array(
		'label'	=> __('Add Pintrest link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_pintrest',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_insta',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_insta',array(
		'label'	=> __('Add Instagram link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_insta',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_linkdin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_linkdin',array(
		'label'	=> __('Add Linkdin link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_linkdin',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('medical_hospital_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('medical_hospital_youtube',array(
		'label'	=> __('Add Youtube link','medical-hospital'),
		'section'	=> 'medical_hospital_social_media',
		'setting'	=> 'medical_hospital_youtube',
		'type'	=> 'url'
	));


	//Topbar section
	$wp_customize->add_section('medical_hospital_topbar_icon',array(
		'title'	=> __('Topbar Section','medical-hospital'),
		'description'	=> __('Add Header Content here','medical-hospital'),
		'priority'	=> null,
		'panel' => 'medical_hospital_panel_id',
	));

	$wp_customize->add_setting('medical_hospital_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_time',array(
		'label'	=> __('Add Time','medical-hospital'),
		'section'	=> 'medical_hospital_topbar_icon',
		'setting'	=> 'medical_hospital_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('medical_hospital_time1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_time1',array(
		'label'	=> __('Add Time','medical-hospital'),
		'section'	=> 'medical_hospital_topbar_icon',
		'setting'	=> 'medical_hospital_time1',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('medical_hospital_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_phone',array(
		'label'	=> __('Add Contact','medical-hospital'),
		'section'	=> 'medical_hospital_topbar_icon',
		'setting'	=> 'medical_hospital_phone',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('medical_hospital_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_phone1',array(
		'label'	=> __('Add Contact','medical-hospital'),
		'section'	=> 'medical_hospital_topbar_icon',
		'setting'	=> 'medical_hospital_phone1',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('medical_hospital_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('medical_hospital_address',array(
		'label'	=> __('Add Address','medical-hospital'),
		'section'	=> 'medical_hospital_topbar_icon',
		'setting'	=> 'medical_hospital_address',
		'type'		=> 'text'
	));	

	//home page slider
	$wp_customize->add_section( 'medical_hospital_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'medical-hospital' ),
		'priority'   => null,
		'panel' => 'medical_hospital_panel_id'
	) );

	$wp_customize->add_setting('medical_hospital_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('medical_hospital_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','medical-hospital'),
       'section' => 'medical_hospital_slidersettings'
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'medical_hospital_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'medical_hospital_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'medical_hospital_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'medical-hospital' ),
			'section'  => 'medical_hospital_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Service
	$wp_customize->add_section('medical_hospital_services',array(
		'title'	=> __('Services Section','medical-hospital'),
		'description'	=> __('Add Services sections below.','medical-hospital'),
		'panel' => 'medical_hospital_panel_id',
	));	
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('medical_hospital_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'medical_hospital_sanitize_choices',
	));
	$wp_customize->add_control('medical_hospital_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','medical-hospital'),
		'section' => 'medical_hospital_services',
	));

	//About
	$wp_customize->add_section('medical_hospital_about1',array(
		'title'	=> __('About Section','medical-hospital'),
		'description'	=> __('Add About sections below.','medical-hospital'),
		'panel' => 'medical_hospital_panel_id',
	));

	$post_list = get_posts();
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('medical_hospital_about_setting',array(
		'sanitize_callback' => 'medical_hospital_sanitize_choices',
	));

	$wp_customize->add_control('medical_hospital_about_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','medical-hospital'),
		'section' => 'medical_hospital_about1',
	));

	//footer text
	$wp_customize->add_section('medical_hospital_footer_section',array(
		'title'	=> __('Footer Text','medical-hospital'),
		'description'	=> __('Add some text for footer like copyright etc.','medical-hospital'),
		'panel' => 'medical_hospital_panel_id'
	));
	
	$wp_customize->add_setting('medical_hospital_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('medical_hospital_text',array(
		'label'	=> __('Copyright Text','medical-hospital'),
		'section'	=> 'medical_hospital_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'medical_hospital_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Medical_Hospital_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Medical_Hospital_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Medical_Hospital_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Medical Hospital Pro', 'medical-hospital' ),
				'pro_text' => esc_html__( 'Go Pro', 'medical-hospital' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/premium-medical-wordpress-theme/')					
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'medical-hospital-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'medical-hospital-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Medical_Hospital_Customize::get_instance();