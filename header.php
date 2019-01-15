<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/basic.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/gallerificPlus.css" type="text/css" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
<!--
var template_url = "<?php bloginfo('template_url'); ?>";
// -->
</script>
<?php wp_head(); ?>
<script type="text/javascript">
	document.write("<style type='text/css'>div.navigation{width:300px;float: left;}div.content{display:block;}</style>");
</script>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132474660-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-132474660-1');
</script>

	
	
</head>

<body>
<div id="page">
	<div id="header">
    
		<?php if(is_home()) { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } else { ?>
            <div class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
        <?php } ?>
        
        <?php get_search_form(); ?>
        
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</div><!-- #header -->


<div class="clear"></div>

<?php if(!is_front_page()) : ?>
<div id="main" class="wrapper">
<?php endif; ?>
