<?php
$banner = get_field("static_banner");
$placeholder = get_bloginfo("template_url") . '/images/rectangle.png';
if($banner) { ?>
<div class="subpage-banner cf">
    <div class="image"><img src="<?php echo $banner['url'] ?>" alt="<?php echo $banner['title'] ?>" class="hero-image"></div>
</div>
<?php } ?>