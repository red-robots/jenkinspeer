<?php
/* 
 * Portfolio category page 
*/

get_header(); ?>

<div id="primary" class="full-content-area clear">
	<div id="content">
		<?php 
			$obj = get_queried_object(); 
			$page_title = ( isset($obj->name) && $obj->name ) ? $obj->name : '';
		?>
		<h1 class="category-title"><?php echo $page_title; ?></h1>

		<?php get_template_part('inc/tax-subnav-portfolio'); ?>

		<?php  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		if ( $term->parent == 0 ) { // if is top level term ?>
			
			<?php //get_template_part('inc/tax-subnav-tax'); ?>

		<?php } ?>

		<?php get_template_part('inc/projects_by_category'); ?>

	</div>
</div>

<?php get_footer(); ?>