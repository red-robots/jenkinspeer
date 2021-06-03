<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="project-header-title">
       
			        <h1 class="main-proj-title"><?php the_title(); ?></h1>
			        <?php if(get_field('second_title')!="") { ?>
			        <div class="sec-proj-title"><?php the_field('second_title'); ?></div>
			        <?php } ?>
			        <?php if(get_field('third_title')!="") { ?>
			        <div class="third-proj-title"><?php the_field('third_title'); ?></div>
			        <?php } ?>
			      </header>
                
                <div class="entry-content newpush">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			
		</div><!-- .entry-content -->
        </article>

				

				<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>