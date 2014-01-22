<?php
/*
Plugin Name: Export to Excel
Description: A plugin which allows you to download your posts, pages, custom post types to .xls or .xlsx format.
Author: Kapil Chugh, Sanyam Gupta
Version: 0.2
*/

  require_once 'includes/defines.php';
  require_once 'includes/functions.php';

 /**
  * Includes javascript and style
  */
  function e2e_custom_scripts() { ?>
    <link rel="stylesheet" href="<?php echo E2E_CSS_PATH; ?>e2e_style.css" type="text/css" media="screen" /> <?php
    wp_enqueue_script( 'e2e_common', E2E_JS_PATH . 'e2e_common.js' );
  }

 /**
	* Includes menu option
  */
  add_action('admin_menu', 'e2e_add_custom_admin_page');
  add_action('network_admin_menu', 'e2e_add_custom_network_admin_page');

	function e2e_add_custom_network_admin_page() {
    global $network_admin, $form_action;
    $network_admin = 1;
    $form_action = admin_url('network/settings.php?page=export-2-excel&noheader=true');
		$e2e_mypage = add_submenu_page('settings.php', 'Export to Excel', 'Export to Excel', 'manage_options', 'export-2-excel', 'e2e_custom_optons');
		//loads JS and CSS only on this page not on all Admin pages.
		add_action( "admin_print_scripts-$e2e_mypage", 'e2e_custom_scripts');

	}

	function e2e_add_custom_admin_page() {
    global $network_admin, $form_action;
    $network_admin = 0;
    $form_action = admin_url('tools.php?page=export-2-excel&noheader=true');
    $e2e_mypage = add_management_page('Export to Excel', 'Export to Excel', 'manage_options', 'export-2-excel', 'e2e_custom_optons');
    //loads JS and CSS only on this page not on all Admin pages.
    add_action( "admin_print_scripts-$e2e_mypage", 'e2e_custom_scripts');
  }

 /**
	* First function that will be called on page load
  */
	function e2e_custom_optons () {
    global $network_admin, $form_action;
		require_once('includes/select_criteria.php');
	}


 /**
	* Generates 'Settings' link on plugin page
  */
  add_filter( 'plugin_action_links', 'e2e_plugin_action_links', 10, 2 );

  function e2e_plugin_action_links( $links, $file ) {
    if ( $file == plugin_basename( dirname(__FILE__) . '/export-2-excel.php' ) ) {
      $links[] = '<a href="admin.php?page=export-2-excel">'.__('Settings').'</a>';
    }
    return $links;
  }