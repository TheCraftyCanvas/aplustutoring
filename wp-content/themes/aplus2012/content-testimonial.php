<?php
/**
 * The template for displaying testimonial content
 */
?>

<?php if (types_render_field("visibility", array('output' => 'raw' )) == "1") : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<blockquote>
      <?php echo(types_render_field("testimonial-picture", array("alt"=>get_the_title(),
      "width"=>"160","proportional"=>"true") ) ); ?>

			<div class="testimonial-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>

      <div class="testimonyInfo">
      <div class="testimonyBy"><?php
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

      <?php if(types_render_field("testimonial-score-increase", array('output' => 'raw' ) ) <> null) : ?>
      <div class="score-increase-callout">
        <?php echo(types_render_field("testimonial-score-increase", array('output' => 'raw' ) ) ); ?>
        Point Increase on the
        <?php
          $testType = types_render_field("testimonial-service-type", array( ) );
            if($testType <> "SAT II Subject Test Prep") {
              $testType = str_replace(" Test Prep","",$testType);
            } else {
              $testType = str_replace(" Prep","",$testType);
            }
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
          echo $testType;
        ?>
      </div>
      </div><!--/.testimonyInfo-->
      <?php endif; ?>
      </div><!--/.testimonial-content-->
      </blockquote>
    </div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>