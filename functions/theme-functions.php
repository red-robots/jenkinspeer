<?php
 // Enqueueing all the java script in a no conflict mode
 function ineedmyjava() {
	if (!is_admin()) {
 
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1', false);
		wp_enqueue_script('jquery');
		
		// other scripts...
		// wp_register_script(
		// 	'thumbslider',
		// 	get_bloginfo('template_directory') . '/js/jquery.easing.1.3.js',
		// 	array('jquery') );
		// wp_enqueue_script('thumbslider');
		
		
		// other scripts...
		/*wp_register_script(
			'catnav',
			get_bloginfo('template_directory') . '/js/cat-navigation.js',
			array('jquery') );
		wp_enqueue_script('catnav');*/
		
	
		// other scripts...
		// wp_register_script(
		// 	'projgalleryplus',
		// 	get_bloginfo('template_directory') . '/js/gallerificPlus.js',
		// 	array('jquery') );
		// wp_enqueue_script('projgalleryplus');
		
		
		// other scripts...
		// wp_register_script(
		// 	'history',
		// 	get_bloginfo('template_directory') . '/js/jquery.history.js',
		// 	array('jquery') );
		// wp_enqueue_script('history');
		
		
		 //other scripts...
		// wp_register_script(
		// 	'opacityrollover',
		// 	get_bloginfo('template_directory') . '/js/jquery.opacityrollover.js',
		// 	array('jquery') );
		// wp_enqueue_script('opacityrollover');
		
		
		 //other scripts...
		// wp_register_script(
		// 	'jui',
		// 	get_bloginfo('template_directory') . '/js/jquery-ui.js',
		// 	array('jquery') );
		// wp_enqueue_script('jui');
		
		
		
		
		// other scripts...
		// wp_register_script(
		// 	'carousel',
		// 	get_bloginfo('template_directory') . '/js/jquery.jcarousel.js',
		// 	array('jquery') );
		// wp_enqueue_script('carousel');
		
		
		
		
		
	
		wp_register_script(
			'masonary',
			get_bloginfo('template_directory') . '/js/isotope.js',
			array('jquery') );
		wp_enqueue_script('masonary');


    wp_register_script(
      'imagesloaded',
      get_bloginfo('template_directory') . '/js/images-loaded.js',
      array('jquery') );
    wp_enqueue_script('imagesloaded');

    // other scripts...
    // wp_register_script(
    //   'custom',
    //   get_bloginfo('template_directory') . '/js/custom.js',
    //   array('jquery') );
    // wp_enqueue_script('custom');
		
	}
}
 
add_action('wp_enqueue_scripts', 'ineedmyjava');


add_image_size( 'leadership', 150, 9999 ); //150 pixels wide (and unlimited height ... for the leadership page)
add_image_size( 'lightbox', 800, 9999 ); //150 pixels wide (and unlimited height ... for the leadership page)
add_image_size( 'home-thumbnail', 210, 210, true ); //
add_image_size( 'home-slider', 1500, 656, true ); //
add_image_size( 'large-thumbnail', 350, 350, true ); //
add_image_size( 'gallery-thumbnail', 90, 90, true ); //
add_image_size( 'home-thumbnail', 55, 55, array( 'center', 'top') ); //
add_image_size( 'peoplelist', 400, 400, array( 'center', 'top') ); //

// Vcards
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	return $existing_mimes;
}



/**
 * To access the data within the "Query Arguments" box, use:
 * $this->http_params['choose_city']
 */

add_action( 'wp_footer', function() {
    $choose_city = get_field( 'choose_city' );
    if( have_rows('category_based_image') ) : while( have_rows('category_based_image') ): the_row();
	  	$cat = get_sub_field('category');
	  	$catImg = get_sub_field('image');
	  	// echo '<pre>';
	         //  print_r($catImg);
	         //  echo '</pre>';
	  	//echo $catImg['sizes']['thumbnail_large'];
	  endwhile; endif;
?>
<script>
(function($) {
    $(document).on('facetwp-refresh', function() {
        FWP_HTTP.choose_cat = <?php echo json_encode( $catImg ); ?>;
     });
})(jQuery);
</script>
<?php
}, 100 );
/* ==========================
		
			Custom Post Types 
			
===============================*/
require( get_template_directory() . '/functions/post-types.php' );

// add_action('init', 'js_custom_init');
// function js_custom_init() 
// {

  
  
//   // Register the Projects ... 
  
