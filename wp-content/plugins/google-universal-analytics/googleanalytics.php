<?php
/*
Plugin Name: Google Universal Analytics
Plugin URI: http://wordpress.org/extend/plugins/google-universal-analytics/
Description: Adds <a href="http://www.google.com/analytics/">Google Analytics</a> tracking code on all pages.
Version: 1.3
Author: Audrius Dobilinskas
Author URI: http://onlineads.lt/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_google_universal_analytics() {
  add_option('web_property_id', 'Paste your Google Universal Analytics tracking code here...');
}

function deactive_google_universal_analytics() {
  delete_option('web_property_id');
}

function admin_init_google_universal_analytics() {
  register_setting('google_universal_analytics', 'web_property_id');
}

function admin_menu_google_universal_analytics() {
  add_options_page('Google Universal Analytics', 'Google Universal Analytics', 'manage_options', 'google_universal_analytics', 'options_page_google_universal_analytics');
}

function options_page_google_universal_analytics() {
  include(WP_PLUGIN_DIR.'/google-universal-analytics/options.php');  
}

function google_universal_analytics() {
  $web_property_id = get_option( 'web_property_id' );

  // Is the option just the UA id?
  $web_property_id_p1 = strtoupper( trim( $web_property_id ) );
  $web_property_id_p2 = '';
  if ( strpos( $web_property_id_p1, 'UA-' ) === 0 ) {

    // Does the option have a second parameter? (Comma separator)
    $web_property_id_p2_pos = strpos( $web_property_id, ',');
    if ( $web_property_id_p2_pos !== false ) {

      // Isolate the first parameter.
      $web_property_id_p1_pos = strpos( $web_property_id_p1, ',');
      if ( $web_property_id_p1_pos !== false ) {
        $web_property_id_p1 = substr( $web_property_id, 0, $web_property_id_p1_pos );
        if ( $web_property_id_p1 !== false ) {
          $web_property_id_p1 = strtoupper( trim( $web_property_id_p1 ) );
        } else {
          $web_property_id_p1 = '';
        }
      }

      // Isolate the second parameter.
      $web_property_id_p2_pos += 1;
      $web_property_id_p2 = substr( $web_property_id, $web_property_id_p2_pos );
      if ( $web_property_id_p2 !== false ) {
        $web_property_id_p2 = strtolower( trim( $web_property_id_p2 ) );
      } else {
        $web_property_id_p2 = '';
      }
    }

    // Build up a whitespace trimmed javascript that is the GA tracking script.
    // Include the option. One or two values.
    $web_property_id_js = '<script>';
    $web_property_id_js .= '(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){';
    $web_property_id_js .= '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),';
    $web_property_id_js .= 'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)';
    $web_property_id_js .= '})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');';
    $web_property_id_js .= 'ga(\'create\',\'' . $web_property_id_p1 . '\'';
    if ( strlen( $web_property_id_p2 ) > 1 ) {
      $web_property_id_js .= ',\'' . $web_property_id_p2 . '\'';
    }
    $web_property_id_js .= ');ga(\'send\',\'pageview\');';
    $web_property_id_js .= '</script>';

    $web_property_id = $web_property_id_js;
  }
  if ( strpos( $web_property_id, 'UA-' ) !== false ) {
    echo $web_property_id;
  }
}

register_activation_hook(__FILE__, 'activate_google_universal_analytics');
register_deactivation_hook(__FILE__, 'deactive_google_universal_analytics');

if (is_admin()) {
  add_action('admin_init', 'admin_init_google_universal_analytics');
  add_action('admin_menu', 'admin_menu_google_universal_analytics');
}

if (!is_admin()) {
  add_action('wp_head', 'google_universal_analytics');
}

?>