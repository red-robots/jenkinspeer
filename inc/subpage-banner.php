<?php
$placeholder = get_bloginfo("template_url") . '/images/rectangle.png';
$banner = get_field("static_banner");
if($banner) { ?>
<div class="subpage-banner cf">
    <div class="image bgImage" style="background-image:url('<?php echo $banner['url'] ?>');">
    	<img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['title'] ?>" class="hero-image" style="display:none;">
    </div>
</div>
<?php } ?>