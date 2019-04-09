<?php
function get_post_siblings( $limit = 1, $date = '' ) {
   global $wpdb, $post;
       
  // Custom Category
  $taxonomy = 'portcats';
  // Get term id value from incoming URL
  $term_id =( isset($_REQUEST['cat']) && $_REQUEST['cat'] && is_numeric($_REQUEST['cat']) ) ? $_REQUEST['cat'] : 0;

  //echo $term_id;
  $terms = get_the_terms( $post->ID, $taxonomy );
  // echo $terms->term_id;
    if( empty( $date ) )
        $date = $post->post_date;
 
    $limit = absint( $limit );
    if( !$limit )
        return;
        
    // Get previous posts into $p
    $p = $wpdb->get_results( "
   (
       SELECT
           p1.post_title,
           p1.post_date,
           p1.ID
       FROM
           $wpdb->posts p1
                INNER JOIN wp_term_relationships
                AS tr
                ON p1.ID = tr.object_id
                INNER JOIN wp_term_taxonomy tt
                ON tr.term_taxonomy_id = tt.term_taxonomy_id
       WHERE
           p1.post_date < '$date' AND
           p1.post_type = 'portfolio' AND
           p1.post_status = 'publish'
                AND tt.taxonomy = '$taxonomy'
                AND tt.term_id
                IN ($term_id)
       ORDER by p1.post_date DESC
       LIMIT $limit
	   )
        " );
   
    // Get next posts into $n
    $n = $wpdb->get_results( "
       (
       SELECT
           p2.post_title,
           p2.post_date,
           p2.ID
       FROM
           $wpdb->posts p2
                 INNER JOIN wp_term_relationships
                AS tr
                ON p2.ID = tr.object_id
                INNER JOIN wp_term_taxonomy tt
                ON tr.term_taxonomy_id = tt.term_taxonomy_id
       WHERE
           p2.post_date > '$date' AND
           p2.post_type = 'portfolio' AND
           p2.post_status = 'publish'
                AND tt.taxonomy = '$taxonomy'
                AND tt.term_id
                IN ($term_id)  
      ORDER by post_date ASC
       LIMIT $limit
       )
       
       " );
   
    $adjacents = array();
    $adjacents['prev'] = array();
    $adjacents['next'] = array();
    
    for( $i=0; $i<count($p); $i++ ) {
        $adjacents['prev'][] = $p[$i];
    }
    
    for( $i=0; $i<count($n); $i++ ) {
        $adjacents['next'][] = $n[$i];
    }    
 
    return $adjacents;
}
 
?>
 
<div class="proj-pagi-prev">
  <?php
  $siblings = get_post_siblings( 1 );
  $next = $siblings['next'];
    
  if( $next ) {
    foreach( $next as $n ) {
      $term_id = $_REQUEST['cat'];
      $permalink = get_permalink( $n->ID );
      $link = $permalink . "?cat=" . $term_id;
  		if($n != "") {
               echo "<a href='" . $link . "'><span class='plain-text'>Previous</span> PROJECT</a>";
  		}
    }
  } ?>
</div><!-- proj pagi prev -->
 
<div class="proj-pagi-next">
  <?php
  $prev = $siblings['prev'];
  if( $prev ) {
    foreach( $prev as $p ) {
      $term_id = $_REQUEST['cat'];
      $permalink = get_permalink( $p->ID );
      $link = $permalink . "?cat=" . $term_id;
  		if($p != "") {
              echo "<a href='" . $link . "'><span class='plain-text'>Next</span> PROJECT</a>";
  		}
    }
  } ?>
</div><!-- proj-pagi-next -->

