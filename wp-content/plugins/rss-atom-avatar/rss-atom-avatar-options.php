<?php

if(strpos(getcwd(),'wp-content/plugins/rss_atom_avatar'))
  die('Error: Plugin does not support standalone calls, damned hacker.');

class RSS_Atom_avatar_options extends RSS_Atom_avatar
{function RSS_Atom_avatar_options()
{
  register_activation_hook(__FILE__,array($this,'Activate'));
  register_deactivation_hook(__FILE__,array($this,'DeActivate'));
  add_action('admin_menu', array($this,'modify_menu'));
  $this->init_lang();}
function Activate()
{
  add_option('feed_logo','', 'Feed Logo');
  add_option('feed_logo_w','', 'Feed Width');
  add_option('feed_logo_h','', 'Feed Height');
  add_option('feed_icon', '', 'Feed Icon');

  $logo_filename = '';
  $logo = get_bloginfo('url') . '/feed-logo.png';
  if(file_exists($logo))
  {
    $param=@getimagesize($logo);
    if($param)
    {
      update_option('feed_logo', $logo);
      update_option('feed_logo_w', $param[0]);
      update_option('feed_logo_h', $param[1]);
    }
  }

  $icon = get_bloginfo('url').'/favicon.ico';
  if(file_exists($icon))
    update_option('feed_icon',$icon);
}

function DeActivate()
{
  delete_option('feed_icon');
  delete_option('feed_logo');
  delete_option('feed_logo_w');
  delete_option('feed_logo_h');
}

function admin_options()
{
global $_REQUEST;
  echo '<div class="wrap"><h2>Rss Atom Avatar</h2>';
  if($_REQUEST['submit'])
    $this->update_options();
  $this->print_form();
  echo '</div>';
}

function modify_menu(){
  add_options_page(
    'Rss Atom Avatar',
    'Rss Atom Avatar',
    'manage_options',
    __FILE__,
    array($this,'admin_options')
    );
}

function update_options()
{
global $_REQUEST;
  $ok = true;

  if(isset($_REQUEST['feed_icon']))
  {
    $icon_file = $_REQUEST['feed_icon'];
    update_option('feed_icon', $icon_file);
  }
  if(isset($_REQUEST['feed_logo']))
  {
    $logo = $_REQUEST['feed_logo'];
    update_option('feed_logo', $logo);
    if($_REQUEST['try_autodetect'])
    {
      $param=@getimagesize($logo);
      if($param)
      {
        update_option('feed_logo_w', $param[0]);
        update_option('feed_logo_h', $param[1]);
      }
      else echo RSSATOMAV_ERR_GET_IMG_SIZE;
    }
    else
    {
      if(isset($_REQUEST['feed_logo_w']))
        update_option('feed_logo_w', $_REQUEST['feed_logo_w']);
      if(isset($_REQUEST['feed_logo_h']))
        update_option('feed_logo_h', $_REQUEST['feed_logo_h']);
    }
  }

  if(!$ok)
    echo '<div id="message" class="error fade"><p>'.RSSATOMAV_OPTIONS_FAIL.'</p></div>';
  else
    echo '<div id="message" class="update fade"><p>'.RSSATOMAV_OPTIONS_SAVED.'</p></div>';


}

function print_form()
{
global $_REQUEST;
  $feed_icon=get_option('feed_icon');
  $feed_logo=get_option('feed_logo');
  $feed_logo_w=get_option('feed_logo_w');
  $feed_logo_h=get_option('feed_logo_h');
  ?>
  <form method="post" action="<?php echo $location;?>">
  <div style="float:right;margin-right:2em;">
  <b>Rss Atom Avatar <?php echo RSSATOMAVATAR_VERSION;?></b><br>
  <a href="http://jehy.ru/wp-plugins.en.html" target="_blank"><?php echo RSSATOMAV_HOMEPAGE;?></a><br />
  <a href="http://jehy.ru/articles/2008/10/11/wordpress-plugin-for-images-in-rss-and-atom-feeds/" target="_blank"><?php echo RSSATOMAV_FEEDBACK;?></a></div>
  <div class="form-table" style="width:70%; border:1px solid #666; padding:10px; background-color:#CECECE;">
  <strong><?php echo RSSATOMAV_FEED_ICON_ATOM;?></strong><br>(<?php echo RSSATOMAV_URL_HINT;?> " <?php echo get_bloginfo('url'); ?>"):
  <input type="text" name="feed_icon" value="<?php echo $feed_icon; ?>" size="35" /><br />
  <em></em></p>
  <p style="margin-left: 25px; color: rgb(85, 85, 85); font-size: 0.85em;"><?php echo RSSATOMAV_RSS_SPEC;?></p><hr>
  <p><strong><?php echo RSSATOMAV_FEED_LOGO;?></strong><br>(<?php echo RSSATOMAV_URL_HINT;?> <?php echo get_bloginfo('url'); ?>):
  <input type="text" name="feed_logo" value="<?php echo $feed_logo; ?>" size="35" /><br>
  <em><?php echo RSSATOMAV_USE_IMAGE;?></em></p>
  <p><strong><?php echo RSSATOMAV_IMAGE_DIM;?></strong>:<br> <?php echo RSSATOMAV_WIDTH;?>: <input type="text" name="feed_logo_w" value="<?php echo $feed_logo_w; ?>" size="5" />px | <?php echo RSSATOMAV_HEIGHT;?>: <input type="text" name="feed_logo_h" value="<?php echo $feed_logo_h; ?>" size="5" />px</p>
  <p><strong><?php echo RSSATOMAV_TRY_AUTODETECT;?></strong>: <input type="checkbox" checked name="try_autodetect" value="1"></p>
  <p>
  <input type="submit" name="submit" value="<?php _e('Save Changes') ?>" class="button-primary">
  </div></form>
  <?php
}
}



new RSS_Atom_avatar_options();
?>