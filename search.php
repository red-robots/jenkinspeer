<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-full">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
          


			<?php /* Start the Loop */ ?>
			<?php 
			$last_type="";
			$typecount = 0;
			
			
			while ( have_posts() ) : the_post(); 
			
			
	if ($last_type != $post->post_type){
    $typecount = $typecount + 1;
	
    if ($typecount > 1){
        echo '</div><!-- close container -->'; //close type container
    }
    // save the post type.
    $last_type = $post->post_type;
	 //open type container
    switch ($post->post_type) {
       case 'portfolio':
            echo "<div class=\"portsearch\"><h1 class='page-title'>Portfolio Results</h1>";
            break;
	   
	   case 'post':
            echo "<div class=\"newssearch\"><h1 class='page-title'>News Search   Results</h1>";
            break; 
		
        

    }}
	?>
				
        
        
   <?php if('portfolio' == get_post_type()) : ?>
    <div class="blogsearch itemsearch"> 
           
            <a href="<?php the_permalink(); ?>"> 
            	 <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium');
                    }  ?>
               
                    <div class="blog-search-content blog_off">
       
                   <h2><?php the_title(); ?></h2>  
                	<?php //the_content(); ?>
                    </div><!-- blogcontent -->
                    <div class="readmore read_off">Read more &raquo;</div>
             </a>
          </div><!-- blogpost --> 
<?php endif; ?>

  
  
  
  <?php if('post' == get_post_type()) : ?>
<li class="searchlist">
<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
  <?php endif; ?>
   
   
  <?php endwhile; ?>

	<div class="clear"></div> 

		<?php else : ?>
<div class="open-a-div">

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article> 

		<?php endif; ?>
        
       
     

		</div><!-- #content -->
	</section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>