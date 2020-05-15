<?php   // We need to get the term that this post is in so we can print it up top and list it's child terms below in a navigation list.

// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;

?>


<h1 class="page-title">
	<?php echo get_queried_object()->name; ?> | 
    <a href="<?php bloginfo('url'); ?>/portfolio-category/<?php echo get_queried_object()->slug; ?>">
    	View All
    </a>
</h1>

<?php
// We now take our term id defined above to list it's childrens terms for navigation. 
$taxonomy_name = 'portcats';
$termchildren = get_term_children( $term_id, $taxonomy_name );
?>
<?php if(!empty($termchildren)) : ?>
<div id="subnav">
<ul>
<?php  

foreach ( $termchildren as $child ) {
	$term = get_term_by( 'id', $child, $taxonomy_name );
	// counter to pad first list item
	++$counter;
  	if($counter == 1) { // change number to pick which one is going to be different
    $listclass = 'firstlist';
    $counter = 0;
  } else { $postclass = 'other-post-cat'; } ?>

	<li class="<?php echo $listclass; ?>">
    	<a href="<?php echo get_term_link( $term->name, $taxonomy_name ); ?>">
			<?php echo $term->name; ?>
       </a>
   </li>
<?php }

?> 	
</ul>
</div><!-- subnav -->
<?php else : ?>
<div id="nosubnav"></div>
<?php endif; ?>