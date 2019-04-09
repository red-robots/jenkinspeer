<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );	
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

if($wp_query) { ?>
<div class="three-column-wrapper clear">
    <div class="flexrow clear">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div class="flexcol">
			<div class="inside clear">
			    <a class="boxlink" href="<?php the_permalink(); ?>?cat=<?php echo $term->term_id; ?>">
					<?php  if ( has_post_thumbnail() ) { ?>
			        	<span class="thumbnail"><?php the_post_thumbnail('thumbnail_large'); ?></span>
			        <?php } else { ?>
			        	<span class="thumbnail"><img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/></span>
			        <?php } ?>
			        <span class="project-info">
			    		<h2><?php the_title(); ?></h2>
		   		 		<span class="client"><?php the_field('second_title'); ?></span><!-- client -->
		    		</span>
		    	</a>
	    	</div>
	 	</div>
	 <?php endwhile; wp_reset_postdata();  ?>
	</div>
</div>
<?php } ?>