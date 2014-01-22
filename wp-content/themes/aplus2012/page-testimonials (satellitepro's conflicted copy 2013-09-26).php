<?php
/**
 * Template Name: Testimonials
 */
?>
<?php
/**
 * The template for displaying all testimonial pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

  <div id="page">
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop.
				?>

        <?php
          $post_limit = -1; // set to -1 to show all
          $url = $_SERVER["REQUEST_URI"];
          if(strpos($url,"bucks") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (5) );
          elseif(strpos($url,"chester") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (10) );
          elseif(strpos($url,"delaware") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (7) );
          elseif(strpos($url,"montgomery") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (9) );
          elseif(strpos($url,"philadelphia") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (8) );
          elseif( (strpos($url,"camden") !== false) || (strpos($url,"burlington") !== false) || (strpos($url,"mercer") !== false) )
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand', 'category__in' => array (12) );
          elseif(strpos($url,"testimonial-history") !== false)
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'desc');
          else {
            $post_limit = 5; // set to -1 to show all
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $post_limit, 'order' => 'asc', 'orderby' => 'rand');
          }
          $loop = new WP_Query( $args );

          if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
        ?>

				<?php get_template_part( 'content-testimonial', 'page' ); ?>

        <?php
          endwhile;
          endif;
        ?>
			</div><!-- #content -->
		</div><!-- #primary -->


    <?php get_sidebar(); ?>
  </div><!--/#page-->

<?php get_footer(); ?>