<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );	
$current_term_id = ( isset($term->term_id) && $term->term_id ) ? $term->term_id : '';
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
        $term_id = ( isset($term->term_id) && $term->term_id ) ? $term->term_id : 0;
        $pagelink = get_permalink();
        $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
        $default_thumb = get_bloginfo('template_url') . '/images/image-not-available.jpg';
        $img_url = ($imgSrc) ? $imgSrc[0] : $default_thumb;
        $post_edit_link = get_edit_post_link($post_id);
        $catImages = get_field("category_based_image");
        $feat_image_url =  $img_url;
        $category_image = '';
        $image_alt = '';
        if($catImages) {
            foreach($catImages as $c) {
                $x_img = $c['image'];
                $x_cat_id = $c['category'];
                if($x_cat_id==$current_term_id) {
                    $category_image = $x_img['url'];
                    $feat_image_url = $category_image;
                    $image_alt = $x_img['title'];
                }
            }
        } 
        $image_class = ($category_image || $imgSrc) ? 'has-image':'no-image';
        $placeholder = get_bloginfo("template_url") . '/images/square.png';
        ?>
        <div id="proj-<?php echo $post_id?>" class="flexcol">
            <div class="inside clear">
                <a class="boxlink <?php echo $image_class ?>" href="<?php echo $pagelink; ?>">
                    <span class="thumbnail" style="background-image:url('<?php echo $feat_image_url?>')">
                        <img src="<?php echo $feat_image_url ?>" alt="<?php echo $image_alt ?>" style="visibility:hidden;width:2px;height:2px;position:absolute;z-index:-99" />
                        <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
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