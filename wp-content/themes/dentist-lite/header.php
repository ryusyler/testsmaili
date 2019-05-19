<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Dentist Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_dentist_lite_hdrslide 	  		        = get_theme_mod('show_dentist_lite_hdrslide', false);
$show_dentist_lite_services_section 	  	    = get_theme_mod('show_dentist_lite_services_section', false);
$show_dentist_lite_appointment_page	            = get_theme_mod('show_dentist_lite_appointment_page', false);
$show_dentist_lite_abtuspage	                = get_theme_mod('show_dentist_lite_abtuspage', false);
?>
<div id="site_layout_option" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_dentist_lite_hdrslide)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="siteheader <?php echo $inner_cls; ?>">       
<div class="container">    
     <div class="logo">
        <?php dentist_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
     <div class="hdr_logright">
       <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','dentist-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="site-primemenu">                   
         <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
       </div><!--.site-primemenu -->
     </div><!--.hdr_logright -->
<div class="clear"></div>  

</div><!-- container --> 
</div><!--.siteheader --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_dentist_lite_hdrslide != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('dentist_lite_hdrslide'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('dentist_lite_hdrslide'.$i,true));
	  }
	}
?> 
<div class="slider_wrap">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/defaultslide.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>	
    <?php
    $dentist_lite_hdrslide_morebtn = get_theme_mod('dentist_lite_hdrslide_morebtn');
    if( !empty($dentist_lite_hdrslide_morebtn) ){ ?>
    	<a class="slider_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($dentist_lite_hdrslide_morebtn); ?></a>
    <?php } ?>       
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .slider_wrap -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {

if( $show_dentist_lite_appointment_page != ''){ ?>  
 <div class="appointwrap">
         <div class="container">                                    
				<?php 
                if( get_theme_mod('dentist_lite_appointment_page',false)) {     
                $queryvar = new WP_Query('page_id='.absint(get_theme_mod('dentist_lite_appointment_page',true)) );			
                    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                  
                     <h3><?php the_title(); ?></h3>   
                      <?php the_excerpt(); ?>
                      <a class="appbutton" href="<?php the_permalink(); ?>"><?php esc_html_e('Get an Appointment','dentist-lite'); ?></a> 
                    </div>                                      
                    <?php endwhile;
                     wp_reset_postdata(); ?>                                    
                    <?php } ?>                                 
			<div class="clear"></div>      
       </div><!-- .container -->
    </div>
<?php } ?>


<?php if( $show_dentist_lite_services_section != ''){ ?>  
<section id="dental_services_wrap">
<div class="container">                      
<?php 
for($n=1; $n<=4; $n++) {    
if( get_theme_mod('dentist_lite_services_column'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('dentist_lite_services_column'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
    
	<div class="dental_servicesbx <?php if($n % 4 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="dental_thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="denatl_contentbx">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<?php the_excerpt(); ?>	
		 <a class="site_readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','dentist-lite'); ?></a>                                  
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- #dental_services_wrap-->                      	      
<?php } ?>

<?php if( $show_dentist_lite_abtuspage != ''){ ?>  
<section id="dental_about_wrapper">
<div class="container">                               
<?php 
if( get_theme_mod('dentist_lite_abtuspage',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('dentist_lite_abtuspage',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
   
     <div class="dental_abtthumb"><?php the_post_thumbnail();?></div>                              
     <div class="denatl_abtcontentdiv">   
     <h3><?php the_title(); ?></h3>   
     <?php the_content();  ?>
      <a class="site_readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','dentist-lite'); ?></a> 
    </div>                                      
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #dental_about_wrapper-->
<?php } ?>
<?php } ?>