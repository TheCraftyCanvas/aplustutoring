<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
?>

	</div><!-- #main -->
	</div><!--/#content-wrapper-->
</div><!--/#wrapper-->

<footer id="colophon" role="contentinfo">
  <div id="footer-content-bg">
    <div id="footer-content-bgtop">
      <div id="footer-content">
        <?php /* A sidebar in the footer? Yep. You can can customize your footer with three columns of widgets */
          if ( ! is_404() )
            get_sidebar( 'footer' );
        ?>
      </div><!--/#footer-content-->
    </div><!--/#footer-content-bgtop-->
  </div><!--/#footer-content-bg-->
  <div id="subfooter">
    <p style="font-size:11px;padding-bottom:2px;">The <span style="font-family: 'Maven Pro', sans-serif;font-weight: 400;color:#cb2027;font-size: 24px;text-shadow: 1px 1px white;padding-right:3px;position: relative;top: 2px;">+</span> in A+ is the personalized and customized attention given to each student.</p>
    <p style="font-size:9px;padding-top:2px;">&copy;<?php echo date("Y"); ?>, A+ Test Prep &amp; Tutoring, Inc.</p>
    <nav role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'footer-links' ) ); ?>
    </nav>

  </div><!--/#footer-->
</footer><!-- #colophon -->


<?php wp_footer(); ?>
</div><!--/#body-wrapper-->
</body>
</html>