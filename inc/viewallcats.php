<?php

	// get current term
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	
	
	?>
<h2 id="viewall" class="allprojs">All <?php echo $term->name ?> Projects</h2>

<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $term, // slug created by WP when you make your entry
				)
			 )
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>



<div class="viewall-div">
    <a href="<?php the_permalink(); ?>?cat=<?php echo $term->term_id; ?>">
		<?php  if ( has_post_thumbnail() ) { ?>
        	<div class="thumbnail"><?php the_post_thumbnail('large-thumbnail'); ?></div>
        <?php } else { ?>
        	<div class="thumbnail"><img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/></div>
        <?php } ?>
        
    
    
    <h2><?php the_title(); ?></h2>
    <div class="client"><?php the_field('second_title'); ?></div><!-- client -->
    
    </a>
 </div><!-- project post div -->
  
 

 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>