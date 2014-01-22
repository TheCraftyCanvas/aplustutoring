<?php
/**
 * Template Name: A+ Search Page
 *
 * Custom desktop homepage
 *
 */

get_header(); ?>

		<div id="container">
			<div id="content">

        <?php
          $args = array( 'page_id' => '1437' );
          $loop = new WP_Query( $args );
          if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
        ?>

        <article id="page-search" class="page type-page">
          <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <p><?php the_content(); ?></p>

<!-- Google CSE Search Box Begins -->
<form id="searchbox_014701419262400121822:j6q7g-b7kra" action="<?php bloginfo('url');?>/search" style="margin:0px;padding:0px;" data-ajax="false">
<table style="width:100%;margin:0px;padding:0px;">
<tr>
<input type="hidden" name="cx" value="014701419262400121822:j6q7g-b7kra" />
<input type="hidden" name="cof" value="FORID:11" />
<td style="width:88%;padding-right:2px;"><input name="q" type="text" style="width:99.5%;float:left;"/></td>
<td style="width:10%;padding-left:2px;"><input type="submit" name="sa" value="Search A+" style="font-size:11px;padding:3px;"/></td>
</tr>
</table>
</form>
<!-- Google CSE Search Box Ends -->

<!-- Google Search Result Snippet Begins -->
  <div id="results_014701419262400121822:j6q7g-b7kra" style="padding:0px;width:auto;height:auto;overflow:hidden;">

<script>
  function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value; } );
    return vars;
  }
  var query = getUrlVars()["q"];
  if(query==undefined) {
    }
    else
    document.write('<h2>Search Results for \"' + query + '\"</h2>');

    var $ = jQuery.noConflict();
    var googleSearchIframeName = "results_014701419262400121822:j6q7g-b7kra";
    var googleSearchFormName = "searchbox_014701419262400121822:j6q7g-b7kra";
    var googleSearchFrameWidth = $(window).width() - 10;
    var googleSearchFrameborder = 0;
    var googleSearchDomain = "www.google.com";
    var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
</div><!-- Google Search Result Snippet Ends -->
</div><!-- .entry-content -->
        </article><!-- #page-search -->

        <?php
          endwhile;
          endif;
        ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
