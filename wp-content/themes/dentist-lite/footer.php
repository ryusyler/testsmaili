<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Dentist Lite
 */
$dentist_lite_show_socialicons 	  	= get_theme_mod('dentist_lite_show_socialicons', false);
?>

<div class="footer-wrapper"> 
   <div class="container footer"> 
   
         <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                </div>
           <?php endif; ?>
          <div class="clear"></div>
   
                
        
   
         
   
      </div>

        <div class="footer-copyright"> 
            <div class="container">            	
                <div class="design-by">
				  <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'dentist-lite');?>  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-dentist-wordpress-theme/', 'dentist-lite' ) ); ?>" target="_blank"><?php printf( __( 'Theme by %s', 'dentist-lite' ), 'Grace Themes' ); ?></a>
                  
                   <?php if( $dentist_lite_show_socialicons != ''){ ?> 
                   <div class="social-icons">                                                
                   <?php $dentist_lite_fb_link = get_theme_mod('dentist_lite_fb_link');
                    if( !empty($dentist_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($dentist_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $dentist_lite_twitt_link = get_theme_mod('dentist_lite_twitt_link');
                    if( !empty($dentist_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($dentist_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $dentist_lite_gplus_link = get_theme_mod('dentist_lite_gplus_link');
                    if( !empty($dentist_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($dentist_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $dentist_lite_linked_link = get_theme_mod('dentist_lite_linked_link');
                    if( !empty($dentist_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($dentist_lite_linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .social-icons--> 
        <?php } ?>
        
                </div>
             </div><!--end .container-->             
        </div><!--end .footer-copyright-->  
                     
     </div><!--end #footer-wrapper-->
</div><!--#end site_layout_option-->

<?php wp_footer(); ?>
</body>
</html>