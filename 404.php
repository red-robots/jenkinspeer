<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" >
		<div id="content" role="main">

			<h1 class="page-title">404 Page not found</h1>

				<div class="left-cont-pad firmpara">
                <div class="entry-content">
                Welcome to our new site! Use our Sitemap below to find what the page you are looking for
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap', 'menu_class' => 'nav-menu' ) ); ?>
				</div><!-- .entry-content -->
			 </div><!-- left-content pad -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>