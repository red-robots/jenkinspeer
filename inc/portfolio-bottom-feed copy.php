
<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'orderby'   => 'menu_order',
    'order'     => 'ASC',
));

if( $wp_query->have_posts() ) { ?>
<div class="portfolio-blocks-wrapper clear">
    <div class="row clear">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

        <div class="viewall-div blocks">
            <div class="inside">
                <a href="<?php the_permalink(); ?>">
            		<?php  if ( has_post_thumbnail() ) { ?>
                    	<?php the_post_thumbnail('thumbnail'); ?>
                    <?php } else { ?>
                    	<img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
                    <?php } ?>
                    
                
                
                <h2><?php the_title(); ?></h2>
                <div class="client"><?php the_field('second_title'); ?></div><!-- client -->
                </a>
            </div>
         </div><!-- project post div -->
          
         <?php endwhile;   ?>
         <?php  wp_reset_postdata(); ?>
    </div> 
</div>
<?php } ?>
