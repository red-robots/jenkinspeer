<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

	<div id="primary" >
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
                
               <h2 class="page-title" style="position:absolute;top:-100vh;z-index:-999;"><?php the_title() ?></h2>
                
               <div class="left-cont-pad firmpara">
                <div class="entry-content">
                
                <div class="contact-info">
                	<?php the_content(); ?>
                    <div class="clear"></div>
                    <?php the_field('google_map'); ?>
                    </div><!-- contact info -->
                    
                   <div class="google-map">
    	<?php 
		// Get field Name
		$image = get_field('right_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
			
		?>
    	
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
  

                    </div><!-- google map -->
                   
                   
              
                
                </div><!-- entry content -->
                </div><!-- left content pad -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>