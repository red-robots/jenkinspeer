<?php
$status_choices = get_portfolio_statuses();
$services_arg = array(
        'post_type'=>'services',
        'posts_per_page' => -1,
        'orderby'   => 'title',
        'order'     => 'ASC',
    );
$services_options = get_posts($services_arg);

$taxonomy = 'portcats';
$portfolio_categories = get_terms( array(
    'taxonomy' => $taxonomy,
    'post_types'=> array('portfolio'),
    'hide_empty' => false,
));

$arg = array(
        'post_type'=>'portfolio',
        'posts_per_page' => -1,
        'orderby'   => 'menu_order',
        'order'     => 'ASC',
    );

$defaultPosts = get_posts($arg);
$projects = $defaultPosts;

$get_options = get_portfolio_params();
$filter_args = array();
if( isset($_GET) ) {
   foreach( $_GET as $k=>$v ) {
      if( in_array($k, $get_options) ) {
         $filter_args[$k] = $v;
      }
   }
}

$result = get_portfolio_filter_result($filter_args);
if($result) {
   $projects = $result;
}

$count_filter = 0;
if($filter_args) {
   $unique = array_unique($filter_args);
   $count_filter = ($unique) ? count($unique) : '';
}
if($count_filter>1) {
   if(!$result) {
      $projects = false;
   }
} else {
   $projects = $defaultPosts;
}

$service_selected = ( isset($_GET['service']) && $_GET['service'] ) ? $_GET['service'] : 'all';
$category_selected = ( isset($_GET['category']) && $_GET['category'] ) ? $_GET['category'] : 'all';
$status_selected = ( isset($_GET['status']) && $_GET['status'] ) ? $_GET['status'] : 'all';
$status_choices = FALSE;
?>



<?php if ($defaultPosts) { 
  $pId = get_the_permalink();
  // echo '<pre>';
  //             print_r($pId);
  //             echo '</pre>';

  ?>
<div class="postsFiterWrap">
   <form action="<?php echo get_the_permalink( ); ?>" method="get" id="portfolioFilter" data-currentURL="<?php echo get_the_permalink( ); ?>">
       <?php if ($services_options) { ?>
       <div class="selectStyleWrap">
           <select name="service" class="select-style">
               <option value="all">All Services</option>
               <?php foreach ($services_options as $s) {
               $selected1 = ($service_selected==$s->ID) ? ' selected':'';  ?>
               <option value="<?php echo $s->ID ?>"<?php echo $selected1 ?>><?php echo $s->post_title ?></option> 
               <?php } ?>
           </select>
       </div>
       <?php } ?>

       <?php if ($portfolio_categories) { ?>
       <div class="selectStyleWrap">
           <select name="category" class="select-style">
               <option value="all">All Project Types</option>
               <?php foreach ($portfolio_categories as $c) { 
               $selected2 = ($category_selected==$c->term_id) ? ' selected':'';  ?>
               <option value="<?php echo $c->term_id ?>"<?php echo $selected2 ?>><?php echo $c->name ?></option> 
               <?php } ?>
           </select>
       </div>
       <?php } ?>

       <?php if ($status_choices) { ?>
       <div class="selectStyleWrap">
           <select name="status" class="select-style">
               <option value="all">All Statuses</option>
               <?php foreach ($status_choices as $status=>$statusName) {
               $selected3 = ($status_selected==$status) ? ' selected':'';  ?>
               <option value="<?php echo $status ?>"<?php echo $selected3 ?>><?php echo $statusName ?></option> 
               <?php } ?>
           </select>
       </div>
       <?php } ?>
       <input type="submit" value="Filter" id="filterBtn" style="display:none;">
   </form>
</div>
<?php } ?>

<div id="filterResult">
   <div id="filterContent">

   <?php if( $projects ) { ?>
      <div class="three-column-wrapper clear">
          <div class="flexrow clear">
              <?php foreach($projects as $p) { 
              $post_id = $p->ID;
              $title = $p->post_title;
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
              ?>
              <div id="proj-<?php echo $post_id?>" class="flexcol">
                  <div class="inside clear">
                      <a class="boxlink animated fadeIn" href="<?php echo $pagelink; ?>">
                          <span class="thumbnail" style="background-image:url('<?php echo $img_url?>')">
                              <?php  if ( has_post_thumbnail($post_id) ) { ?>
                                  <?php echo get_the_post_thumbnail($post_id,'thumbnail_large'); ?>
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
              <?php }  wp_reset_postdata(); ?>
          </div> 
      </div>
   <?php } else { ?>

   <div class="three-column-wrapper noResultFound clear">
      <h2 class="noresult">No record found.</h2>
   </div>
<?php } ?>
   </div>
   <div class="spinnerDiv red">
      <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
   </div>
</div>
