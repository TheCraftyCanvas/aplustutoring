<?php
/**
 * This is the template that displays the mobile homepage.
 */

get_header(); ?>

		<div id="container">
			<div id="content">

		<center><div id="service-callout-banner">

        <?php
          $post_limit = -1; // set to -1 to show all
          $args = array(
            'post_type' => 'featured-services',
            'posts_per_page' => $post_limit,
            'orderby' => 'menu_order',
            'order' => 'asc'
            );

          $loop = new WP_Query( $args );
          $firstFlag = 0;
          if ( $loop->have_posts() ) : ?>
      <div class="featured-content-banner"><div class="callout-images">

        <?php while ( $loop->have_posts() ) : $loop->the_post();
        ?>
	<img src="<?php echo (types_render_field("callout-image", array("output"=>"raw") ) ); ?>" alt=""/ class="callout-image" style="width:24%;">
        <?php
          endwhile;
?>
</div><!--/.callout-images-->
<span class="callout-intro">One to One Tutors Specializing in</span>
      </div><!--/.featured-content-banner-->
<?php endif;
          if ( $loop->have_posts() ) :
        ?>
        <div class="featured-content-callout" data-role="collapsible-set">
        <?php
          while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <div class="collapsible-item" data-role="collapsible">
            <h1 class="heading"><?php the_title(); ?></h1>
            <div class="content">
                <p><?php echo (types_render_field("callout-content", array('output' => 'html' ) ) );?></p>
                <p><a href="<?php bloginfo('url');?><?php echo (types_render_field("callout-link", array('output' => 'raw', 'raw'=>'true', 'class' => 'link-style2', 'title' => 'Learn More' ) ) );?>" data-role="button">Learn More</a></p>
            </div><!--/.content-->
        </div><!--/.collapsible-item-->

        <?php
          endwhile; ?>
        </div><!--/.featured-content-callout-->
          <?php
          endif;
        ?>

		</div><!--/#service-callout-banner-->



				<a id="clients-link" href="<?php bloginfo('url');?>/about-us/test-prep-tutoring-clientele/"><div id="featured-testimonial">
        <?php
          $post_limit = 1; // set to -1 to show all
          $args = array(
            'post_type' => 'testimonial',
            'p' => 340,
            'posts_per_page' => $post_limit,
            'order' => 'asc'
            );

          $the_query = new WP_Query( $args );
          while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>
        <?php
          $scoreText = types_render_field("testimonial-score-increase", array('output' => 'raw' ) );
          $scoreText .= ' Point Increase on the ';
          $testType = types_render_field("testimonial-service-type", array() );
          $testType = str_replace("Test Prep","",$testType);
            switch($testType) {
              case 1:
                $testType = "SAT";
                break;
              case 2:
                $testType = "ACT";
                break;
              case 5:
                $testType = "SAT II Subject Test";
                break;
              case 6:
                $testType = "SSAT";
                break;
              case 7:
                $testType = "ISEE";
                break;
              case 8:
                $testType = "AP Exam";
                break;
            }
          $scoreText .= $testType;
        ?>
            <div class="featured-testimonial-caption">
            <div id="scoreIncrease"><?php echo rtrim($scoreText) . "."; ?></div>
            <div id="testimonialCredit"><?php
            $testimonyAuthor = types_render_field("client-name", array('output' => 'raw' ) );
            echo '-' . $testimonyAuthor . "<br/>" . "\n";
            if (strpos(get_the_title(),$testimonyAuthor) === false) {
              echo rtrim(get_the_title()) . '<br/>';
            }
            if (types_render_field("testimonial-school", array('output' => 'raw' ) ) != null) {
              echo types_render_field("testimonial-school", array('output' => 'raw' ) );
            }
          ?></div>
            <div id="clients-link-faux">Learn more about our clients</div>
          </div><!--/.featured-testimonial-caption-->
        <?php
          endwhile;
        ?>
				</div><!--/#featured-testimonial-->
				</a><!--/#clients-link-->


				<div id="upcoming-free-exams">
          <div id="upcoming-exam-expanded">
				<div id="proctored-exam-description" data-role="collapsible">
          <h2>Free Proctored Practice SAT & ACT Exams</h2>
          <div id="proctored-exam-blurb">
					<p>A+ Test Prep & Tutoring offers free full-length SAT & ACT exams in a proctored setting. After taking the exams, students receive a detailed 5-page score report that helps identify strengths and weaknesses in each subsection of the test.</p>
        </div><!--/#proctored-exam-blurb-->
        </div><!--/proctored-exam-description-->
          <ul id="featured-upcoming-events" class="style3">
          <?php
$eventsOutput = EM_Events::output(array('limit'=>3,
'format'=>
'<li><a href="#_EVENTURL"><div class="examDate">#_{M j}</div>
<div class="examSchedule"><strong>#_LOCATIONNAME<br/>#_EVENTTIMES</strong></div></a><div class="proctored-exam-region">Serving #_EVENTTAGS</div></li>'
));
if ($eventsOutput <> "No Events") {
echo $eventsOutput;
}
          ?>
          </ul>
          </div><!--/#upcoming-exam-expanded-->
				</div><!--/#upcoming-free-exams-->
				</center>



			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>