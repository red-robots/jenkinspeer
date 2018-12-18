<div id="secondary" class="widget-area" role="complementary">
	<aside class="widget">
    
  <!--  	<h3 class="widget-title">List of Services</h3>-->
        
  <?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'services',
    'posts_per_page' => -1,
	'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'paged' => $paged,
));
    if ($wp_query->have_posts()) : ?>
    <div class="sideservice">
    <ul>
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>
    
    <?php // variables
		// get the title
		$title = get_the_title(); 
		// sanitize
		$santigold = sanitize_title_with_dashes($title);
	?>
    
    	 <li>
            <div class="spad">
            	<a href="#<?php echo $santigold; ?>">
					<h2><?php echo $title; ?></h2>
                    <p><?php the_field('service_short_description'); ?></p>
                    
                </a>
            </div><!-- spad -->
        </li>
    
    <?php endwhile; ?>
    </ul>
    </div>
    <?php endif; wp_reset_postdata(); wp_reset_query(); ?>
    
    </aside>		
</div><!-- #secondary -->
	