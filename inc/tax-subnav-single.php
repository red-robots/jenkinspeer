<?php
  // Get solId value from incoming URL.
  $taxonomy = 'portcats';
  $term_id = $_REQUEST['cat'];
  $topname = get_term( $term_id, $taxonomy );
  //get the parent
  $child_term = get_term( $term_id, $taxonomy );
  $parent_term = get_term( $child_term->parent, $taxonomy );
  // Taxonomy slug
  $slug = $parent_term->slug;
  $homeLink = get_home_url();
  // make a cat link for the term
  $categoryLink = $homeLink . '/portfolio-categories/' . $slug;
  //need one for just top level as well. 
  $topLevelLink = $homeLink . '/portfolio-categories/' . $topname->slug;
  
  
?>


<?php
// We now take our term id defined above to list it's childrens terms for navigation. 
$termchildren = get_term_children( $parent_term->term_id, $taxonomy );
?>
<?php if(!empty($termchildren)) { ?>
<h1 class="category-title">
	<a href="<?php echo $categoryLink; ?>"><?php echo $parent_term->name ?></a> | 
    <a class="viewall" href="<?php echo $homeLink . '/portfolio-categories/' . $parent_term->slug ?>/#viewall">
    	View All
    </a>
</h1>
<nav class="subnav" id="cat-navigation" role="navigation">
<h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?></h3>
<ul class="cat-menu">
<?php  

foreach ( $termchildren as $child ) {
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
        if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>
        
        
	<?php 
	// counter to pad first list item
	++$counter;
  	if($counter == 1) { // change number to pick which one is going to be different
    $listclass = 'firstlist';
    $counter = 0;
    } else { $postclass = 'notfirst'; } 
	
	// which term is active?
	if($term->term_id == $term_id) {
		$isactive = 'active';	
	} else { $isactive = '';	}
	
	?>

	
   <li class="<?php echo $listclass; ?>">
                <a href="<?php the_permalink();?>?cat=<?php echo $term->term_id; ?>" class="<?php echo $isactive; ?>">
					<?php echo $term->name ?>
                </a>
            </li>
        <?php endwhile; endif; wp_reset_query(); ?>
   
   
<?php }

?> 	
</ul>
</nav><!-- subnav -->



<?php } elseif(( $term_id->parent == 0 )) { ?>

<h1 class="category-title">
	<a href="<?php echo $topLevelLink; ?>"><?php echo $topname->name ?></a> <!--| 
    <a href="<?php echo $homeLink . '/portfolio-categories/' . $topname->slug ?>/#viewall">
    	View All
    </a>-->
</h1>
<?php 
$term_id = $_REQUEST['cat'];
$termchildren = get_term_children( $term_id, $taxonomy ); ?>
<nav class="subnav" id="cat-navigation" role="navigation">
<h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?></h3>
<ul class="cat-menu">
<?php  

foreach ( $termchildren as $child ) {
	$term = get_term_by( 'id', $child, $taxonomy );
	
	
	$wpq = array (
        'taxonomy'=>$taxonomy,
        'term'=>$term->slug,
        'order'=>'asc',
        'orderby'=>'title',
		'posts_per_page' => '1'
		);
        $query = new WP_Query ($wpq);
        ?>
	
	<?php
        if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>
        
        
	<?php 
	// counter to pad first list item
	++$counter;
  	if($counter == 1) { // change number to pick which one is going to be different
    $listclass = 'firstlist';
    $counter = 0;
  } else { $postclass = 'notfirst'; } 
  
  // which term is active?
	if($term->term_id == $term_id) {
		$isactive = 'active';	
	} else { $isactive = '';	}
  
  ?>

	
   <li class="<?php echo $listclass; ?> ">
                <a href="<?php the_permalink();?>?cat=<?php echo $term->term_id; ?>" class="<?php echo $isactive; ?>">
					<?php echo $term->name ?>
                </a>
            </li>
        <?php endwhile; endif; wp_reset_query(); ?>
   
   
<?php }

?> 	
</ul>
</div><!-- subnav -->
<?php } else { ?>
<h1 class="category-title">
	<a href="<?php echo $categoryLink; ?>"><?php echo $topname->name ?></a> <!--| 
    <a href="<?php echo $homeLink . '/portfolio-categories/' . $topname->slug ?>/#viewall">
    	View All
    </a>-->
</h1>
<div id="nosubnav"></div>
<?php } ?>