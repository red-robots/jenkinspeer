<?php
/**
 * Template Name: News
 */

get_header(); ?>

	<div id="primary" class="site-full">
		<div id="content" role="main">

			
				
        <h2 class="page-title" style="position:absolute;top:-100vh;z-index:-999;"><?php the_title() ?></h2>
                
 
 
 <div class="left-cont-pad firmpara">            
 <?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'post',
    'posts_per_page' => 10,
    'paged' => $paged,
));
    if ($wp_query->have_posts()) : ?>
    <div id="container">   
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>               
                
                
      
            <div class="blogpost item"> 
           
            <a href="<?php the_permalink(); ?>"> 
            	
               
                    <div class="blogcontent blog_off">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium');
                    }  ?>
                    <div class="blogguts">
                     
                   <h2><?php the_title(); ?></h2>  
                	<?php //the_content(); ?>
                     </div><!-- blogguts -->
                    </div><!-- blogcontent -->
                    <div class="readmore read_off">Read more &raquo;</div>
             </a>
             </div><!-- blogpost -->   
      
                
    <?php endwhile; ?>
    </div><!-- container -->
    <div class="clear"></div>
    <?php pagi_nav(); ?>
    <?php endif; ?>   
    </div><!-- left cont pad -->         
		

		</div><!-- #content -->
	</div><!-- #primary -->

    
    
<?php get_footer(); ?>