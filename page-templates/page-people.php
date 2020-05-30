<?php
/**
 * Template Name: People
 */
get_header(); 
$current_url = get_permalink(); ?>
<div id="primary" class="site-content people-page">
	<div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
		  <h1 class="page-title" style="display:none;"><?php the_title(); ?></h1>
          <?php if ( get_the_content() ) { ?>
            <div class="entry-content"><?php the_content(); ?></div>
          <?php } ?>
        <?php endwhile; // end of the loop. ?>
        

        <?php  
        /* Team Posts */
        $taxonomy = 'people_categories';
        $posttype = 'people';
        $currentCat = ( isset($_GET['cat']) && $_GET['cat'] ) ? $_GET['cat'] : ''; 
        $args = array(
            'posts_per_page'=> -1,
            'post_type'     => $posttype,
            'post_status'   => 'publish',
        );
    
        if($currentCat && is_numeric($currentCat)) {
            $args['tax_query'][] = array(
                    'taxonomy'=>$taxonomy,
                    'field'=>'term_id',
                    'terms'=>array($currentCat)
                );
        }

        
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ));

        $teams = new WP_Query($args);
        if ( $teams->have_posts() ) {  ?>   
        <section class="team-posts">
            <?php if ($terms) { ?>
            <div class="people-categories">
                <div class="wrap">
                    <a href="<?php echo $current_url ?>" class="<?php echo (empty($currentCat)) ? 'all active':'all'?>">All</a>
                    <?php foreach ($terms as $term) { 
                    $term_id = $term->term_id;
                    $term_slug = $term->slug;
                    $term_name = $term->name;
                    //$term_link = get_term_link($term,$taxonomy);
                    $term_link = $current_url . '?cat=' . $term_id;
                    $is_active = ( ($currentCat) && $term_id==$currentCat ) ? ' active':'';
                    ?>
                    <a href="<?php echo $term_link ?>" class="cat-<?php echo $term_slug . $is_active ?>"><?php echo $term_name ?></a>
                    <?php } ?>
                </div>
            </div>  
            <?php } ?>
            <div class="flexwrap">
            <?php $i=1; while ( $teams->have_posts() ) : $teams->the_post();  
                $image = get_field('photo'); 
                $name = get_the_title();
                $url = $image['url'];
                //$title = $image['title'];
                $title = get_field('company_title');
                $alt = $image['alt'];
                $caption = $image['caption'];
                $link = get_permalink();
                $placeholder = get_bloginfo("template_url") . "/images/square.png";
                $imageURL = ($image) ? "'".$image['url']."'" : '';
                $style = ($image) ? ' style="background-image:url('.$imageURL.')"':'';
                ?>
                <div class="teamInfo">
                    <a href="<?php echo $link ?>" class="info">
                        <span class="photo <?php echo ($image) ? 'yes':'no'; ?>"<?php echo $style ?>>
                            <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
                        </span>
                        <span class="text">
                            <span class="team-name"><?php echo $name ?></span>
                            <?php if ($title) { ?>
                            <span class="team-title"><?php echo $title ?></span>
                            <?php } ?>
                        </span>
                    </a>
                </div>
            <?php $i++; endwhile; wp_reset_postdata(); ?>
            </div>
        </section>
        <?php } ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>