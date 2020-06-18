<?php
/**
 * Template Name: Accolades
 */
get_header(); 
$current_url = get_permalink(); ?>
<div id="primary" class="site-full-content accolades-page">
	<div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
		  <h1 class="page-title" style="display:none;"><?php the_title(); ?></h1>
          <?php if ( get_the_content() ) { ?>
            <div class="entry-content"><div class="inner"><?php the_content(); ?></div></div>
          <?php } ?>

        <?php $awards = get_field('content'); 
        ?>
        <?php if ($awards) { ?>
        <div class="accolades">
            <?php $j=1; foreach ($awards as $a) { 
                $title = $a['accolade_group_title'];
                $project_awards = $a['project_award'];
                $delay = ($j+1);
                if($project_awards) { ?>
                <div class="accolade-details fadeIn wow" data-wow-delay="0.<?php echo $delay?>s">
                    <?php if ($title) { ?>
                    <h3 class="title"><?php echo $title ?></h3> 
                    <?php } ?>
                    <div class="flexwrap">
                    <?php foreach ($project_awards as $g) { 
                        $obj = $g['project'];
                        $award_title = $g['award_title'];
                        $placeholder = get_bloginfo("template_url") . "/images/square.png";
                        if($obj) { 
                            $pID = $obj->ID; 
                            $pagelink = get_permalink($pID);
                            $post_thumbnail_id = get_post_thumbnail_id( $pID );
                            $imgSrc = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail_large');
                            $img_url = ($imgSrc) ? $imgSrc[0] : get_bloginfo('template_url') . '/images/default-thumb.png';
                            ?>
                            <div class="imagebox">
                                <a href="<?php echo $pagelink ?>" class="wrap" style="background-image:url('<?php echo $img_url;?>')">
                                    <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
                                    <?php if ($award_title) { ?>
                                    <div class="caption">
                                        <div class="inner">
                                            <?php if ($award_title) { ?>
                                            <h4 class="title2 text-center"><?php echo $award_title ?></h4>
                                            <?php } ?>
                                        </div>
                                    </div> 
                                    <?php } ?>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    </div>
                </div>
                <?php } ?>
            <?php $j++; } ?>
        </div>   
        <?php } ?>


        <?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>