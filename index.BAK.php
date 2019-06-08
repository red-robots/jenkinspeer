<?php
/**
 * 
 */

get_header(); ?>

<div id="primary">
	<div id="content">
		
		
		<div class="homepage-center-blocks">
		<?php get_template_part('inc/home-squares'); ?>
        </div><!-- home page center blocks -->
        

       
 <div class="grey-box">
 <div class="homepage-center-blocks">       
        <div class="home-bottom">
        <div class="entry-content">
<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'page', // Pull a page
	'page_id' => '521', // the page, "hompage"
));
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<h3 class="home-bot-title"><?php the_field('heading'); ?></h3>

<?php the_field('content'); ?>
<?php endwhile;  ?>


</div><!-- entry content -->
</div><!-- home bottom -->


 <div class="home-news-feed">
<h3 class="home-bot-title">News</h3>
 <?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'post', // Pull a page
	'posts_per_page' => 4,
));
if ($wp_query->have_posts()) :
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <div class="nf-post">
        <a href="<?php the_permalink(); ?>">
           <!-- <div class="nf-thumb">
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail');
                    } else{ ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/default-post-square.png"/>
                    <?php } ?>
            </div> nf thumb -->
            <div class="nf-title"><?php the_title(); ?></div>
            <div class="nf-descr"><?php get_excerpt(20); ?></div>
        </a>
    </div><!-- nf post -->

<?php endwhile; ?>
<?php endif; wp_reset_query(); wp_reset_postdata(); ?> 
 </div><!-- home news feed -->
 </div><!-- home page center blocks -->
 </div><!-- grey box -->
 
<div class="clear"></div>


<div class="homepage-center-blocks">
<div class="home-cats">
<h3 class="home-bot-title">View Project Types</h3>
<div class="entry-content">
<div class="home-pro-cat-li">
<?php //list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$args = array(
  'taxonomy'     => 'portcats',
  'title_li'        => '',
  'hierarchical' => true,
);
?>
<ul class="list-col">
<?php wp_list_categories( $args ); ?>
</ul>
</div><!-- entry content -->
</div><!-- home-pro-cat-li -->
</div><!-- home-cats -->
</div><!-- home page center blocks -->        
 <div class="clear"></div>       

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>