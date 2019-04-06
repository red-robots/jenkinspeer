    </div><!-- .page-container -->

    <div id="footer" class="site-footer clear">
        <div class="wrapper">
            <div class="flexrow clear">
                <div class="footer-site-info flexcol">
                <?php the_field('footer_text', 'option'); ?> &copy; <?php echo date('Y'); ?> | <a href="<?php the_field('sitemap', 'option'); ?>" target="_blank">sitemap</a> | <span class="siteby">site by <a href="http://bellaworksweb.com">Bellaworks</a></span>
                </div><!-- footer cont -->

                <div class="social-wrapper flexcol">
                    <ul class="social-media">
                        <li class="facebook"><a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="instagram"><a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="linkedin"><a href="<?php the_field('linkedin_link', 'option'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div><!-- social wrapper -->
            </div>
        </div>

    </div><!-- footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php the_field('google_analytics','option'); ?>

</body>
</html>