<?php
/**
 * Taxonomy Template
 */

get_header(); 

$post = get_post(2); 
setup_postdata( $post );

?>

<div id="primary" class="full-content-area clear">
		<div id="content">
 	<div class="portfolio-content clear">
        <div class="entry-content">
        	<?php echo wpautop( get_the_content() ); ?>
        </div><!-- entry content -->
        
    </div><!-- portfolio content -->

<?php 
wp_reset_postdata();

get_template_part('inc/portfolio-bottom-feed-new'); ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>