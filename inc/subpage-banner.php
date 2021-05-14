<?php
$placeholder = get_bloginfo("template_url") . '/images/rectangle.png';
$banner = get_field("static_banner");
if($banner) { ?>
<div class="subpage-banner cf">
    <div class="image bgImage">
    	<img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['title'] ?>" class="hero-image" >
    </div>
</div>
<?php } ?>