<?php

if(strpos(getcwd(),'wp-content/plugins/rss_atom_avatar'))
  die('Error: Plugin does not support standalone calls, damned hacker.');


class RSS_Atom_avatar_show_feed extends RSS_Atom_avatar
{function RSS_Atom_avatar_show_feed()
{
  add_action('rss_head', array($this,'addRssImage'));
  add_action('rss2_head', array($this,'addRssImage'));
  add_action('atom_head', array($this,'addAtomImage'));}
function addRssImage()
{  $this->RssAtomAvatar_addImage('rss');
}
function addAtomImage()
{  $this->RssAtomAvatar_addImage('atom');
}
function RssAtomAvatar_addImage($type)
{
  $logo = get_option('feed_logo');
  if($type=='rss')
  {
    $logo_w = get_option('feed_logo_w');
    $logo_h = get_option('feed_logo_h');
    if($logo)
    {
      echo '<image><title>'.get_bloginfo('name').'</title><url>'.$logo. '</url><link>'.get_bloginfo('url').'</link>';
      if($logo_w)
        echo '<width>'.$logo_w.'</width>';
      if($logo_h)
        echo '<height>'.$logo_h .'</height>';
      echo '<description>'.get_bloginfo('name').' - '.get_bloginfo('url').'</description></image>';
    }
}
elseif($type=='atom')
{
  $icon = get_option('feed_icon');
  if($logo)
    echo '<logo>'.$logo.'</logo>';
  if($icon)
    echo '<icon>'.$icon .'</icon>';
}
}
}

new RSS_Atom_avatar_show_feed();
?>