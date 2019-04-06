<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<?php get_template_part('inc/tax-subnav-single'); ?>
    

        <div id="proj-page-left">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
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
         
         
        </div><!-- page left -->
        
    
        
        
        
<div id="single-proj-right">
<div class="content">
					
                    
                    
                    
                    
 <div id="gallery" class="content">
    <div id="controls" class="controls"></div>
    <div id="slideshow" class="slideshow"></div>
    <!--<div id="details" class="embox">
       
        <div id="image-title" class="image-title"></div>
        <div id="image-desc" class="image-desc"></div>
    </div>-->
</div><!-- gallery -->
                    
                    
                    


<div class="clear"></div>


<!-- Start Advanced Gallery Html Containers -->				
			<div id="navigation" class="navigation">
						<!--<a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page"></a>-->
					
						<ul class="thumbs noscript">
                        <?php // If a Side Box is Defined....
								 if(get_field('project_gallery')): ?>
									<?php while(the_repeater_field('project_gallery')): ?>
                                    <?php $image = wp_get_attachment_image_src(get_sub_field('project_images'), 'lightbox'); ?>
									<?php $thumb = wp_get_attachment_image_src(get_sub_field('project_images'), 'gallery-thumbnail'); ?>
							<li>
								<a original="<?php echo $image[0]; ?>" href="<?php echo $image[0]; ?>" title="Title #0">
									<img src="<?php echo $thumb[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="" />
								</a>
							
							</li>
	
							
                            <?php endwhile; ?>
							<?php endif; ?>
                          </ul>
						<a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page"></a>
				
				</div><!-- navigation container -->
                
       			<div id="controls" class="controls"></div>


 <div class="clear"></div> 

      <?php endwhile;  ?>
<?php  endif; ?>  


<?php
wp_reset_query();
wp_reset_postdata();
  // Get solId value from incoming URL.
  $taxonomy = 'portcats';
  $term_id = $_REQUEST['cat'];
  //echo $term_id;
  $terms = get_the_terms( $post->ID, $taxonomy );
  //get the parent
  $child_term = get_term( $term_id, $taxonomy );
  $parent_term = get_term( $child_term->parent, $taxonomy );
  $baseurl = get_bloginfo('url'); 
  //$excludecat = (string) $this->get_term( $child_term->parent, $taxonomy );
//echo $parent_term->term_id;



//$prev_post = get_adjacent_post( true, '', true, 'groups' );
/*echo '<pre>';
    print_r($prev_post);
echo '</pre>';*/

/*echo '<pre>';
    print_r($terms);
echo '</pre>';*/

?>

<?php get_template_part('inc/next-project-query'); ?>
				

</div><!-- content -->
</div><!-- single project right -->
        
        
        

        

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>