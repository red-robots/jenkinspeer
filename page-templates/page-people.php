<?php
/**
 * Template Name: People
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			
				
                
                <!--<h1 class="page-title">Firm</h1>-->
                
                <div class="left-cont-pad firmpara">
                <div class="entry-content">
                 <h2 class="redsubtitle"><?php the_title() ?></h2>
        			<div class="short-descr"><?php the_field('page_short_description'); ?></div>
                
    <?php $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'people',
    'posts_per_page' => -1,
	'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'tax_query'=>array(array(
        'taxonomy'=>'people_categories',
        'field'=>'term_id',
        'terms'=>array(69)
    ))
));
    if ($wp_query->have_posts()) : ?>
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
        $size = 'peoplelist';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        ?>
    
    	<div class="person blocks">
        	<a href="<?php the_permalink(); ?>">
           
            
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            <div class="page-peep-name"><?php the_title(); ?></div>
            <div class="page-peep-title"><?php the_field('company_title'); ?></div>
          </a>  
        </div><!-- person -->
    
    <?php endwhile; ?>
    <div class="clear"></div>
    <?php endif; wp_reset_postdata(); wp_reset_query(); ?>
    
    </div><!-- entry content -->
    <div class="entry-content">
    <h2 class="redsubtitle"><?php the_field("principal_emeritus_title"); ?></h2>
    <div class="short-descr"><?php the_field('principal_emeritus_description'); ?></div>
    
    <?php $wp_query = new WP_Query();
    $wp_query->query(array(
    'post_type'=>'people',
    'posts_per_page' => -1,
	'orderby'   => 'menu_order',
    'order'     => 'ASC',
    'tax_query'=>array(array(
        'taxonomy'=>'people_categories',
        'field'=>'term_id',
        'terms'=>array(68)
    ))
));
    if ($wp_query->have_posts()) : ?>
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
        $size = 'peoplelist';
        $thumb = $image['sizes'][ $size ];
        $width = $image['sizes'][ $size . '-width' ];
        $height = $image['sizes'][ $size . '-height' ];
        ?>
    
    	<div class="person blocks">
        	<a href="<?php the_permalink(); ?>">
           
            
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            <div class="page-peep-name"><?php the_title(); ?></div>
            <div class="page-peep-title"><?php the_field('company_title'); ?></div>
          </a>  
        </div><!-- person -->
    
    <?php endwhile; ?>
    <div class="clear"></div>
    <?php endif; wp_reset_postdata(); wp_reset_query(); ?>
                
                </div><!-- entry content -->
                </div><!-- left content pad -->
                
       

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('firm'); ?>
<?php get_footer(); ?>