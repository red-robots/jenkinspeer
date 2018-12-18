<?php
function get_post_siblings( $limit = 1, $date = '' ) {
   global $wpdb, $post;
	
  // Custom Category
  $taxonomy = 'portcats';
  // Get term id value from incoming URL
  $term_id = $_REQUEST['cat'];
  
  	if( empty( $date ) )
        $date = $post->post_date;

    $limit = absint( $limit );
    if( !$limit )
        return;

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
		AND tt.taxonomy = 'portcats' 
		AND tt.term_id 
		IN ($term_id) 
        ORDER by 
            p1.post_date DESC
        LIMIT 
            $limit
    )
    UNION 
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
		AND tt.taxonomy = 'portcats' 
		AND tt.term_id 
		IN ($term_id)	
		ORDER by
            p2.post_date ASC
        LIMIT 
            $limit
    ) 
    ORDER by post_date ASC
    " );
    $i = 0;
    $adjacents = array();
    for( $c = count($p); $i < $c; $i++ )
        if( $i < $limit )
            $adjacents['prev'][] = $p[$i];
        else
            $adjacents['next'][] = $p[$i];

    return $adjacents;
}
?>

<div class="proj-pagi-prev">
	<?php 
    $siblings = get_post_siblings( 1 ); 
     $prev = $siblings['prev'];
    
    foreach( $prev as $p )
        $term_id = $_REQUEST['cat'];
        $permalink = get_permalink( $p->ID );
        $link = $permalink . "?cat=" . $term_id;
            echo "<a href='" . $link . "'><span class='plain-text'>Previous</span> PROJECT</a>";
    ?>
</div><!-- proj pagi prev -->


<div class="proj-pagi-next">
	<?php 
    $next = $siblings['next'];
    
    foreach( $next as $p )
        $term_id = $_REQUEST['cat'];
        $permalink = get_permalink( $p->ID );
        $link = $permalink . "?cat=" . $term_id;
             echo "<a href='" . $link . "'><span class='plain-text'>Next</span> PROJECT</a>";
    ?>
</div><!-- proj-pagi-next -->