//    $labels = array(
// 	'name' => _x('Portfolio', 'post type general name'),
//     'singular_name' => _x('Portfolio', 'post type singular name'),
//     'add_new' => _x('Add New', 'Portfolio'),
//     'add_new_item' => __('Add New Portfolio'),
//     'edit_item' => __('Edit Portfolio'),
//     'new_item' => __('New Portfolio'),
//     'view_item' => __('View Portfolio'),
//     'search_items' => __('Search Portfolio'),
//     'not_found' =>  __('No Portfolio found'),
//     'not_found_in_trash' => __('No Portfolio found in Trash'), 
//     'parent_item_colon' => '',
//     'menu_name' => 'Portfolio'
//   );
//   $args = array(
// 	'labels' => $labels,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_ui' => true, 
//     'show_in_menu' => true, 
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'portfolio' ),
//     'capability_type' => 'post',
//     'has_archive' => false, 
//     'hierarchical' => false,
//     'menu_position' => 20,
//     'supports' => array('title','editor','custom-fields','thumbnail'),
// 	//'taxonomies' => array('post_tag', 'categories') 
	
//   ); 
//   register_post_type('portfolio',$args);
  
  
  
//     // Services ... 
  
//    $labels = array(
// 	'name' => _x('Services', 'post type general name'),
//     'singular_name' => _x('Service', 'post type singular name'),
//     'add_new' => _x('Add New', 'Service'),
//     'add_new_item' => __('Add New Service'),
//     'edit_item' => __('Edit Service'),
//     'new_item' => __('New Service'),
//     'view_item' => __('View Service'),
//     'search_items' => __('Search Services'),
//     'not_found' =>  __('No Services found'),
//     'not_found_in_trash' => __('No Services found in Trash'), 
//     'parent_item_colon' => '',
//     'menu_name' => 'Services'
//   );
//   $args = array(
// 	'labels' => $labels,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_ui' => true, 
//     'show_in_menu' => true, 
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'portfolio-item' ),
//     'capability_type' => 'post',
//     'has_archive' => false, 
//     'hierarchical' => false,
//     'menu_position' => 20,
//     'supports' => array('title','editor','custom-fields','thumbnail'),
// 	//'taxonomies' => array('post_tag', 'categories') 
	
//   ); 
//   register_post_type('services',$args);
  
//   // People ... 
  
//    $labels = array(
// 	'name' => _x('People', 'post type general name'),
//     'singular_name' => _x('People', 'post type singular name'),
//     'add_new' => _x('Add New', 'People'),
//     'add_new_item' => __('Add New People'),
//     'edit_item' => __('Edit People'),
//     'new_item' => __('New People'),
//     'view_item' => __('View People'),
//     'search_items' => __('Search People'),
//     'not_found' =>  __('No People found'),
//     'not_found_in_trash' => __('No People found in Trash'), 
//     'parent_item_colon' => '',
//     'menu_name' => 'People'
//   );
//   $args = array(
// 	'labels' => $labels,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_ui' => true, 
//     'show_in_menu' => true, 
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'people' ),
//     'capability_type' => 'post',
//     'has_archive' => false, 
//     'hierarchical' => false,
//     'menu_position' => 20,
//     'supports' => array('title','editor','custom-fields','thumbnail'),
// 	//'taxonomies' => array('post_tag', 'categories') 
	
//   ); 
//   register_post_type('people',$args);
 
//  } // end build Custom Post Types
 
 
/* ==========================
		
			Custom Taxonomies
			
===============================*/
add_action( 'init', 'build_taxonomies', 0 );
// Add some custom categories to the  post type 
function build_taxonomies() {
    register_taxonomy( 'portcats', 'portfolio',
	 array( 
	'hierarchical' => true, 
	'label' => 'Portfolio Categories', 
	'query_var' => true, 
	'rewrite' => true ,
	'public' => true,
	'rewrite' => array( 'slug' => 'portfolio-categories' ),
	'show_admin_column' => true,
	'_builtin' => true
    ) );    

    register_taxonomy( 'service_type', 'portfolio',
	 array( 
	'hierarchical' => true, 
	'label' => 'Service Type', 
	'query_var' => true, 
	'rewrite' => true ,
	'public' => true,
	'rewrite' => array( 'slug' => 'service-type' ),
	'show_admin_column' => true,
	'_builtin' => true
    ) ); 
    
    register_taxonomy( 'people_categories', 'people',
         array( 
        'hierarchical' => true, 
        'label' => 'People Categories', 
        'query_var' => true, 
        'rewrite' => true ,
        'public' => true,
        'rewrite' => array( 'slug' => 'people-categories' ),
        'show_admin_column' => true,
        '_builtin' => true
    ) );
	
	// Add some custom categories to the  post type 
/*
   register_taxonomy( 'groups', 'portfolio',
	 array( 
	'hierarchical' => false, 
	'label' => 'Portfolio Groups', 
	'query_var' => true, 
	'rewrite' => true ,
	'public' => true,
	//'rewrite' => array( 'slug' => 'portfolio-categories' ),
	'show_admin_column' => true,
	'_builtin' => true
	) );*/

	
	
} // build taxonomies


