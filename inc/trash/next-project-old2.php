<?php 

/*if (isset($_POST['data'])){
    $post_id = $_POST['data'];
}else{
    $post_id = "";
}
$wp_query->is_single = true;*/

//global $post;
//$post = get_the_ID();

wp_reset_postdata();
wp_reset_query();

$term_id = $_REQUEST['cat'];
$tax = 'portcats';
$termName = get_term( $term_id, $tax );
$prev_post = get_previous_post();
//$next_post = get_previous_post();
if ( has_term( $termName->slug, $tax, $prev_post->ID ) ) :
   echo $prev_post->post_title; 



echo $termName->slug;

$args = array(
	'post_type' => array('portfolio'), //CPT
   'posts_per_page' => '1', 
	'p' => $prev_post->ID, 
	'tax_query' => array(  
		array(      
			'taxonomy' => 'portcats', // Tax
			'field' => 'slug',
			'terms' => $termName->slug, // slug 
		)
	)
);
            $query = new WP_Query( $args );  // Query all of your arguments from above
            if ($query->have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
            
            <a href="<?php the_permalink(); ?>?cat=<?php echo $termName->term_id; ?>"><?php the_title(); ?></a><br>
            
 <?php endwhile; endif;  endif; 
 
 wp_reset_postdata();
wp_reset_query();

?>

<?php 

/*if (isset($_POST['data'])){
    $post_id = $_POST['data'];
}else{
    $post_id = "";
}
$wp_query->is_single = true;*/

//global $post;
//$post = get_the_ID();

wp_reset_postdata();
wp_reset_query();

$term_id = $_REQUEST['cat'];
$tax = 'portcats';
$termName = get_term( $term_id, $tax );
$next_post = get_next_post();
if ( has_term( $termName->slug, $tax, $next_post->ID ) ) :
   echo $next_post->post_title; 

echo $termName->slug;




$args = array(
		   
		    'post_type' => array('portfolio'), //You list of Custom Post Types
           'posts_per_page' => '1', // # of posts to show
			'p' => $next_post->ID, 
			 'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $termName->slug, // slug created by WP when you make your entry
				)
			 )
                
            );
            $query = new WP_Query( $args );  // Query all of your arguments from above
            if ($query->have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
            
            <a href="<?php the_permalink(); ?>?cat=<?php echo $termName->term_id; ?>"><?php the_title(); ?></a><br>
            
 <?php endwhile; endif;  endif;  