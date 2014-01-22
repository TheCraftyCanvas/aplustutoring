<?php
/**
 * The template for displaying tutor profiles
 */
?>

<?php if (types_render_field("tutor-status", array('output' => 'raw' )) == "1") : ?>
  <?php $tutorName = types_render_field("tutor-firstname-mi", array('output' => 'raw' ) ) . "&nbsp;" . types_render_field("tutor-lastname", array('output' => 'raw' ) ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content tutor-profile-wrapper">

      <div class="left-column">
      <center><?php
      echo (types_render_field("tutor-mugshot", array("alt"=>get_the_title(),
      "width"=>"160","proportional"=>"true") ) );?></center>
      <?php
      echo (types_render_field("tutor-why", array('output' => 'html' ) ) );
      echo '<div class="quoteBy">-' . $tutorName . '</div><!--/.quoteBy-->';
      ?>
      </div><!--/.left-column-->

			<div class="right-column">
			<h3 class="tutorName"><?php echo $tutorName; ?></h3>
			<h4>Experience &amp; Background</h4>
      <?php echo (types_render_field("tutor-experience-background", array('output' => 'html' ) ) ); ?>
      <?php if(get_the_terms($post->ID, "tutoring-area") != false) : ?>
      <h4>Disciplines Tutored</h4>
      <?php
       $terms = get_the_terms($post->ID, "tutoring-area");
       $count = count($terms);
       if ( $count > 0 ){
          $i = 0;
          foreach ( $terms as $term ) {
            echo $term->name;
            $i++;
            if($i<$count) { echo ", "; }
          }
       }
      ?>
      <?php endif; ?>
      <h4>Interests</h4>
      <?php echo (types_render_field("tutor-interests", array('output' => 'html' ) ) ); ?>
      <h4>Commendable Qualities</h4>
      <?php echo (types_render_field("tutor-self-described", array('output' => 'raw' ) ) ); ?>
      </div><!--/.right-column-->


    </div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>