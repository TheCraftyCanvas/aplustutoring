<?php
/**
 * This is the template that displays the consultants.
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

		<div id="container">
			<div id="content">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop.
				?>

        <?php
          $post_limit = -1; // set to -1 to show all
            $args = array( 'post_type' => 'consultant', 'posts_per_page' => $post_limit, 'orderby' => 'meta_value', 'meta_key' => 'wpcf-consultant-last', 'order' => 'asc');
          $loop = new WP_Query( $args );

          if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
        ?>

				<?php get_template_part( 'content-consultant', 'page' ); ?>

        <?php
          endwhile;
          else : ?>
            <p>Sorry, the consultant directory is temporarily unavailable.  Please try again later.</p>
          <?
          endif;
        ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>