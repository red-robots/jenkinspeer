<?php 
$obj = get_queried_object();
$slug = $obj->slug;

$wp_query = new WP_Query();

if( $obj->taxonomy == 'portcats' ) {
  
    $wp_query->query(array(
      'post_type'=>'portfolio',
      'posts_per_page' => -1,
      'tax_query' => array(
          array(
              'taxonomy' => 'portcats',
              'field'    => 'slug',
              'terms'    => $slug,
          ),
      )
    ));

} elseif( $obj->taxonomy == 'service_type' ) {

  $wp_query->query(array(
    'post_type'=>'portfolio',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'service_type',
            'field'    => 'slug',
            'terms'    => $slug,
        ),
    )
  ));
} else {

    $wp_query->query(array(
      'post_type'=>'portfolio',
      'posts_per_page' => -1,
      // 'facetwp' => true,
    ));

}

	
  $pId = get_the_permalink();
// echo '<pre>';
// print_r($obj);
// echo '</pre>';


  ?>
<?php 
$termsCat = get_terms( array(
    'taxonomy' => 'portcats',
    'hide_empty' => false,
) );
$serviceCat = get_terms( array(
    'taxonomy' => 'service_type',
    'hide_empty' => false,
) );
// echo '<pre>';
// print_r($terms);
// echo '</pre>';
 ?>
<div class="postsFiterWrap">
  <div class="facetwp-facet">
    <select class="dynamic">
      <option value="">Category</option>
      <?php foreach( $termsCat as $tc ) { ?>
        <option value="<?php echo get_term_link( $tc->term_id ); ?>"><?php echo $tc->name; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="facetwp-facet">
    <select class="dynamic">
      <option value="">Service</option>
      <?php foreach( $serviceCat as $sc ) { ?>
        <option value="<?php echo get_term_link( $sc->term_id ); ?>"><?php echo $sc->name; ?></option>
      <?php } ?>
    </select>
  </div>
</div>

<?php //} ?>

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
              $post_thumbnail_id = get_post_thumbnail_id( $post_id );
              $taxonomy = 'portcats';
              $term = get_the_terms($post_id,$taxonomy);
              $term_id = ( isset($term->term_id) && $term->term_id ) ?  $term->term_id: 0;
              $pagelink = get_the_permalink( $post_id );
              $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
              $img_url = ($imgSrc) ? $imgSrc[0] : get_bloginfo('template_url') . '/images/default-thumb.png';
              $post_edit_link = get_edit_post_link($post_id);

              // Category Options
              $useImg = '';
              if( have_rows('category_based_image', $post_id) ) : 
                while(have_rows('category_based_image', $post_id)) : the_row();
                  $catImg = get_sub_field( 'image' );
                  $catS = get_sub_field( 'category' );
                  // echo '<pre>';
                  // print_r($catS);
                  // echo '</pre>';
                  // echo $catS;
                  // echo $obj->term_id;
                  if( $catS == $obj->term_id ) {
                    $useImg = $catImg['sizes']['large'];
                    // 
                  }
                endwhile;
              endif;

              
              // echo '<pre>';
              // print_r($pagelink);
              // echo '</pre>';
              $title = get_the_title();
              // echo $this->http_params['choose_cat'];
              if( $useImg != '' ) {
                $img_url = $useImg;
              }  elseif ( has_post_thumbnail($post_id) ) {

              } else {
                $img_url = get_bloginfo('template_url').'/images/default-thumb.png';
              }
              ?>
              <div id="proj-<?php echo $post_id?>" class="flexcol">
                  <div class="inside clear">
                      <a class="boxlink animated fadeIn" href="<?php echo $pagelink; ?>">
                          <span class="thumbnail" style="background-image:url('<?php echo $img_url?>')">
                              <?php  
                              if( $useImg != '' ) { ?>
                                <img src="<?php echo $img_url; ?>">
                              <?php } elseif ( has_post_thumbnail($post_id) ) { ?>
                                  <?php echo get_the_post_thumbnail($post_id,'thumbnail_large'); ?>
                              <?php } else { ?>
                                  <img src="<?php echo get_bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
                              <?php } ?>
                          </span>
                          <!-- <span class="thumbnail">
                            <?php if( $useImg != '' ) { ?>
                              <img src="<?php echo $useImg; ?>" alt="changed" />
                            <?php }  elseif ( has_post_thumbnail($post_id) ) { 
                                echo get_the_post_thumbnail($post_id,'thumbnail_large'); 
                            } else { ?>
                                <img src="<?php echo get_bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
                            <?php } ?>
                          </span> -->
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
              <?php 
          		// }
          		endwhile;  
              wp_reset_postdata(); ?>
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
<script>
    $(function(){
      // bind change event to select
      $('.dynamic').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>
