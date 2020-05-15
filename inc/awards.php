<?php if( have_rows('award') ): ?>
<div id="container">
	<?php while ( have_rows('award') ) : ?>
	<?php the_row(); ?>
    
    <?php 
		$awardTitle = get_sub_field('project'); 
		$city = get_sub_field('city'); 
		$awards = get_sub_field('awards'); 
	?>
    
    <div class="award item">
    <div class="awardpadding">
    	<h2><?php echo $awardTitle; ?></h2>
        <div class="award-city"><?php echo $city; ?></div>
    	 <div class="awards"><?php echo $awards; ?></div>
    </div><!-- awardpadding -->
    </div><!-- award -->
	
	<?php endwhile; ?>
     </div><!-- container -->
<?php endif; ?>