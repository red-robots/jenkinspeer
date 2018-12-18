<div class="nextprojects">
<?php 
// get current term id
$term_id = $_REQUEST['cat'];
$tax = 'portcats';
$termName = get_term( $term_id, $tax );
?>
<br>
<h3>Projects in <?php echo $termName->name; ?></h3>
<br>
<?php 
$args = array(
		   'post_type' => array('portfolio'), //You list of Custom Post Types
            'posts_per_page' => '-1', // # of posts to show
			 'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $termName->slug, // slug created by WP when you make your entry
				)
			 )
                
            );
            $query = new WP_Query( $args );  // Query all of your arguments from above
            if (have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
            
            <a href="<?php the_permalink(); ?>?cat=<?php echo $termName->term_id; ?>"><?php the_title(); ?></a><br>
            
 <?php endwhile; endif; ?>
</div><!-- proj pagi next -->