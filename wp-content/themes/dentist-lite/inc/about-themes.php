<?php
/**
 *Dentist Lite About Theme
 *
 * @package Dentist Lite
 */

//about theme info
add_action( 'admin_menu', 'dentist_lite_abouttheme' );
function dentist_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'dentist-lite'), __('About Theme Info', 'dentist-lite'), 'edit_theme_options', 'dentist_lite_guide', 'dentist_lite_mostrar_guide');   
} 

//Info of the theme
function dentist_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'dentist-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Dentist Lite is a free dental WordPress theme. It is perfect for medical ,dental, spa, yoga, health care, hospital and any oher flat business. It is user friendly customizer options. it is Compatible with WooCommerce, Nextgen gallery ,Contact Form 7 and many WordPress popular plugins.','dentist-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'dentist-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'dentist-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'dentist-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'dentist-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'dentist-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'dentist-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'dentist-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'dentist-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'dentist-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( DENTIST_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'dentist-lite'); ?></a> | 
            <a href="<?php echo esc_url( DENTIST_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'dentist-lite'); ?></a> | 
            <a href="<?php echo esc_url( DENTIST_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'dentist-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>