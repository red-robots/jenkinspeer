<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

<div id="primary" class="full-content-area clear">
		<div id="content">
        
        <div class="pageheader">
            <h2 class="category-title" style="display:inline-block;"><?php the_title(); ?></h2> <span style="color:#da291c;padding:0 3px">|</span> <a class="viewall" href="#viewall">View All</a>
        </div>
        



<?php get_template_part('inc/tax-subnav-portfolio'); ?>
<?php //get_template_part('inc/portfolio-squares'); ?>
<?php get_template_part('inc/project-categories'); ?>

<?php wp_reset_query(); ?>

<a name="viewall"></a>

<?php while(have_posts()) : the_post(); ?>
	<div class="portfolio-content clear">
        <div class="entry-content">
        	<?php the_content(); ?>
        </div><!-- entry content -->
        
    </div><!-- portfolio content -->
<?php endwhile; ?>

<?php get_template_part('inc/portfolio-bottom-feed'); ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>