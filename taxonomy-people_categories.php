<?php
/**
 * 
 */
wp_redirect(get_bloginfo('url'));
exit;

get_header(); ?>

	<div id="primary">
		<div id="content">
        
      		 <?php 
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					// get term
					if ( $term->parent == 0 ) : // if is top level term ?>
				
				<?php get_template_part('inc/tax-subnav-tax'); ?>
              <?php get_template_part('inc/carousel'); ?>
              
			  
                
<div class="category-layout">

<?php
	$queried_object = get_queried_object(); 
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;
	global $post;
	 
	// get current term
	$terms = get_the_terms($post->ID, 'portcats');
	// get acf image field from term
	$thumbnail = get_field('category_featured_image', $queried_object);
	// get quote 
	$quote = get_field('category_quote', $queried_object);
	// get author
	$author = get_field('category_quote_author', $queried_object);
	
	$image = get_field('category_featured_image', $queried_object);
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
			 
				// thumbnail or custom size that will go
				// into the "thumb" variable.
				$size = 'large';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
	?>
	
	<?php if(get_field('category_quote', $queried_object )!="") : ?>
    	<div class="category-quote"><?php  echo $quote;  ?>
    	<div class="category-quote-author"> - <?php echo $author; ?></div>
        </div><!-- cat quote -->
    <?php  endif; // if category quote is not empty ?>

<div class="clear"></div>

	<div class="category-featured-image">
		
        <img src="<?php echo $thumb; ?>" />

	<div class="category_description">
    	<div class="padding20">
			<?php echo category_description(); ?>
    	</div><!-- padding -->
    </div><!-- category_description -->
    
	</div><!-- category featured image -->
    <div class="clear"></div>
    <?php wp_reset_postdata(); ?>
    
	<?php
	// which term?
	$obj = get_queried_object();
	// which field?
	$post_object = get_field('link_to_featured_project', $obj);
	
	if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
	// echo the permalink
	$link = get_the_permalink();

	?>
    <div class="featured-post-link">
    	See Project <a href="<?php echo $link . "?cat=" . $term_id ?>"><?php the_title(); ?> &raquo;</a>
    </div><!-- featured post link -->
    <?php wp_reset_postdata(); ?>
	<?php endif; ?>



 </div><!-- / category layout -->
 <?php endif; // end if term has no children ?>               

<?php get_template_part('inc/viewallcats'); ?>


		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>