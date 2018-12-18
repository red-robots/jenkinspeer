<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="primary" class="clear">
    <div id="content" role="main">
      <?php get_template_part('inc/tax-subnav-single'); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div id="proj-page-left" class="portfolio-info">
          <h1 class="main-proj-title"><?php the_field('first_title'); ?></h1>
          <?php if(get_field('second_title')!="") { ?>
              <div class="sec-proj-title"><?php the_field('second_title'); ?></div>
          <?php } ?>
          <?php if(get_field('third_title')!="") { ?>
              <div class="third-proj-title"><?php the_field('third_title'); ?></div>
          <?php } ?>
          
          
          <div class="single-proj-content">
            <div class="entry-content">
              <?php the_content(); ?>
             </div><!-- entry content -->
          </div><!-- single project content -->
          
          <?php if(get_field('features')!="") : // if features is not empty ?>
           <div class="entry-content">
          <?php the_field('features'); ?>
           </div><!-- entry content -->

        <?php endif; ?>
        </div>
      <?php endwhile;  endif; ?>
      <?php
        wp_reset_query();
        wp_reset_postdata();
      ?>

        <div id="single-proj-right" class="rightdiv">

          <!-- Gallery -->
          <div class="gallery-wrapper cf">
            <div id="flexslider2" class="flexslider largeview cf">
              <?php  if(get_field('project_gallery')) { ?>
              <ul class="slides">
                <?php $j=1; while(the_repeater_field('project_gallery')): ?>
                  <?php $image = wp_get_attachment_image_src(get_sub_field('project_images'), 'lightbox'); ?>
                  <li data-id="ggimage<?php echo $j?>" class="<?php echo ($j==1) ? 'flex-active-slide':''?>">
                    <a class="colorbox" rel="gal" href="<?php echo $image[0]; ?>"><img src="<?php echo $image[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="" /></a>
                  </li>
                <?php $j++; endwhile; ?>
              </ul>
              <?php } ?>  
            </div>

              <div id="flexcarousel" class="flexslider cf">
                <?php  if(get_field('project_gallery')) { ?>
                  <ul class="slides">
                    <?php $k=1; while(the_repeater_field('project_gallery')): ?>
                      <?php $thumb = wp_get_attachment_image_src(get_sub_field('project_images'), 'gallery-thumbnail'); ?>
                      <li data-index="<?php echo $k-1?>" class="<?php echo ($k==1) ? 'active-slide':''?>">
                        <img src="<?php echo $thumb[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="" />
                      </li>
                    <?php $k++; endwhile; ?>
                  </ul>
                <?php } ?>  
              </div>
          </div>

          <?php get_template_part('inc/next-project-query'); ?>
        </div>

    </div>
</div>


<?php get_footer(); ?>