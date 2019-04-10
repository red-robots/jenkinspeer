<?php
$arg = array(
        'post_type'=>'portfolio',
        'posts_per_page' => -1,
        'orderby'   => 'menu_order',
        'order'     => 'ASC',
    );
$wp_query = new WP_Query($arg);
if( $wp_query->have_posts() ) { ?>
<div class="three-column-wrapper clear">
    <div class="flexrow clear">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
        $post_id = get_the_ID();
        $taxonomy = 'portcats';
        $term = get_the_terms($post_id,$taxonomy);
        $term_id = ($term) ? $term->term_id : '';
        $pagelink = get_permalink();
        ?>
        <div id="proj-<?php echo $post_id?>" class="flexcol">
            <div class="inside clear">
                <a class="boxlink" href="<?php echo $pagelink; ?>">
                    <?php  if ( has_post_thumbnail() ) { ?>
                        <span class="thumbnail"><?php the_post_thumbnail('thumbnail_large'); ?></span>
                    <?php } else { ?>
                        <span class="thumbnail"><img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/></span>
                    <?php } ?>
                    <span class="project-info">
                        <h2><?php the_title(); ?></h2>
                        <span class="client"><?php the_field('second_title'); ?></span><!-- client -->
                    </span>
                </a>
            </div>
        </div>
        <?php endwhile;  wp_reset_postdata(); ?>
    </div> 
</div>
<?php } ?>
