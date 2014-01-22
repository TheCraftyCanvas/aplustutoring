<?php

if(strpos(getcwd(),'wp-content/plugins/rss-atom-avatar'))
	die('Error: Plugin does not support standalone calls, damned hacker.');
DEFINE(RSSATOMAVATAR_VERSION,'1.2.1');
/*
Plugin Name: Rss Atom Avatar
Plugin URI: http://jehy.ru/wp-plugins.en.html
Description: Add an image and favicon to your RSS and Atom feeds! To set up, visit <a href="options-general.php?page=rss-atom-avatar/rss-atom-avatar-options.php">configuration panel</a>.
Version: 1.2.1
Author: Jehy
Author URI: http://jehy.ru/index.en.html
Min WP Version: 2.5
Max WP Version: 3.7.1
*/

/*  Copyright 2008  Jehy  (email : jehy@valar.ru)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class RSS_Atom_avatar
{

function init_lang()
{
  if(file_exists(ABSPATH . 'wp-content/plugins/rss-atom-avatar/lang/lang.'.WPLANG.'.inc'))
    $lang='.'.WPLANG;
    include_once(ABSPATH . 'wp-content/plugins/rss-atom-avatar/lang/lang'.$lang.'.inc');
}
}

if(is_admin())
  include_once(ABSPATH . 'wp-content/plugins/rss-atom-avatar/rss-atom-avatar-options.php');
else
	include_once(ABSPATH . 'wp-content/plugins/rss-atom-avatar/show_feed.php');

?>