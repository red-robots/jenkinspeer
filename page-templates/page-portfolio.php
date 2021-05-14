<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

<div id="primary" class="full-content-area clear">
		<div id="content">
        
        <!-- <div class="pageheader">
            <h2 class="category-title" style="display:inline-block;"><?php the_title(); ?></h2>
        </div> -->
        



<?php //get_template_part('inc/tax-subnav-portfolio'); ?>
<?php //get_template_part('inc/portfolio-squares'); ?>
<?php //get_template_part('inc/project-categories'); ?>
<?php //wp_reset_query(); ?>


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