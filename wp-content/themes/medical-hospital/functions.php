<?php
/**
 * Medical Hospital functions and definitions
 * @package Medical Hospital
 */

/* Breadcrumb Begin */
function medical_hospital_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}
/* Theme Setup */
if ( ! function_exists( 'medical_hospital_setup' ) ) :

function medical_hospital_setup() {

	$GLOBALS['content_width'] = apply_filters( 'medical_hospital_content_width', 640 );
	
	load_theme_textdomain( 'medical-hospital', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('medical-hospital-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'medical-hospital' ),
		'topmenu' => __( 'Topbar Menu', 'medical-hospital' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', medical_hospital_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'medical_hospital_activation_notice' );
	}
}
endif;
add_action( 'after_setup_theme', 'medical_hospital_setup' );

// Notice after Theme Activation
function medical_hospital_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome">';
		echo '<h3>'. esc_html__( 'Greetings from Themesglance!!', 'medical-hospital' ) .'</h3>';
		echo '<p>'. esc_html__( 'A heartful thank you for choosing Themesglance. We promise to deliver only the best to you. Please proceed towards welcome section to get started.', 'medical-hospital' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=medical_hospital_guide' ) ) .'" class="button button-primary">'. esc_html__( 'About Theme', 'medical-hospital' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function medical_hospital_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'medical-hospital' ),
		'description'   => __( 'Appears on blog page sidebar', 'medical-hospital' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'medical-hospital' ),
		'description'   => __( 'Appears on page sidebar', 'medical-hospital' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'medical-hospital' ),
		'description'   => __( 'Appears on page sidebar', 'medical-hospital' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'medical-hospital' ),
		'description'   => __( 'Appears on footer', 'medical-hospital' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'medical-hospital' ),
		'description'   => __( 'Appears on footer', 'medical-hospital' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'medical-hospital' ),
		'description'   => __( 'Appears on footer', 'medical-hospital' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'medical-hospital' ),
		'description'   => __( 'Appears on footer', 'medical-hospital' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'medical_hospital_widgets_init' );

/* Theme Font URL */
function medical_hospital_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/*radio button sanitization*/
 function medical_hospital_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function medical_hospital_string_limit_words($string, $word_limit) {
$words = explode(' ', $string, ($word_limit + 1));
if(count($words) > $word_limit)
array_pop($words);
return implode(' ', $words);
}

function medical_hospital_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'medical_hospital_loop_columns');
if (!function_exists('medical_hospital_loop_columns')) {
	function medical_hospital_loop_columns() {
		return 3; // 3 products per row
	}
}

/* Theme enqueue scripts */
function medical_hospital_scripts() {
	wp_enqueue_style( 'medical-hospital-font', medical_hospital_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'medical-hospital-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'medical-hospital-style', 'rtl', 'replace' );
	wp_enqueue_style( 'medical-hospital-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );

		// Paragraph
	    $medical_hospital_paragraph_color = get_theme_mod('medical_hospital_paragraph_color', '');
	    $medical_hospital_paragraph_font_family = get_theme_mod('medical_hospital_paragraph_font_family', '');
	    $medical_hospital_paragraph_font_size = get_theme_mod('medical_hospital_paragraph_font_size', '');
	// "a" tag
		$medical_hospital_atag_color = get_theme_mod('medical_hospital_atag_color', '');
	    $medical_hospital_atag_font_family = get_theme_mod('medical_hospital_atag_font_family', '');
	// "li" tag
		$medical_hospital_li_color = get_theme_mod('medical_hospital_li_color', '');
	    $medical_hospital_li_font_family = get_theme_mod('medical_hospital_li_font_family', '');
	// H1
		$medical_hospital_h1_color = get_theme_mod('medical_hospital_h1_color', '');
	    $medical_hospital_h1_font_family = get_theme_mod('medical_hospital_h1_font_family', '');
	    $medical_hospital_h1_font_size = get_theme_mod('medical_hospital_h1_font_size', '');
	// H2
		$medical_hospital_h2_color = get_theme_mod('medical_hospital_h2_color', '');
	    $medical_hospital_h2_font_family = get_theme_mod('medical_hospital_h2_font_family', '');
	    $medical_hospital_h2_font_size = get_theme_mod('medical_hospital_h2_font_size', '');
	// H3
		$medical_hospital_h3_color = get_theme_mod('medical_hospital_h3_color', '');
	    $medical_hospital_h3_font_family = get_theme_mod('medical_hospital_h3_font_family', '');
	    $medical_hospital_h3_font_size = get_theme_mod('medical_hospital_h3_font_size', '');
	// H4
		$medical_hospital_h4_color = get_theme_mod('medical_hospital_h4_color', '');
	    $medical_hospital_h4_font_family = get_theme_mod('medical_hospital_h4_font_family', '');
	    $medical_hospital_h4_font_size = get_theme_mod('medical_hospital_h4_font_size', '');
	// H5
		$medical_hospital_h5_color = get_theme_mod('medical_hospital_h5_color', '');
	    $medical_hospital_h5_font_family = get_theme_mod('medical_hospital_h5_font_family', '');
	    $medical_hospital_h5_font_size = get_theme_mod('medical_hospital_h5_font_size', '');
	// H6
		$medical_hospital_h6_color = get_theme_mod('medical_hospital_h6_color', '');
	    $medical_hospital_h6_font_family = get_theme_mod('medical_hospital_h6_font_family', '');
	    $medical_hospital_h6_font_size = get_theme_mod('medical_hospital_h6_font_size', '');


		$custom_css ='
			p,span{
			    color:'.esc_html($medical_hospital_paragraph_color).'!important;
			    font-family: '.esc_html($medical_hospital_paragraph_font_family).';
			    font-size: '.esc_html($medical_hospital_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($medical_hospital_atag_color).'!important;
			    font-family: '.esc_html($medical_hospital_atag_font_family).';
			}
			li{
			    color:'.esc_html($medical_hospital_li_color).'!important;
			    font-family: '.esc_html($medical_hospital_li_font_family).';
			}
			h1{
			    color:'.esc_html($medical_hospital_h1_color).'!important;
			    font-family: '.esc_html($medical_hospital_h1_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($medical_hospital_h2_color).'!important;
			    font-family: '.esc_html($medical_hospital_h2_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($medical_hospital_h3_color).'!important;
			    font-family: '.esc_html($medical_hospital_h3_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($medical_hospital_h4_color).'!important;
			    font-family: '.esc_html($medical_hospital_h4_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($medical_hospital_h5_color).'!important;
			    font-family: '.esc_html($medical_hospital_h5_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($medical_hospital_h6_color).'!important;
			    font-family: '.esc_html($medical_hospital_h6_font_family).'!important;
			    font-size: '.esc_html($medical_hospital_h6_font_size).'!important;
			}

			';
		wp_add_inline_style( 'medical-hospital-basic-style',$custom_css );

	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
		
	wp_enqueue_script( 'medical-hospital-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('medical-hospital-ie', get_template_directory_uri().'/css/ie.css', array('medical-hospital-basic-style'));
	wp_style_add_data( 'medical-hospital-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'medical_hospital_scripts' );

/* Theme Credit link */
define('MEDICAL_HOSPITAL_THEMESGLANCE_PRO_THEME_URL','https://www.themesglance.com/themes/premium-medical-wordpress-theme/','medical-hospital');
define('MEDICAL_HOSPITAL_THEMESGLANCE_THEME_DOC','https://www.themesglance.com/demo/docs/medical-hospital-pro/','medical-hospital');
define('MEDICAL_HOSPITAL_THEMESGLANCE_LIVE_DEMO','https://themesglance.com/medical-hospital-pro/','medical-hospital');
define('MEDICAL_HOSPITAL_THEMESGLANCE_FREE_THEME_DOC','http://themesglance.com/demo/docs/free-medical-hospital/','medical-hospital');
define('MEDICAL_HOSPITAL_THEMESGLANCE_SUPPORT','https://wordpress.org/support/theme/medical-hospital/','medical-hospital');
define('MEDICAL_HOSPITAL_THEMESGLANCE_REVIEW','https://wordpress.org/support/theme/medical-hospital/reviews/','medical-hospital');

define('MEDICAL_HOSPITAL_SITE_URL','https://www.themesglance.com/themes/free-medical-wordpress-theme/','medical-hospital');

function medical_hospital_credit_link() {
    echo "<a href=".esc_url(MEDICAL_HOSPITAL_SITE_URL)." target='_blank'>".esc_html__('Hospital WordPress Theme','medical-hospital')."</a>";
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/getting-started/getting-started.php';