// Limit the excerpt without truncating the last word.
// use like this > echo get_excerpt(100);
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... continue reading';
  return $excerpt;
}
// Limit the excerpt without truncating the last word.
// Excerpt Function
function home_get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

/* =============================
		
		Pagination
		
============================= */
function pagi_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pavigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

/*
		Custom Search filter
--------------------------------------*/
/*add_filter('relevanssi_hits_filter', 'products_first');
function products_first($hits) {
    $types = array();
 
    $types['portfolio'] = array();
    $types['post'] = array();
    //$types['product'] = array();
 
    // Split the post types in array $types
    if (!empty($hits)) {
        foreach ($hits[0] as $hit) {
            array_push($types[$hit->post_type], $hit);
        }
    }
 
    // Merge back to $hits in the desired order
    $hits[0] = array_merge($types['portfolio'], $types['post']);
    return $hits;
}*/
/* Relevansi hit filter - customization of search results: */
add_filter( 'relevanssi_hits_filter', 'my_hits_filter' );

function my_hits_filter( $data )
{
$hits = $data[0];
$pages = array();
$posts = array();
foreach ( $hits as $key => $hit )
{
if ( 'portfolio' == $hit->post_type )
{
$pages[] = $hit;
}
else if ('post' == $hit->post_type )
{
$posts[] = $hit;
}
}

$filtered_hits = array_merge($pages, $posts);
$filtered_data = array( $filtered_hits, $data[1] );
return $filtered_data;
}
/*add_filter('posts_orderby', 'group_by_post_type', 10, 2);
function group_by_post_type($orderby, $query) {
global $wpdb;
if ($query->is_search) {
    return $wpdb->posts . '.post_type DESC';
}
// provide a default fallback return if the above condition is not true
return $orderby;
}*/


add_filter('posts_groupby', 'group_by_post_type' );
function group_by_post_type( $groupby )
{
  global $wpdb;
  if( !is_search() ) {
    return $groupby;
  }
  $mygroupby = "{$wpdb->posts}.post_type";
  if( !strlen(trim($groupby))) {
    // groupby was empty, use ours
    return $mygroupby;
  }
  // wasn't empty, append ours
  return $groupby . ", " . $mygroupby;
}


/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 {
    padding: 10px;
    margin-bottom: 15px;
    background: #FFF;
    text-align: center;
  }
  body.login div#login h1 a {
    display: inline-block;
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: contain;
    background-position: center;
  	width: 280px;
  	height: 55px;
    margin: 0 0;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

// Change Posts to News
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add a News Post';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add News';
        $labels->add_new_item = 'Add News';
        $labels->edit_item = 'Edit News';
        $labels->new_item = 'News';
        $labels->view_item = 'View News';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );
// add a favicon from your theme folder
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

function custom_taxonomies_terms_links()

{

    // get post by post id

    $post = get_post( $post->ID );



    // get post type by post

    $post_type = $post->post_type;



    // get post type taxonomies

    $taxonomies = get_object_taxonomies( $post_type, 'portcats' );

    $out = array();



    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {

        // get the terms related to post

        $terms = get_the_terms( $post->ID, $taxonomy_slug );



        if ( !empty( $terms ) ) {

            //var_dump($terms);

        

            //$out[] = "<h2>" . $taxonomy->label . "</h2>\n";

            

            $buffer = array();



            foreach ( $terms as $term ) {

                if ( $term->parent < 1 ) {

                    $buffer[$term->term_id][0] = '<h1 class="page-title"><a href="'. get_term_link( $term->slug, $taxonomy_slug ) . '">'.    $term->name . "</a></h1>\n";

                } else {

                    $buffer[$term->parent][$term->term_id] = '<div id="subnav">
<ul><li class="notfirst"><a href="'. get_term_link( $term->slug, $taxonomy_slug ) . '">'.    $term->name . "</a></li></ul></div>\n";   

                }

            }

            

            ksort($buffer);

            

            foreach ($buffer as $id => $items) {

                ksort($items);

                

                foreach ($items as $txt) {

                    $out[] = $txt;

                }

            }

            



            $out[] = "\n";

        }

    }

    return implode('', $out );
}