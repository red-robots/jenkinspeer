<?php 
$args = array(
	'posts_per_page'   => 3,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish'
);
$news = new WP_Query($args);
if ( $news->have_posts() ) {  ?>
<section class="latest-news-list section clear">
	<div class="wrapper">
		<h2 class="section-title text-center">Latest News</h2>
		<div class="flexrow clear">
		<?php while ( $news->have_posts() ) : $news->the_post(); 
			$post_id = get_the_ID(); ?>
			<div class="flexcol news-info">
				<div class="inner clear">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('medium_large') ?>
					<?php } ?>
					<div class="inside clear"><h3 class="title"><?php the_title(); ?></h3></div>
					<div class="button"><a class="btngrey" href="<?php echo get_permalink(); ?>">Read More <span class="arrow"><i class="fas fa-chevron-right"></i></span></a></div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<div class="view-all-button">
			<a class="btngrey" href="<?php echo get_site_url(); ?>/news/">All News <span class="arrow"><i class="fas fa-chevron-right"></i></span></a>
		</div>
	</div>
</section>
<?php } ?>