<?php
/**
 * Template Name: Portfolio Old
 */

get_header(); ?>

	<div id="primary">
		<div id="content">
        
        <h1 class="page-title"><?php the_title(); ?></h1>

<div id="subnav">
	<ul>
    
    <?php  
/* List all terms associated with a Custom Taxonomy  */
$getArgs = array(
	'parent'       => 0,
    /*'number'        => 10,*/
	'order' => 'DESC',
	'orderby' => 'count',
    'hide_empty'    => false,
);
$terms = get_terms('portcats', $getArgs);
 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
     foreach ( $terms as $term ) {
       echo "<li>" . '<a href="' . get_term_link( $term ) . '">'  . $term->name . '</a>' . "</li>";
    }
 } ?>
    	<!--<li><a href="<?php bloginfo('url'); ?>/portfolio-categories/higher-education">Higher Education</a></li>
    	<li><a href="<?php bloginfo('url'); ?>/portfolio-categories/science-technology">Science &amp; Technology</a></li>
        <li><a href="<?php bloginfo('url'); ?>/portfolio-categories/civic-cultural">Civic &amp; Cultural</a></li>
        <li><a href="<?php bloginfo('url'); ?>/portfolio-categories/residential">Residential</a></li>
        <li><a href="<?php bloginfo('url'); ?>/portfolio-categories/commercial">Commercial</a></li>
        <li><a href="<?php bloginfo('url'); ?>/portfolio-categories/industrial">Industrial</a></li>
        <li><a href="<?php bloginfo('url'); ?>/portfolio-categories/interiors">Interiors</a></li>-->
	</ul>
</div><!-- subnav -->


<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>



<div class="port-post-div blocks">
    <a href="<?php the_permalink(); ?>">
		<?php  if ( has_post_thumbnail() ) { ?>
        	<div class="thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
        <?php } else { ?>
        	<div class="thumbnail"><img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/></div>
        <?php } ?>
        
    </a>
    
    <div class="proj-title"><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a></div>
    
    
 </div><!-- project post div -->
  
 

 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>




		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>