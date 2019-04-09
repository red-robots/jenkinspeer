<?php
  // Get solId value from incoming URL.
  $taxonomy = 'portcats';
  $term_id =( isset($_REQUEST['cat']) && $_REQUEST['cat'] && is_numeric($_REQUEST['cat']) ) ? $_REQUEST['cat'] : 0;
  $topname = get_term( $term_id, $taxonomy );
  $topname_slug = ( isset($topname->slug) && $topname->slug ) ? $topname->slug : '';
  $topname_name = ( isset($topname->name) && $topname->name ) ? $topname->name : '';
  //get the parent
  $child_term = get_term( $term_id, $taxonomy );
  $child_parent_id = ( isset($child_term->parent) ) ? $child_term->parent : 0;
  $parent_term = get_term( $child_parent_id, $taxonomy );
  // Taxonomy slug
  $slug = '';
  if( isset($parent_term->slug) && $parent_term->slug ) {
    $slug = $parent_term->slug;
  } else {
    if( isset($child_term->slug) && $child_term->slug ) {
      $slug = $child_term->slug;
    }
  }

  $homeLink = get_home_url();
  $portfolio_pagelink = $homeLink . '/portfolio/';
  // make a cat link for the term
  if( $slug ) {
    $categoryLink = $homeLink . '/portfolio-categories/' . $slug;
  } else {
    $categoryLink = $portfolio_pagelink;
  }

  //need one for just top level as well. 
  if($topname_slug) {
    $topLevelLink = $homeLink . '/portfolio-categories/' . $topname_slug;
  } else {
    $topLevelLink = $portfolio_pagelink;
  }
  

// We now take our term id defined above to list it's childrens terms for navigation. 
$parent_term_id = ( isset($parent_term->term_id) && $parent_term->term_id ) ? $parent_term->term_id : 0;
$termchildren = get_term_children( $parent_term_id, $taxonomy );

if(!empty($termchildren)) {  ?>
<h1 class="category-title">
	<a href="<?php echo $categoryLink; ?>"><?php echo $parent_term->name ?></a> | 
  <a class="viewall" href="<?php echo $homeLink . '/portfolio-categories/' . $parent_term->slug ?>/#viewall">View All</a>
</h1>
<nav class="subnav" id="cat-navigation" role="navigation">
  <h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?><span class="arrow"></span></h3>
  <ul class="cat-menu">
  <?php  foreach ( $termchildren as $child ) {
  	$term = get_term_by( 'id', $child, $taxonomy );
  	$wpq = array (
          'taxonomy'=>$taxonomy,
          'term'=>$term->slug,
         /* 'order'=>'asc',
          'orderby'=>'title',*/
  		'posts_per_page' => '1'
  		);
          $query = new WP_Query ($wpq);
          ?>
  	
  	<?php
    $counter = 1;
    if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); 
    	// counter to pad first list item
      $listclass = ($counter==1) ? 'firstlist':'notfirst';
    	// which term is active?
      $isactive = ($term->term_id == $term_id) ? 'active':''; 
      ?>
      <li class="<?php echo $listclass; ?>">
          <a href="<?php the_permalink();?>?cat=<?php echo $term->term_id; ?>" class="<?php echo $isactive; ?>"><?php echo $term->name ?></a>
      </li>
    <?php $counter++; 
    endwhile; endif; wp_reset_query(); ?>
     
  <?php } ?> 	
  </ul>
</nav><!-- subnav -->

<?php } elseif(( $term_id == 0 )) { ?>

  <?php if ( $topname_name ) { ?>
    <h1 class="category-title">
      <a href="<?php echo $topLevelLink; ?>"><?php echo $topname_name; ?></a>
    </h1>
  <?php } ?>

<?php 
$term_id =( isset($_REQUEST['cat']) && $_REQUEST['cat'] && is_numeric($_REQUEST['cat']) ) ? $_REQUEST['cat'] : 0;
$termchildren = get_term_children( $term_id, $taxonomy ); ?>
<nav class="subnav" id="cat-navigation" role="navigation">
  <h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?> <span class="arrow"></span></h3>
  <ul class="cat-menu">
    <?php  foreach ( $termchildren as $child ) {
      $term = get_term_by( 'id', $child, $taxonomy );
      $wpq = array (
        'taxonomy'=>$taxonomy,
        'term'=>$term->slug,
        'order'=>'asc',
        'orderby'=>'title',
      'posts_per_page' => '1'
      );
      $query = new WP_Query ($wpq);

      $counter = 1;
      if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); 
        $listclass = ($counter==1) ? 'firstlist':'notfirst';
        // which term is active?
        $isactive = ($term->term_id == $term_id) ? 'active':''; ?>
         <li class="<?php echo $listclass; ?> ">
              <a href="<?php the_permalink();?>?cat=<?php echo $term->term_id; ?>" class="<?php echo $isactive; ?>"><?php echo $term->name ?></a>
          </li>
      <?php $counter++; endwhile; endif; wp_reset_query(); ?>
    <?php } ?> 	
  </ul>
  </div><!-- subnav -->
  <?php } else { ?>

    <?php if ( $topname_name ) { ?>
      <h1 class="category-title">
        <a href="<?php echo $categoryLink; ?>"><?php echo $topname_name; ?></a>
      </h1>
    <?php } ?>

<div id="nosubnav"></div>
<?php } ?>