<?php
  if (isset($_POST['Submit']) && isset($_POST['post_type']) &&  isset($_POST['ext']) ) {
    $post_type = $_POST['post_type'];
    $ext = $_POST['ext'];
    $str = '';
    if ( is_multisite() ) {
      $blog_info = get_blog_list(0, 'all');
      foreach ($blog_info as $blog) {
        switch_to_blog($blog['blog_id']);
        include('loop.php');
        restore_current_blog();
      }
    } else {
      include('loop.php');
    }
    $filename = strtolower(str_replace(' ','-',get_bloginfo('name'))) .'-urls.' . $ext;
    header("Content-type: application/vnd.ms-excel;");
    header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, charset=utf-8;");
    header("Content-Disposition: attachment; filename=" . $filename);

    print $str;//$str variable is used in loop.php
    wp_redirect(admin_url('admin.php?page=../export-2-excel.php&noheader=true'));
    exit();
  }
?>