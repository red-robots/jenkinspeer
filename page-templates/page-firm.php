<?php
/**
 * Template Name: Firm
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
                
                <h2 class="page-title" style="position:absolute;top:-100vh;z-index:-999;"><?php the_title() ?></h2>
                
                
                <div class="left-cont-pad firmpara">
                <div class="entry-content">
                
                 <h2 class="redsubtitle"><?php the_title() ?></h2>
        			<div class="short-descr"><?php the_field('page_short_description'); ?></div>
                
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