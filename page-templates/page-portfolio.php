<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

	<div id="primary">
		<div id="content">
        
        <h1 class="category-title"><?php the_title(); ?> | 
            <a class="viewall" href="#viewall">
                View All
            </a>
        </h1>



<?php get_template_part('inc/tax-subnav-portfolio'); ?>
<?php get_template_part('inc/portfolio-squares'); ?>

<?php wp_reset_query(); ?>

<a name="viewall"></a>

<?php while(have_posts()) : the_post(); ?>
	<div class="portfolio-content">
        <div class="entry-content">
        	<?php the_content(); ?>
        </div><!-- entry content -->
        
    </div><!-- portfolio content -->
<?php endwhile; ?>

<?php get_template_part('inc/portfolio-bottom-feed'); ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>