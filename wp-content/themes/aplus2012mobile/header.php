<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'aplus2012mobile' ), max( $paged, $page ) );

	?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/themes/aplus2012jqm/aplus2012jqm.min.css" />
<script src="<?php bloginfo( 'template_url'); ?>/js/jquery-1.8.3.min.js"></script>
<script src="<?php bloginfo( 'template_url'); ?>/js/jquery.mobile-1.2.0.min.js"></script>
<script src="<?php bloginfo( 'template_url'); ?>/js/aplus2012mobile.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrapper" data-role="page" >

  <div id="header" data-role="header">

      <div id="branding" role="banner">
        <div id="logo"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" class="mobile-logo" alt="<?php bloginfo( 'name' ); ?>" /></a></div>
        <div id="one-to-one-instruction-ribbon"><img src="<?php bloginfo( 'template_url'); ?>/images-aplus/header-ribbon.png" alt="<?php bloginfo( 'description' ); ?>"/></div>
      </div><!-- #branding -->

      <div class="callout-phone-number"><a href="tel:215-886-9188"><nobr>215-886-9188</nobr></a></div>

      <div id="access" role="navigation">
        <div class="button-row-wrapper">
          <a data-role="button" href="<?php bloginfo('url');?>/services/">Services</a>
          <a data-role="button" href="<?php bloginfo('url');?>/locations-2/" data-ajax="false">Locations</a>
        </div><!--/.button-row-wrapper-->
        <div class="button-row-wrapper">
          <a data-role="button" href="<?php bloginfo('url');?>/free-practice-exams/">Free Exams</a>
          <a data-role="button" href="<?php bloginfo('url');?>/contact/">Contact</a>
        </div><!--/.button-row-wrapper-->
      </div><!-- #access -->

  </div><!-- #header -->

	<div id="main" data-role="content" <?php if ( is_home() || is_front_page() ) { echo 'class="homepage-content"'; } ?>
>
