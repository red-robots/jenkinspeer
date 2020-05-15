<?php
// get current term
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
// get parent term from the current term 
$parent = get_term($term->parent, get_query_var('taxonomy') ); 
// get children
$children = get_term_children($term->term_id, get_query_var('taxonomy')); 
if(($parent->term_id!="" && sizeof($children)>0)) {
// has parent and child
	$whatToTitle = $parent->name; // Probably not going to use this one
}elseif(($parent->term_id!="") && (sizeof($children)==0)) {
// has parent, no child
	$whatToTitle = $parent->name;
}elseif(($parent->term_id=="") && (sizeof($children)>0)) {
// no parent has child
	$whatToTitle = $term->name;

}?> 
              
			<h3 class="carouseltitle"><?php echo $whatToTitle; ?> Projects</h3> 
            <div class="clear"></div>


 <?php if(!empty($termchildren)) : ?>            
<div id="flexslider">
     <ul id="mycarousel" class="jcarousel-skin-tango">
         
<?php
	$term_slug = get_query_var( 'term' );
    $taxonomyName = get_query_var( 'taxonomy' );
    $current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
    $termchildren = get_term_children( $current_term->term_id, $taxonomyName );
    
	foreach ($termchildren as $child) {
	
	$args = array(
		   
            'post_type' => array('portfolio'), //You list of Custom Post Types
            'posts_per_page' => '-1', // # of posts to show
			 'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $term, // slug created by WP when you make your entry
				)
			 )
                
            );
            $query = new WP_Query( $args );  // Query all of your arguments from above
           ?>
           
<?php if (have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
          <?php $term = get_term_by( 'id', $child, 'portcats' ); ?>
           
           <li class="hideitemonload">
           	<a href="<?php the_permalink(); ?>?cat=<?php echo $term->term_id; ?>">
			<?php  if ( has_post_thumbnail() ) { ?>
        		<div class="cat-caro">
        				<?php the_post_thumbnail('thumbnail'); ?>
           			 <h2><?php the_title(); ?></h2>
            			<div class="client"><?php the_field('second_title'); ?></div><!-- client -->
       			</div><!-- cat caro -->
        
		<?php } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
            <h2><?php the_title(); ?></h2>
            <div class="client"><?php the_field('second_title'); ?></div><!-- client -->
        <?php } ?>
        
    </a>
    
    <div class="proj-title">
        <a href="<?php the_permalink(); ?>">
        	<h3><?php the_title(); ?></h3>
            
        </a>
    </div><!-- proj-title -->
    
    


              
            </li>
            <?php  endwhile; endif; wp_reset_postdata(); wp_reset_query(); rewind_posts(); // close loop ?>
             <!-- Rewind and Reset -->
				<?php  //wp_reset_query(); // Reset Query  ?> 
                <?php  //rewind_posts(); ?>
          <?php } // end for each ?>
            </ul><!-- /slides -->
			
            </div><!-- /flexslider -->
            
            <?php else: ?>
			
<div id="flexslider">
     <ul id="mycarousel" class="jcarousel-skin-tango">
         
<?php
	$term_slug = get_query_var( 'term' );
    $taxonomyName = get_query_var( 'taxonomy' );
    $current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
    $termchildren = get_term_children( $current_term->term_id, $taxonomyName );
    

	
	$args = array(
		   
            'post_type' => array('portfolio'), //You list of Custom Post Types
            'posts_per_page' => '-1', // # of posts to show
			 'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $term, // slug created by WP when you make your entry
				)
			 )
                
            );
            $query = new WP_Query( $args );  // Query all of your arguments from above
           ?>
           
<?php if (have_posts()) : while( $query->have_posts() ) : $query->the_post(); // the loop ?>
          <?php $term = get_term_by( 'id', $child, 'portcats' ); ?>
           
           <li class="hideitemonload">
           	<a href="<?php the_permalink(); ?>?cat=<?php echo $term->term_id; ?>">
			<?php  if ( has_post_thumbnail() ) { ?>
        		<div class="cat-caro">
        				<?php the_post_thumbnail('thumbnail'); ?>
           			 <h2><?php the_title(); ?></h2>
            			<div class="client"><?php the_field('second_title'); ?></div><!-- client -->
       			</div><!-- cat caro -->
        
		<?php } else { ?>
        	<img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
            <h2><?php the_title(); ?></h2>
            <div class="client"><?php the_field('second_title'); ?></div><!-- client -->
        <?php } ?>
        
    </a>
    
    <div class="proj-title">
        <a href="<?php the_permalink(); ?>">
        	<h3><?php the_title(); ?></h3>
            
        </a>
    </div><!-- proj-title -->
    
    


              
            </li>
            <?php  endwhile; endif; wp_reset_postdata(); wp_reset_query(); rewind_posts(); // close loop ?>
             <!-- Rewind and Reset -->
				<?php  //wp_reset_query(); // Reset Query  ?> 
                <?php  //rewind_posts(); ?>
        
            </ul><!-- /slides -->
			
            </div><!-- /flexslider -->
            
            <?php endif; ?>