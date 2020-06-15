<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if ( is_front_page() || is_home() ) {
        $classes[] = 'homepage';
    } else {
        $classes[] = 'subpage';
    }

	$browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

function get_portfolio_params() {
	return array('service','category','status');
}

function get_portfolio_statuses() {
	$stats = get_field_object("field_5ee312ad0f80c"); /* Status */
	$status_choices = ( isset($stats['choices']) && $stats['choices'] ) ? $stats['choices'] : '';
	return $status_choices;
}


function get_portfolio_filter_result($args) {
	global $wpdb;

	if( empty($args) ) return '';

	//echo "<pre>";

	$post_type = 'portfolio';
	$taxonomy = 'portcats';

	foreach($args as $v=>$k) {
		if($k=='all') {
			unset($args[$v]);
		}
	}

	$service = ( isset($args['service']) && $args['service'] ) ? $args['service'] : '';
	$category = ( isset($args['category']) && $args['category'] ) ? $args['category'] : '';
	$status = ( isset($args['status']) && $args['status'] ) ? $args['status'] : '';

	$items = array();
	$count_args = ($args) ? count($args) : 0;

	if($args) {
		foreach( $args as $field=>$val ) {
			if($field=='service') {
				$result = _search_item_by_service($val,$post_type);
				if($result) {
					foreach($result as $row) {
						$id = $row->ID;
						$items[$id][] = $row;
					}
				}
			}
			if($field=='category') {
				$result = _search_item_by_category($val,$post_type);
				if($result) {
					foreach($result as $row) {
						$id = $row->ID;
						$items[$id][] = $row;
					}
				}
			}
			if($field=='status') {
				$result = _search_item_by_status($val,$post_type);
				if($result) {
					foreach($result as $row) {
						$id = $row->ID;
						$items[$id][] = $row;
					}
				}
			}
		}
	} 

	$final_output = array();
	if($items) {
		foreach($items as $id => $posts) {
			$count = count($posts);
			if($count==$count_args) {
				$final_output[] = $posts[0];
			}
		}
	}

	return ($final_output) ? $final_output : '';
	
}

function _search_item_by_service($service,$post_type) {
	global $wpdb;
	$result = array();
	$metaQuery = "SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key='tag_services' AND (meta_value IS NOT NULL OR meta_value!='')";
	$tagServices = $wpdb->get_results($metaQuery);
	$portfolio_post_ids = array();
	if($tagServices) {
		foreach($tagServices as $k=>$m) {
			$portfolio_post_id = $m->post_id;
			$metaValues = ( $m->meta_value ) ? @unserialize($m->meta_value) : '';
			if($metaValues) {
				foreach($metaValues as $pid) {
					$meta_post_ids[] = $pid;
					if($service==$pid) {
						$portfolio_post_ids[$pid][] = $portfolio_post_id;
					}
				}
			}
		}
	}

	
	if($portfolio_post_ids) {
		if( isset($portfolio_post_ids[$service]) && $portfolio_post_ids[$service] ) {
			foreach($portfolio_post_ids[$service] as $id) {
				$query1 = "SELECT p.* FROM {$wpdb->prefix}posts p WHERE p.ID=".$id." AND p.post_type='".$post_type."' AND p.post_status='publish'";
				$posts = $wpdb->get_row($query1);
				if($posts) {
					$result[] = $posts;
				}
			}
		}
	}
	return ($result) ? $result : '';
}

function _search_item_by_category($category,$post_type) {
	global $wpdb;
	$termQuery = "SELECT p.*
				  FROM {$wpdb->prefix}term_taxonomy term, {$wpdb->prefix}term_relationships rel, {$wpdb->prefix}posts p 
				  WHERE term.term_taxonomy_id=rel.term_taxonomy_id AND term.term_id=".$category." AND rel.object_id=p.ID AND p.post_type='".$post_type."' AND p.post_status='publish'";
	$posts = $wpdb->get_results($termQuery);
	return ($posts) ? $posts : '';
}

function _search_item_by_status($status,$post_type) {
	global $wpdb;
	$statusQuery = "SELECT p.* FROM {$wpdb->prefix}postmeta m, {$wpdb->prefix}posts p WHERE m.post_id=p.ID AND m.meta_key='status' AND m.meta_value='".$status."' AND p.post_type='".$post_type."' AND p.post_status='publish'";
	$posts = $wpdb->get_results($statusQuery);
	return ($posts) ? $posts : '';
}

