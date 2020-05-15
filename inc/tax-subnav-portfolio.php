<nav class="subnav" id="cat-navigation" role="navigation">
  <h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?> <span class="arrow"></span></h3>
	<ul class="cat-menu">
    <?php  
    /* List all terms associated with a Custom Taxonomy  */
    $getArgs = array(
      'parent'       => 0,
      'order' => 'ASC',
      'orderby' => 'name',
      'hide_empty'    => false,
    );
    $terms = get_terms('portcats', $getArgs);
    if ( !empty( $terms ) && !is_wp_error( $terms ) ){
      $counter = 1;
      foreach ( $terms as $term ) { 
        $listclass = ($counter==1) ? 'firstlist':'notfirst'; ?>
        <li class="<?php echo $listclass; ?>">
          <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
        </li>
    <?php $counter++; }
    } ?>
	</ul>
</nav><!-- subnav -->