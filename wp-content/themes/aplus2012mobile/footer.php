<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main / data-role=content-->

	<div id="footer-wrapper" data-role="footer">
    <div id="footer">

      <div id="footer-accordion" data-role="collapsible-set">

<?php if (!( is_home() || is_front_page() )) : ?>
				<div id="upcoming-free-exams" data-role="collapsible" data-iconpos="right">
          <h3>Free Proctored Practice SAT & ACT Exams</h3>
          <div id="upcoming-exam-expanded">
					<p>A+ Test Prep & Tutoring offers free full-length SAT & ACT exams in a proctored setting. After taking the exam, students receive a detailed 5-page score report that helps identify strengths and weaknesses in each subsection of the test.</p>
          <ul id="featured-upcoming-events" class="style3">
          <?php
echo EM_Events::output(array('limit'=>3,
'format'=>
'<li><a href="#_EVENTURL"><span>#_{M j}</span>
<div><strong>#_LOCATIONNAME<br/>#_EVENTTIMES</strong></div></a><div class="proctored-exam-region">Serving #_EVENTTAGS</div></li>'
));
          ?>
          </ul>
          </div><!--/#upcoming-exam-expanded-->
				</div><!--/#upcoming-free-exams-->
<?php endif; ?>

      <div id="form-wrapper" data-role="collapsible" data-iconpos="right">
        <h3>Track Your Progress with My A+</h3>
        <form id="myaplus-login" method="post" action="http://my.aplustutoring.com/login.aspx" title="Track your One-to-One Tutoring Progress, SAT &amp; ACT Practice Tests, Academic Progress" data-ajax="false">
          <label for="login_username">Username:</label>
          <input  type="text" name="login_username" />

          <label for="login_password">Password:</label>
          <input type="password" name="login_password" />

          <input type="hidden" name="home_page_login_form" value="1">
          <a data-role="button" href="http://my.aplustutoring.com/login.aspx?forgot_password=1" title="Forgot your password?">Forgot Password?</a>
          <input type="submit" name="submit" value="Login" id="sherpa_portal_login_form_button">
        </form>
      </div><!--/#form-wrapper-->

    </div><!--/#footer-accordion-->

<div id="footer-left">
    <div id="footer-nav">
      <a data-role="button" href="<?php bloginfo('url');?>/about-us/">About Us</a>
      <a data-role="button" href="<?php bloginfo('url');?>/news">News/Blog</a>
    </div><!--/#footer-nav-->


    <div id="follow">
      <a target="_blank" class="facebook" href="http://www.facebook.com/pages/Jenkintown-PA/A-Test-Prep-and-Tutoring/135684476443267">Follow Us on Facebook</a>
      <a target="_blank" class="twitter" href="https://twitter.com/APlusPhila">Follow Us on Twitter</a>
    </div><!--/#follow-->

		<div id="colophon">

      <div id="copyright-text">
        &copy;<?php print date("Y")?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        </a>
      </div><!--/#copyright-text-->

		</div><!-- #colophon -->
</div><!--/#footer-left-->

<div id="footer-right">
		<div id="footer-badge">
      <img src="<?php bloginfo( 'template_url'); ?>/images-aplus/footer-badge.png" alt=""/>
		</div><!--/#footer-badge-->
</div><!--/#footer-right-->

		</div><!--/#footer-->
	</div><!-- #footer-wrapper / data-role=footer-->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</div><!--/#page-wrapper / data-role=page-->
</body>
</html>
