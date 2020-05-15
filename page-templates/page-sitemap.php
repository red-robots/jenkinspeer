<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

	<div id="primary" >
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
                
                <h1 class="page-title"><?php the_title(); ?></h1>
                
              <div class="left-cont-pad firmpara">
                <div class="entry-content">
                <?php wp_nav_menu( array( 'theme_location' => 'sitemap', 'menu_class' => 'nav-menu' ) ); ?>
                	<?php the_content(); ?>
                
                </div><!-- entry content -->
                 </div><!-- left-content pad -->
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>