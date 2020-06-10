<?php
/**
 * Template Name: Default Template
 */

get_header(); ?>

	<div id="primary" class="full-content-area clear">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
                
                <h2 class="page-title"><?php the_title(); ?></h2>
                
                <div class="left-cont-pad">
                <div class="entry-content">
                
                	<?php the_content(); ?>
                
                </div><!-- entry content -->
                </div><!-- left cont pad -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>