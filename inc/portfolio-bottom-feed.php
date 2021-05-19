<?php
// $status_choices = get_portfolio_statuses();
// $services_arg = array(
//         'post_type'=>'services',
//         'posts_per_page' => -1,
//         'orderby'   => 'title',
//         'order'     => 'ASC',
//     );
// $services_options = get_posts($services_arg);

// $taxonomy = 'portcats';
// $portfolio_categories = get_terms( array(
//     'taxonomy' => $taxonomy,
//     'post_types'=> array('portfolio'),
//     'hide_empty' => false,
// ));

// $arg = array(
//         'post_type'=>'portfolio',
//         'posts_per_page' => -1,
//         'orderby'   => 'menu_order',
//         'order'     => 'ASC',
//     );

// $defaultPosts = get_posts($arg);
// $projects = $defaultPosts;

// $get_options = get_portfolio_params();
// $filter_args = array();
// if( isset($_GET) ) {
//    foreach( $_GET as $k=>$v ) {
//       if( in_array($k, $get_options) ) {
//          $filter_args[$k] = $v;
//       }
//    }
// }

// $result = get_portfolio_filter_result($filter_args);
// if($result) {
//    $projects = $result;
// }

// $count_filter = 0;
// if($filter_args) {
//    $unique = array_unique($filter_args);
//    $count_filter = ($unique) ? count($unique) : '';
// }
// if($count_filter>1) {
//    if(!$result) {
//       $projects = false;
//    }
// } else {
//    $projects = $defaultPosts;
// }

// $service_selected = ( isset($_GET['service']) && $_GET['service'] ) ? $_GET['service'] : 'all';
// $category_selected = ( isset($_GET['category']) && $_GET['category'] ) ? $_GET['category'] : 'all';
// $status_selected = ( isset($_GET['status']) && $_GET['status'] ) ? $_GET['status'] : 'all';
// $status_choices = FALSE;
?>

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'portfolio',
	'posts_per_page' => -1,
	'facetwp' => true,
));
	 ?>

<div class="postsFiterWrap">
   <?php echo do_shortcode('[facetwp facet="project_type"]'); ?>
   <?php echo do_shortcode('[facetwp facet="portfolio_services"]'); ?>
</div>


<div id="filterResult">
   <div id="filterContent">



   <?php if ($wp_query->have_posts()) : ?>
      <div class="three-column-wrapper clear">
          <div class="flexrow clear">
              <?php 
              // foreach($projects as $p) { 
              while ($wp_query->have_posts()) : $wp_query->the_post();
              $post_id = $p->ID;
              // $title = $p->post_title;
              $title = get_the_title();
              if( have_rows('category_based_image') ) : while( have_rows('category_based_image') ): the_row();
              	$cat = get_sub_field('category');
              	$catImg = get_sub_field('image');
              	// echo '<pre>';
		             //  print_r($catImg);
		             //  echo '</pre>';
              	//echo $catImg['sizes']['thumbnail_large'];
              endwhile; endif;
              // echo '<pre>';
              // print_r($catImg);
              // echo '</pre>';

    //           if (isset($_GET['_project_type']) && $catImg != '') {
				//     //echo $_GET['_project_type'];
    //           		$imgSrc = $catImg['sizes']['large-thumbnail'];
    //           		echo $imgSrc;
              		
				// } else {
				//     // Fallback behaviour goes here
				//     $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
				// }
				// echo $imgSrc;
              $post_thumbnail_id = get_post_thumbnail_id( $post_id );
              $taxonomy = 'portcats';
              $term = get_the_terms($post_id,$taxonomy);
              $term_id = ( isset($term->term_id) && $term->term_id ) ?  $term->term_id: 0;
              $pagelink = get_the_permalink( $post_id );
              $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
              $img_url = ($imgSrc) ? $imgSrc[0] : get_bloginfo('template_url') . '/images/default-thumb.png';
              $post_edit_link = get_edit_post_link($post_id);
              // echo '<pre>';
              // print_r($pagelink);
              // echo '</pre>';

//echo ac_ajax_custom_image_fetch();              ?>
              <div id="proj-<?php echo $post_id?>" class="flexcol">
                  <div class="inside clear">
                      <a class="boxlink animated fadeIn" href="<?php echo $pagelink; ?>">
                          <span class="thumbnail" style="background-image:url('<?php echo $img_url; ?>')">
                              <?php  if ( has_post_thumbnail($post_id) ) { 
                              	if( $img_url ) { ?>
                                  <?php echo get_the_post_thumbnail($post_id,'thumbnail_large'); ?>
                                  <?php  ?>
                                  <img src="<?php echo $img_url; ?>">
                              <?php } else { ?>
                                  <img src="<?php echo get_bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
                              <?php } ?>
                          </span>
                          <span class="project-info">
                              <h2><?php echo $title ?></h2>
                              <span class="client"><?php echo get_field('second_title',$post_id); ?></span><!-- client -->
                          </span>
                      </a>
                      <?php if ( current_user_can('administrator') ) { ?>
                          <a class="editpost" href="<?php echo $post_edit_link ?>">Edit</a>
                      <?php } ?>
                  </div>
              </div>
              <?php endwhile;
              //}  wp_reset_postdata(); ?>
          </div> 
      </div>
   <?php else : ?>

   <div class="three-column-wrapper noResultFound clear">
      <h2 class="noresult">No record found.</h2>
   </div>
<?php endif; ?>
   </div>
   <div class="spinnerDiv red">
      <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
   </div>
</div>
