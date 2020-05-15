<?php  
global $post;
$taxonomy = 'portcats';
$post_type = 'portfolio';
$post_id = (isset($post->ID) &&  $post->ID) ? $post->ID : 0;
$terms = get_the_terms($post_id,$taxonomy);
$max_items = 3;
$related_items = array();
if($terms) { ?>
<div class="related-projects-wrap clear">
	<h3 class="section-title text-center">Explore Related Projects</h3>
	<div class="related-project-list three-column-wrapper clear">
		<div class="flexrow clear">
			<?php $i=1; foreach ($terms as $term) { 
				$term_id = $term->term_id;
				$term_name = $term->name;
				$args = array(
					'post_type' => $post_type,
					'post__not_in' => array($post_id),
					'posts_per_page' => 4,
					'orderby'   => 'ID',
	        		'order'     => 'DESC',
					'tax_query' => array(
							array(
							  'taxonomy' => $taxonomy,
							  'field' => 'id',
							  'terms' => $term_id 
							)
						)
					);

				$projs = get_posts($args);
				if($projs) {
					foreach($projs as $proj) {
						$proj_id = $proj->ID;
						$proj->category_id = $term_id;
						$proj->category_name = $term_name;
						if($post_id!=$proj_id) {
							$related_items[] = $proj_id;
						}
					}
				}
				$i++; }

				$related_items_list = ($related_items) ? array_unique($related_items) : false;
			?>

			<?php if($related_items_list) { ?>

				<?php $j=1; foreach ($related_items_list as $project_id) { ?>

					<?php if ($j <= $max_items) { ?>
						<?php
							$project_name = get_the_title($project_id);
					        $post_thumbnail_id = get_post_thumbnail_id( $project_id );
					        $pagelink = get_permalink($project_id);
					        $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
					        $img_url = ($imgSrc) ? $imgSrc[0] : get_bloginfo('template_url') . '/images/default-thumb.png';
					        $post_edit_link = get_edit_post_link($project_id);
						?>
						<div id="proj-<?php echo $post_id?>" class="flexcol related-item">
				            <div class="inside clear">
				                <a class="boxlink" href="<?php echo $pagelink; ?>">
				                    <span class="thumbnail" style="background-image:url('<?php echo $img_url?>')">
				                        <?php  if ( has_post_thumbnail($project_id) ) { ?>
				                            <?php echo get_the_post_thumbnail($project_id,'thumbnail_large'); ?>
				                        <?php } else { ?>
				                            <img src="<?php echo get_bloginfo('template_url'); ?>/images/default-thumb.png" width="130px" height="130px"/>
				                        <?php } ?>
				                    </span>
				                    <span class="project-info">
				                        <h2><?php echo $project_name; ?></h2>
				                        <span class="client"><?php echo get_field('second_title',$project_id); ?></span><!-- client -->
				                    </span>
				                </a>
				                <?php if ( current_user_can('administrator') ) { ?>
				                    <a class="editpost" href="<?php echo $post_edit_link ?>">Edit</a>
				                <?php } ?>
				            </div>
				        </div>
					<?php } ?>

				<?php $j++; } ?>

			<?php } ?>
			
		</div>
	</div>
</div>
<?php } ?>