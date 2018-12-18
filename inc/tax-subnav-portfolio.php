
<nav class="subnav" id="cat-navigation" role="navigation">
<h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?></h3>
	<ul class="cat-menu">
    
    <?php  
/* List all terms associated with a Custom Taxonomy  */
$getArgs = array(
	'parent'       => 0,
	'order' => 'DESC',
	'orderby' => 'count',
    'hide_empty'    => false,
);
$terms = get_terms('portcats', $getArgs);
 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
     foreach ( $terms as $term ) { 
	 
	 // counter to pad first list item
		++$counter;
  		if($counter == 1) { // change number to pick which one is going to be different
   		$listclass = 'firstlist';
   		//$counter = 0;
  		} else { $listclass = 'notfirst'; }
	 ?>
      
      
    <li class="<?php echo $listclass; ?>">
    	<a href="<?php echo get_term_link( $term ); ?>">
			<?php echo $term->name; ?>
       </a>
   </li>
      
      
   <?php  }
 } ?>
	</ul>
</nav><!-- subnav -->