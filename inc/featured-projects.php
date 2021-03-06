<?php 
$featured = get_field('home_featured_projects');
$placeholder = get_bloginfo("template_url") . '/images/rectangle-lg.png';
if ( $featured ) {  ?>
<div id="featurePortfolio" class="featured-portfolio clear flexslider">
	<div class="spinnerWrap"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
	<ul class="image-slider slides">
	<?php foreach($featured as $p) {  
			$custom_name = $p['project_custom_name'];
			$post_id = $p['project_name'];
			$img = $p['project_image'];
			$img_bg = ($img) ? ' style="background-image:url('.$img['url'].')"':'';
			$first_title = get_field('first_title',$post_id);
			$pagelink = get_permalink($post_id);
			$projname = get_the_title($post_id);
			// echo '<pre>';
			// print_r($img);
			// echo '</pre>';
			if($img) { ?>
			<!-- <li> -->
				<div class="fp-image-wrap slide-group">
					<div class="image" ><img src="<?php echo $img['sizes']['home-slider']; ?>" alt="" aria-hidden="true" class="placeholderz"></div>
					<div class="fp-caption wrapper">
						<div class="wrapper">
							<div class="bottom">
							<?php if ($custom_name) { ?>
								<h3 class="project-title"><a href="<?php echo $pagelink; ?>"><?php echo $custom_name ?> <span class="arrow"><i class="fas fa-chevron-right"></i></span></a></h3>
							<?php } ?>
							</div>
						</div>
					</div>
					<div class="overlay"></div>
				</div>
			<!-- </li> -->
			<?php } ?>
		<?php } ?>
		<div class="controls-container"><div id="slide-controller" class=""></div></div>	
	</div>

</div>
<?php } ?>