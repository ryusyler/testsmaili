<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Dentist Lite
 */

get_header(); ?>

<div class="container">
  <div class="dental_page_layout">
         <section class="contentarea_for_pagelayout">               
                <?php while( have_posts() ) : the_post(); ?>                               
                    <?php get_template_part( 'content', 'page' ); ?>
                    <?php
                        //If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                        ?>                               
                <?php endwhile; ?>                     
        </section>
 <?php get_sidebar();?>      
<div class="clear"></div>
</div><!-- .dental_page_layout --> 
</div><!-- .container --> 
<?php get_footer(); ?>