<?php 
$featured = get_field('home_featured_projects');
if ( $featured ) {  ?>
<div id="featurePortfolio" class="featured-portfolio clear">
	<div class="image-slider slides">
	<?php foreach($featured as $p) {  
			$custom_name = $p['project_custom_name'];
			$post_id = $p['project_name'];
			$img = $p['project_image'];
			$img_bg = ($img) ? ' style="background-image:url('.$img['url'].')"':'';
			$first_title = get_field('first_title',$post_id);
			$pagelink = get_permalink($post_id);
			if($img) { ?>
			<div class="fp-image-wrap slide-group"<?php echo $img_bg;?>>
				<div class="fp-caption wrapper">
					<div class="bottom">
					<?php if ($custom_name) { ?>
						<h3 class="project-title"><a href="<?php echo $pagelink; ?>"><?php echo $custom_name ?> <span class="arrow"><i class="fas fa-chevron-right"></i></span></a></h3>
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