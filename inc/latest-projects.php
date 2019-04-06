<?php 
// $args = array(
// 	'posts_per_page'   => 8,
// 	'orderby'          => 'date',
// 	'order'            => 'DESC',
// 	'post_type'        => 'portfolio',
// 	'post_status'      => 'publish'
// );
// $items = new WP_Query($args);
$featured = get_field('featured_portfolio');
if ( $featured ) {  ?>
<div id="featurePortfolio" class="featured-portfolio clear">
	<div class="image-slider slides">
	<?php foreach($featured as $p) { 
		$post_id = $p->ID;
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		$img = wp_get_attachment_image_src($post_thumbnail_id,'large');
		$img_bg = '';
		if($img) {
			$img_bg = ' style="background-image:url('.$img[0].')"';
		}
		$first_title = get_field('first_title',$post_id);
		$pagelink = get_permalink($post_id);
		if($img) { ?>
		<div class="fp-image-wrap slide-group"<?php echo $img_bg;?>>
			<div class="fp-caption wrapper">
				<div class="bottom">
				<?php if ($first_title) { ?>
					<h3 class="project-title"><a href="<?php echo $pagelink; ?>"><?php echo $first_title ?> <span class="arrow"><i class="fas fa-chevron-right"></i></span></a></h3>
				<?php } ?>
				</div>
			</div>
			<div class="overlay"></div>
		</div>
		<?php } ?>
	<?php } ?>

		<div class="controls-container"><div id="slide-controller" class="wrapper"></div></div>	
	</div>

</div>
<?php } ?>