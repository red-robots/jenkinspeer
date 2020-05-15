

<?php
  // Get solId value from incoming URL.
  $taxonomy = 'portcats';
  $term_id = $_REQUEST['cat'];
  //get the parent
  $child_term = get_term( $term_id, $taxonomy );
  $parent_term = get_term( $child_term->parent, $taxonomy );

?>

<h1 class="page-title">
<?php 
$url = get_bloginfo('url');
?>
	<?php echo $parent_term->name ?> | 
    <a href="<?php echo $url . '/portfolio-categories/' . $parent_term->slug ?>/#viewall">
    	View All
    </a>
</h1>
<?php
// We now take our term id defined above to list it's childrens terms for navigation. 

$termchildren = get_term_children( $parent_term->term_id, $taxonomy );
?>
<?php if(!empty($termchildren)) : ?>
<div id="subnav">
<ul>
<?php  

foreach ( $termchildren as $child ) {
	$term = get_term_by( 'id', $child, $taxonomy );
	// counter to pad first list item
	++$counter;
  	if($counter == 1) { // change number to pick which one is going to be different
    $listclass = 'firstlist';
    $counter = 0;
  } else { $postclass = 'notfirst'; } ?>

	<li class="<?php echo $listclass; ?>">
    	<a href="<?php echo get_term_link( $term->name, $taxonomy ); ?>">
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