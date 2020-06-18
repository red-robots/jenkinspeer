<?php
/**
 * Template Name: Firm
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 
                $title2 = get_field('page_short_description'); ?>
                
                <div class="left-cont-pad firmpara">
                <div class="entry-content">
                
                 <h2 class="redsubtitle"><?php the_title() ?> <?php if ($title2) { ?><span class="short-descr"> &ndash; <?php the_field('page_short_description'); ?></span><?php } ?></h2>
                
                	<?php the_content(); ?>
                
                
                <?php if(is_page('awards')) : ?>
					
                    	<?php get_template_part('inc/awards'); ?>
                   
			     <?php endif; ?>
                
                </div><!-- entry content -->
                 </div><!-- left-content pad -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('firm'); ?>
<?php get_footer(); ?>