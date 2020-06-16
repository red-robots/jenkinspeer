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

        <?php $accolades = get_field('content'); ?>
        <?php if ($accolades) { ?>
        <div class="accolades">
            <?php $j=1; foreach ($accolades as $a) { 
                $title = $a['accolade_group_title'];
                $galleries = $a['accolade_galleries'];
                $delay = ($j+1);
                if($galleries) { ?>
                <div class="accolade-details fadeIn wow" data-wow-delay="0.<?php echo $delay?>s">
                    <?php if ($title) { ?>
                    <h3 class="title"><?php echo $title ?></h3> 
                    <?php } ?>
                    <div class="flexwrap">
                    <?php foreach ($galleries as $g) { 
                        $imageId = $g['ID'];
                        $title = $g['title'];
                        $description = get_field("imagedescription",$imageId);
                        $placeholder = get_bloginfo("template_url") . "/images/square.png";
                        ?>
                        <div class="imagebox">
                            <a class="wrap" style="background-image:url('<?php echo $g['sizes']['medium_large']?>')">
                                <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder">
                                <?php if ($description || $title) { ?>
                                <div class="caption">
                                    <div class="inner">
                                        <?php if ($title) { ?>
                                        <h4 class="title2"><?php echo $title ?></h4>
                                        <?php } ?>
                                        <?php echo $description ?>
                                    </div>
                                </div> 
                                <?php } ?>
                            </a>
                        </div>
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