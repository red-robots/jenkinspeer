<?php 
$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
$size = 'large';
$categoryFeaturedImage = $image['sizes'][ $size ];				
				
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
			 
				// thumbnail or custom size that will go
				// into the "thumb" variable.
				$size = 'large';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
?>



<div class="home-row1 clear">
 <!--
 #####################################
 
           Higher Education
 
 ##################################### -->

<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'higher-education'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

        <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];	
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  --> 
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
 
 
 
 
 
 
 
 
 


 <!--
 #####################################
 
           Science And Technology
 
 ##################################### -->
<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'science-and-technology'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

        <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
 
 
 
 
 
 
 
 
 
 
  <!--
 #####################################
 
           Blank
 
 ##################################### -->

        <div class="empty-red home-square">
         
        </div><!-- / home-square 1  --> 

 
 
 
 
 
 
 
 
  <!--
 #####################################
 
           Civic and Cultural
 
 ##################################### -->
 <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'civic-cultural'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

        <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
 
 
 <div class="empty-square home-square"></div>
 <!-- / now for row 2 -->
 <div class="empty-square home-square"></div>
 
 
 
 
 
 
 <!--
 #####################################
 
           Residential
 
 ##################################### -->
  <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'residential'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

        <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
 
 
 
 
  <!--
 #####################################
 
           Commercial
 
 ##################################### -->
  <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'commercial'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

       <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
 
  <!--
 #####################################
 
           INdustrial
 
 ##################################### -->
  <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'industrial'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

       <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
 
  <!--
 #####################################
 
           UInteriors
 
 ##################################### -->
  <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'portcats',
			'field' => 'slug',
			'terms' => 'interiors'
		)
	)
	
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php //bloginfo('description'); ?>

       <div class="home-square-1 home-square">
         <?php 
				// vars
				$queried_object = get_queried_object(); 
				$taxonomy = $queried_object->taxonomy;
				$term_id = $queried_object->term_id; 
				$slug =  $queried_object->slug;
				// load Featured iMage for this taxonomy term
				$image = get_field('category_featured_image_to_show_on_homepage', $taxonomy . '_' . $term_id);
				$size = 'medium';
				$categoryFeaturedImage = $image['sizes'][ $size ];
				?>
            <a href="<?php bloginfo('url'); ?>/portfolio-categories/<?php echo $slug; ?>">
            	<h2 class="home-term"><?php echo get_queried_object()->name; ?></h2>
               <img src="<?php echo $categoryFeaturedImage; ?>"  />
            </a>
        </div><!-- / home-square 1  -->
 <?php endwhile;   ?>
 <?php  wp_reset_postdata(); ?>
<!--
  <div class="empty-square home-square"></div>
  
  
  
  
   <div class="empty-square home-square"></div>
   -->
   
</div><!-- / home-row1  -->