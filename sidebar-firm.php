<div id="secondary" class="widget-area" role="complementary">
	<aside class="widget">
    
    <!--	<h3 class="widget-title">List of Page</h3>-->
        
<?php
	//this_page_id= get_query_var('page_id');
    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'page',
    'posts_per_page' => -1,
    'post_parent' => 42,
	'order' => 'ASC',
	'orderby' => 'title'
));
    if ($wp_query->have_posts()) : ?>
    <div class="sideservice">
    <ul>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
    	<li>
        	<div class="spad">
            <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
            <p><?php the_field('page_short_description'); ?></p>
            </a>
        	</div><!-- spad -->
        </li>
    
    <?php endwhile; ?>
    
    </ul>
    </div>
    <?php  endif; // end chile pages query?>


<?php wp_reset_postdata(); wp_reset_query();
		if(is_single()) : ?>
<?php
    $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'people',
    'posts_per_page' => -1,
    'paged' => $paged,
    'orderby'   => 'menu_order',
    'order'     => 'ASC',
));
    if ($wp_query->have_posts()) : ?>
    <ul class="peoplelist">
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>
     <?php 
        // Get field Name
        $image = get_field('photo'); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
        $caption = $image['caption'];
     
        // size or custom size that will go
        // into the "thumb" variable.
        $size = 'home-thumbnail';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        ?>
    	<li>
            <a href="<?php the_permalink(); ?>">
            <div class="people-pic-side">
            	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            </div><!-- people pic side -->
            	<div class="peep-name"><?php the_title(); ?></div>
                <div class="peep-title"><?php the_field('company_title'); ?></div>
            </a>
        </li>
        
    <?php endwhile; ?>
    </ul>
    <?php endif; wp_reset_postdata(); wp_reset_query(); ?>
    <?php endif; // end if is people page ?>
    </aside>		
</div><!-- #secondary -->
	