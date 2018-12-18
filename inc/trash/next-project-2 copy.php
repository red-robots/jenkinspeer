<div class="proj-pagi-prev">
<?php $prev_post = get_adjacent_post( true, '', true, 'groups' );  ?>
<?php if ( !empty( $prev_post ) ): ?>
 <?php // get the id of the category you just came from
 $term_id = $_REQUEST['cat']; ?>
 	<a href="<?php echo $baseurl . '/portfolio/' . $prev_post->post_name; ?>/?cat=<?php echo $term_id; ?>"><span class="plain-text">Previous</span> PROJECT</a>
 <?php endif; ?>
<?php //be_previous_post_link( '%link', '<span class="plain-text">Previous</span> PROJECT', true, '', 'portcats' ); // uses plugin function ?> 
</div><!-- proj pagi prev -->
<div class="proj-pagi-next">

<?php $next_post = get_adjacent_post( true, '', false, 'groups' ); ?>
 <?php if ( !empty( $next_post ) ): ?>
 	<a href="<?php echo $baseurl . '/portfolio/' . $next_post->post_name; ?>/?cat=<?php echo $term_id; ?>"><span class="plain-text">Next</span> PROJECT</a>
 <?php endif; ?>
<?php 
//echo $next_post; 
//be_next_post_link( '%link', '<span class="plain-text">Next</span> PROJECT', true, '', 'portcats' ); // uses plugin function ?>
</div><!-- proj pagi next -->