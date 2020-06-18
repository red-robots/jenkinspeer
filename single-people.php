<?php get_header(); ?>

<div id="primary" class="site-full-content team-single-page">
	<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); 
    $image = get_field('photo'); 
    $degrees = get_field('degrees');
    $company_title = get_field('company_title');
    $vcard = get_field('v_card');
    $placeholder = get_bloginfo("template_url") . "/images/square.png";
    $project_involvement = get_field('project_involvement');

    ?>
    
    <div class="team-info-wrapper <?php echo ($project_involvement) ? 'half':'full'; ?>">

      <?php if ($image || $degrees) { ?>
      <div class="col1 team-photo">
        <div class="photo <?php echo ($image) ? 'has-image':'no-image'?>">
        <?php if ($image) { ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
        <?php } else { ?>
          <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
        <?php } ?>
        </div>

        <?php if ($degrees) { ?>
        <div class="degrees-info">
          <?php foreach($degrees as $d) { ?>
          <div class="degree">
            <div class="degree-name"><?php echo $d['degree_name']; ?></div>
            <div class="degree-place"><?php echo $d['place_earned']; ?></div>
          </div>
          <?php } ?>
        </div> 
        <?php } ?>
      </div> 
      <?php } ?>

      <div class="col2 team-details">
        <div class="info-header">
          <h2 class="personName"><?php echo get_the_title(); ?></h2>
          <?php if ($company_title) { ?>
          <div class="company-title"><?php echo $company_title ?></div> 
          <?php } ?>
        </div>
    
        <?php if ($vcard) { ?>
        <div class="vcard"><a href="<?php echo $vcard; ?>">Vcard</a></div> 
        <?php } ?>
        

        <div class="person-summary">
          <?php the_field('personal_details'); ?>
        </div><!-- person summary -->

      </div>
  
    </div>
    
    <?php if ($project_involvement) { ?>
    <div class="team-sidebar">
      <h3 class="sbtitle">Project Involvement</h3>
      <div id="projectsList" class="projects">
        <?php 
          $max = 5;
          $count = count($project_involvement);
          $lastPg = ceil($count/$max);
          if($count>$max) {
            $projectGroup = array_chunk($project_involvement,$max);
          } else {
            $projectGroup[] = $project_involvement;
          }

          $n=1; foreach($projectGroup as $objects) { $isActive = ($n==1) ? ' show':''; ?>
          <div class="project-group group<?php echo $n ?><?php echo $isActive ?>" data-group="<?php echo $n ?>">
            
            <?php $i=1; foreach ($objects as $p) {
            $pid = $p->ID;
            $projectName = $p->post_title;
            $link = get_permalink($pid);
            $thumbid = get_post_thumbnail_id($pid); 
            $img = wp_get_attachment_image_src($thumbid,'medium');
            $rectangle = get_bloginfo("template_url") . "/images/rectangle.png";
            $style = ($img) ? ' style="background-image:url('.$img[0].')"':'';
            ?>

            <a href="<?php echo $link ?>" class="proj <?php echo ($img) ? 'hasImage':'noImage'; ?>">
              <span class="image"<?php echo $style ?>><img src="<?php echo $rectangle ?>" class="projplaceholder" alt="" aria-hidden="true"></span>
              <span class="title"><span><?php echo $projectName ?></span></span>
            </a>  
            <?php $i++; } ?>

          </div>
          <?php $n++; } ?>
      </div>
      <?php if ($count>$max) { ?>
      <div class="seemore"><a id="seeMoreBtn" data-lastgroup="<?php echo $lastPg ?>">See More</a></div>
      <?php } ?>
    </div>
    <?php } ?>


		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
</div><!-- #primary -->

<script>
jQuery(document).ready(function($){
  
  add_sidebar_height();
  $(window).resize(function() {
    add_sidebar_height();
  });

  function add_sidebar_height() {
    //var projectHeight = $("#projectsList .group1").height();
    //var divHeight = projectHeight + 10;
    var divHeight = 0;
    $(".projplaceholder").each(function(){
      var h = $(this).height() + 4;
      divHeight += h;
    });
    divHeight = divHeight+5;

    $("#projectsList").css({
      'height':divHeight+'px',
      'overflow-x':'hidden',
      'overflow-y':'auto'
    });
  }

  $("#seeMoreBtn").on("click",function(e){
    e.preventDefault();
    var moreBtn = $(this);
    var lastgroup = $(this).attr("data-lastgroup");
    var last = $(".project-group.show").last().attr("data-group");
    var next = parseInt(last) + 1;
    $(".project-group.show").last().next().addClass('show');
    $("#projectsList").animate({ scrollTop: $("#projectsList")[0].scrollHeight}, 1000);
    if(lastgroup==next) {
      $("div.seemore").remove();
    } 
    
  });
});
</script>

<?php get_footer(); ?>