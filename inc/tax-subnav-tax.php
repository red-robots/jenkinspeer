<?php   // We need to get the term that this post is in so we can print it up top and list it's child terms below in a navigation list.

// get some info about the term queried
$queried_object = get_queried_object(); 
// Taxonomy Term
$taxonomy = $queried_object->taxonomy;
// Taxonomy ID
$term_id = $queried_object->term_id;
$view_all_link = '';
?>


<h1 class="category-title">
	<?php echo get_queried_object()->name; ?>
</h1>

<?php
// We now take our term id defined above to list it's childrens terms for navigation. 
$taxonomy_name = 'portcats';
$termchildren = get_term_children( $term_id, $taxonomy_name );
?>
<?php if(!empty($termchildren)) : ?>
<nav class="subnav" id="cat-navigation" role="navigation">
<h3 class="menu-toggle"><?php _e( 'Filter by Project Type', 'twentytwelve' ); ?> <span class="arrow"></span></h3>
<ul class="cat-menu">

<?php 
    $term_slug = get_query_var( 'term' );
    $taxonomyName = get_query_var( 'taxonomy' );
    $current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
    $termchildren = get_term_children( $current_term->term_id, $taxonomyName );

    foreach ($termchildren as $child) {
    $term = get_term_by( 'id', $child, $taxonomyName );
        $wpq = array (
        'taxonomy'=>$taxonomyName,
        'term'=>$term->slug,
        /*'order'=>'asc',
        'orderby'=>'title',*/
		'posts_per_page' => '1'
		);
        $query = new WP_Query ($wpq);
        //echo "$term->name:<br />"; 
        ?>

        <?php
         $counter = 1;
        if ($query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>
        <?php 
			// counter to pad first list item
            $listclass = ($counter==1) ? 'firstlist':'notfirst'; ?>    
            <li class="<?php echo $listclass; ?>">
                <a href="<?php the_permalink();?>?cat=<?php echo $term->term_id; ?>"><?php echo $term->name ?></a>
            </li>
        <?php $counter++; endwhile; endif; wp_reset_query(); ?>
        <?php
    }
?>




<?php  

/*foreach ( $termchildren as $child ) {
	$term = get_term_by( 'id', $child, $taxonomy_name );
	echo '<li><a href="' . get_term_link( $term->name, $taxonomy_name ) . '">' . $term->name . '</a></li>';
}*/

?> 	
</ul>
</nav><!-- subnav -->
<?php else : ?>
<div id="nosubnav"></div>
<?php endif; ?>