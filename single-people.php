<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			
            	
          <h1 class="page-title">People</h1>
          
          <div class="left-cont-pad">
           <div class="entry-content">     
     <?php 
        // Get field Name
        $image = get_field('photo'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     
        // size or custom size that will go
        // into the "thumb" variable.
        $size = 'large';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        ?>
        
        <div class="person-photo">
       		 <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
        </div><!--person photo -->
        
        <div class="person-details">
        <h2 class="persontitle redsubtitle" ><?php the_title(); ?></h2>
       		 <div class="company-title"><?php the_field('company_title'); ?></div>
             <?php if( have_rows('degrees') ): ?>
			<?php while ( have_rows('degrees') ) : ?>
				<?php the_row(); ?>
					 <div class="degree-name"><?php the_sub_field('degree_name'); ?></div><!-- degree name -->
                    <div class="degree-place"><?php the_sub_field('place_earned'); ?></div><!-- degree place -->
	 		<?php endwhile; ?>
		<?php endif; ?>
        <?php if(get_field('v_card')!="") : ?>
       		 <div class="vcard"><a href="<?php the_field('v_card'); ?>">Vcard</a></div>
        <?php endif; ?>
        </div><!-- person details -->
        
        <div class="clear"></div>
        
        <div class="person-summary">
        	<?php the_field('personal_details'); ?>
        </div><!-- person summary -->
                
        
                
                
            </div><!-- entry content -->
            </div><!-- left cont pad -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('firm'); ?>
<?php get_footer(); ?>