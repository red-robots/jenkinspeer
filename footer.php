<?php if(!is_front_page()) : ?>
	</div><!-- #main .wrapper -->
<?php endif; ?>


<div class="social-wrapper">
    <div id="sociallinks">
        <ul>
            <li class="facebook"><a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="instagram"><a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li class="linkedin"><a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div><!-- sociallinks -->
</div><!-- social wrapper -->
	
</div><!-- #page -->

<div id="footer">
    <div id="footer-cont">
    <?php the_field('footer_text', 'option'); ?> &copy; <?php echo date('Y'); ?> | <a href="<?php the_field('sitemap', 'option'); ?>" target="_blank">sitemap</a> | <span class="siteby">site by <a href="http://bellaworksweb.com">Bellaworks</a></span>
    </div><!-- footer cont -->
</div><!-- footer -->

<?php wp_footer(); ?>

<?php the_field('google_analytics','option'); ?>

</body>
</html>