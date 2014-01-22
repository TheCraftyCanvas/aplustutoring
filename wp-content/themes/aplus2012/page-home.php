<?php
/**
 * Template Name: A+ Home Desktop
 *
 * Custom desktop homepage
 *
 */

get_header(); ?>

<?php if ( is_home() || is_front_page() ) : ?>
		<div id="banner">
			<ul>

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
          if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
        ?>

				<li <?php if($firstFlag==0) { echo 'class="first"'; } $firstFlag++; ?> >
					<div id="<?php echo 'cbox' . $firstFlag; ?>" class="box">
						<div class="rctl"></div><div class="rctr"></div><div class="rcbl"></div><div class="rcbr"></div>
						<div class="box-overlay">
							<div class="heading"><?php the_title(); ?></div>
							<div class="content">
								<p><?php echo (types_render_field("callout-content", array('output' => 'html' ) ) );?></p>
                <p><a class="link-style2" title="Learn More" href="<?php bloginfo('url'); echo (types_render_field('callout-link', array('output' => 'raw', 'raw'=>'true' ) ) );?>">Learn More</a></p>
							</div>
						</div>
						<div class="image-style5 image-style5a"><a href="#"><?php echo (types_render_field("callout-image", array('alt' => get_the_title(),
      "width"=>"240","proportional"=>"true") ) ); ?><span></span></a></div>
					</div>
				</li>

        <?php
          endwhile;
          endif;
        ?>
			</ul>
		</div><!--/#banner-->



		<div id="page">
			<div id="three-columns">

				<div id="column1">
					<a href="<?php bloginfo('url');?>/about-us/test-prep-tutoring-clientele/"><h2 class="title">Testimonials</h2></a>
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
					<div class="image-style3 image-style3a">
            <img src="<?php bloginfo('template_directory'); ?>/images-aplus/featured-testimonial.png" width="313" height="122" alt="" /><span></span>
        <?php
          $scoreText = types_render_field("testimonial-score-increase", array('output' => 'raw' ) );
          $scoreText .= ' Point Increase on the ';
          $testType = types_render_field("testimonial-service-type", array('output' => 'raw' ) );
          $testType = str_replace("Test Prep","",$testType);
          $scoreText .= $testType;
        ?>
            <div class="featured-testimonial-caption"><?php echo rtrim($scoreText) . "."; ?></div><!--/.featured-testimonial-caption-->
					</div><!--/.image-style3.image-style3a-->

      <div class="testimonyInfo">
        <div class="testimonial">
          <?php the_content(); ?>
        </div>
        <div class="testimonyBy">
          <?php
            $testimonyAuthor = types_render_field("client-name", array('output' => 'raw' ) );
            echo '-' . $testimonyAuthor . "\n";
            echo '<div>';
            if (strpos(get_the_title(),$testimonyAuthor) === false) {
              echo rtrim(get_the_title()) . '<br/>';
            }
            if (types_render_field("testimonial-school", array('output' => 'raw' ) ) != null) {
              echo types_render_field("testimonial-school", array('output' => 'raw' ) );
            }
            echo '</div>';
          ?>
        </div>

        <div class="score-increase-callout">
          <?php echo $scoreText; ?>
        </div>
      </div><!--/.testimonyInfo-->

        <?php
          endwhile;
        ?>

      <div class="homepage-more-link"><a href="<?php bloginfo('url');?>/about-us/test-prep-tutoring-clientele/" class="link-style1">Read More</a></div>
				</div><!--/#column1-->

				<div id="column2">
					<a href="<?php bloginfo('url');?>/resources/"><h2 class="title">Resources</h2></a>
					<div class="image-style3 image-style3a"><img src="<?php bloginfo('template_directory'); ?>/images-aplus/scantron.png" width="311" height="122" alt="" /><span></span></div>
					<p>Registration forms, useful information about test preparation and college admissions, recommended educational consultants and psychologists, and links to curriculum and other educational resources.</p>
					<div class="homepage-more-link"><a href="<?php bloginfo('url');?>/resources" class="link-style1">Learn More</a></div>
				</div><!--/#column2-->

				<div id="column3">
					<a href="<?php bloginfo('url');?>/free-practice-exams"><h2 class="title">Practice SAT & ACT Exams</h2></a>
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
					<div class="homepage-more-link"><a href="<?php bloginfo('url');?>/free-practice-exams" class="link-style1">Learn More</a></div>
				</div><!--/#column3-->

			</div><!--/#three-columns-->
		</div><!--/#page-->
<?php endif; ?>
<?php get_footer(); ?>