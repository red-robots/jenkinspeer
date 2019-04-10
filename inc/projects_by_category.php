<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );	
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'tax_query' => array(  //Custom Taxonomy "front_page"
				array(       // array within an array
					'taxonomy' => 'portcats', // Name when registering CT
					'field' => 'slug',
					'terms' => $term, // slug created by WP when you make your entry
				)
			 )
));

if($wp_query) { ?>
<div class="three-column-wrapper clear">
    <div class="flexrow clear">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $taxonomy = 'portcats';
        $term = get_the_terms($post_id,$taxonomy);
        $term_id = ($term) ? $term->term_id : '';
        $pagelink = get_permalink();
        $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
        $img_url = ($imgSrc) ? $imgSrc[0] : get_bloginfo('template_url') . '/images/default-thumb.png';
        $post_edit_link = get_edit_post_link($post_id);
        ?>
        <div id="proj-<?php echo $post_id?>" class="flexcol">
            <div class="inside clear">
                <a class="boxlink" href="<?php echo $pagelink; ?>">
                    <span class="thumbnail" style="background-image:url('<?php echo $img_url?>')">
                        <?php  if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail('thumbnail_large'); ?>
                        <?php } else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
                        <?php } ?>
                    </span>
                    <span class="project-info">
                        <h2><?php the_title(); ?></h2>
                        <span class="client"><?php the_field('second_title'); ?></span><!-- client -->
                    </span>
                </a>
                <?php if ( current_user_can('administrator') ) { ?>
                    <a class="editpost" href="<?php echo $post_edit_link ?>">Edit</a>
                <?php } ?>
            </div>
        </div>
        <?php endwhile;  wp_reset_postdata(); ?>
	</div>
</div>
<?php } ?>