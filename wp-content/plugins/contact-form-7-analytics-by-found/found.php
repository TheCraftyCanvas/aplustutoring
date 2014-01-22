<?php

/*

Plugin Name: Contact Form 7 Analytics by Found

Plugin URI: http://www.found.co.uk/cf7-email-analytics/

Description: Add google analytics to contact form 7 emails.

Author: Found

Author URI: http://www.found.co.uk

Version: 1.0.1

*/

/*
Copyright (C) 2012 Found

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
*/


add_action('plugins_loaded', 'wpcf7_found_loader', 10);


function wpcf7_found_loader() {

	global $pagenow;
	if (function_exists('wpcf7_add_shortcode')) {
		wpcf7_add_shortcode( 'found', 'wpcf7_found_shortcode_handler', true );
	} else {
		if ($pagenow != 'plugins.php') { return; }
		add_action('admin_notices', 'cffounderror');
		wp_enqueue_script('thickbox');

		function cffounderror() {
			$out = '<div class="error" id="messages"><p>';
			if(file_exists(WP_PLUGIN_DIR.'/contact-form-7/wp-contact-form-7.php')) {
				$out .= 'The Contact Form 7 is installed, but <strong>you must activate Contact Form 7</strong> below for the Found Module to work.';
			} else {
				$out .= 'The Contact Form 7 plugin must be installed for the Found Module to work. <a href="'.admin_url('plugin-install.php?tab=plugin-information&plugin=contact-form-7&from=plugins&TB_iframe=true&width=600&height=550').'" class="thickbox" title="Contact Form 7">Install Now.</a>';
			}
			$out .= '</p></div>';	
			echo $out;
		}
	}
}

/**

** A base module for [found]

**/

/* Shortcode handler */

function wpcf7_found_shortcode_handler( $tag ) {
	global $wpcf7_contact_form;
	$utmz = $_COOKIE["__utmz"];
  	$utma = $_COOKIE["__utma"];

  // Parse __utmz cookie
  $parts = explode('.', $utmz);
  $size = sizeof($parts);
  $campaign_array = array_slice($parts, 4);
  $campaign_data = implode('.', $campaign_array);

  // Parse the campaign data
  $campaign_data = parse_str(strtr($campaign_data, "|", "&"));
  

  $campaign_source = $utmcsr;
  $campaign_name = $utmccn;
  $campaign_medium = $utmcmd;
  $campaign_term = $utmctr;
  if(isset($utmcct))$campaign_content = $utmcct;
  else $campaign_content = '';

  // You should tag you campaigns manually to have a full view
  // of your adwords campaigns data. 
  // The same happens with Urchin, tag manually to have your campaign data parsed properly.
  
  if(isset($utmgclid)) {
    $campaign_source = "google";
    $campaign_name = $utmccn;;
    $campaign_medium = "PPC";
    $campaign_content = $utmcmd;
    $campaign_term = $utmctr;
  }

  // Parse the __utma Cookie
  list($domain_hash,$random_id,$time_initial_visit,$time_beginning_previous_visit,$time_beginning_current_visit,$session_counter) = explode('.', $utma);

  $first_visit = date("m/d/Y g:i:s A",$time_initial_visit);
  $previous_visit = date("m/d/Y g:i:s A",$time_beginning_previous_visit);
  $current_visit_started = date("m/d/Y g:i:s A",$time_beginning_current_visit);
  $times_visited = $session_counter;

	$value = "Google Analytics information: \r\n\r\n --------------------------------------------\r\n";
	$value .= "Campaign Source: ".$campaign_source."\r\n";
	$value .= "Campaign Name: ".$campaign_name."\r\n";
	$value .= "Campaign Medium: ".$campaign_medium."\r\n";
	$value .= "Campaign Term: ".$campaign_term."\r\n";
	$value .= "Campaign Content: ".$campaign_content."\r\n\r\n";
	$value .= "First visit: ".$first_visit."\r\n";
	$value .= "Previous visit: ".$previous_visit."\r\n";
	$value .= "Current visit: ".$current_visit_started."\r\n";
	$value .= "Times visited: ".$times_visited."\r\n";

	if (!is_array($tag)) return '';

	$name = $tag['name'];
	if (empty($name)) return '';

	// add the value to the form's hidden input 
	$html = '<input type="hidden" name="' . $name . '" value="'. $value .'" />';	

	return $html;

}

/* Tag generator */



add_action( 'admin_init', 'wpcf7_add_tag_generator_found', 35 );

function wpcf7_add_tag_generator_found() {
	if (function_exists('wpcf7_add_tag_generator')) {
		wpcf7_add_tag_generator( 'found', __( 'Found', 'wpcf7' ),	'wpcf7-tg-pane-found', 'wpcf7_tg_pane_found' );
	}
}

function wpcf7_tg_pane_found( &$contact_form ) { ?>
	<div id="wpcf7-tg-pane-found" class="hidden">
		<form action="">
			<table>
				<tr><td>
					<?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?>
					<br /><input type="text" name="name" class="tg-name oneline" />	
				</td><td></td></tr>
			</table>
			<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="found" class="tag" readonly="readonly" onfocus="this.select()" /></div>
		</form>
	</div>
<?php } ?>