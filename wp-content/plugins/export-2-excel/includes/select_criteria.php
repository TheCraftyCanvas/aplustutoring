<?php
  ini_set('memory_limit', '256M');
  ini_set('max_execution_time', 300); //300 seconds = 5 minutes
  $extensions = array('xls' => '.xls', 'xlsx' => '.xlsx');
  $args = array (
      'public'   => true
  );
  $output = 'objects';
  $post_types = get_post_types($args, $output);


  if ( isset($_POST['Submit']) ) {
    if (empty($_POST) || !check_admin_referer('e2e_export_data' )  ) {
      wp_die('Sorry, your nonce did not verify.');
    } elseif (!isset($_POST['ext']) || !array_key_exists($_POST['ext'], $extensions)  ) {
      wp_die('Please select a valid extension.');
    }  elseif (!isset($_POST['e2e_post_type']) || ( !array_key_exists($_POST['e2e_post_type'], $post_types ) && $_POST['e2e_post_type'] != 'comment_authors'   && $_POST['e2e_post_type'] != 'attachment') ) {
      wp_die('Please select a post type.');
    }  else {
      $post_type = $_POST['e2e_post_type'];
      $ext = $_POST['ext'];
      $str = '';
      if ( is_multisite() && $network_admin ) {

        $blog_info = get_blog_list(0, 'all');
        foreach ($blog_info as $blog) {
          switch_to_blog($blog['blog_id']);
          include('loop.php');
          restore_current_blog();
        }
      } else {
        include('loop.php');
      }
      $filename = sanitize_file_name(get_bloginfo('name') ) . '.' . $ext;
      if ( $ext == 'xls' ) {
        header("Content-type: application/vnd.ms-excel;");
      } elseif( $ext == 'xlsx') {
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, charset=utf-8;");
      }
      header("Content-Disposition: attachment; filename=" . $filename);
       print $str;//$str variable is used in loop.php
      exit();
    }
  } else { ?>
    <form name="export" action="<?php echo $form_action; ?>" method="post" onsubmit="return validate_form();">
      <div class="selection_criteria" >
        <div class="popupmain" style="float:left;">
          <p class="req_head"><?php echo 'Choose your criteria';?></p>
          <div class="formfield">
            <p class="row1">
              <label><?php echo 'Selection Criteria:';?></label>
              <em>

              <?php
                $count = 0;
                foreach ($post_types  as $key => $post_type ) {
                  $divisor = 3;
                  if ($count % $divisor == 0) { ?>
                    <kbd> <?php
                  }
                  if ( $post_type->name != 'attachment' ) { ?>
                    <i>
                      <input type="radio" class="post_type" name="e2e_post_type" value="<?php echo $post_type->name; ?>"  />
                    </i>
                    <small>
                      <?php echo $post_type->label; ?>
                    </small> <?php
                  }
                  $count++;
                  if( $count == count($post_types) ){?>
                     <i>
                      <input type="radio" class="post_type" name="e2e_post_type" value="comment_authors"  />
                     </i>
                     <small>
                       Comments Authors
                     </small>
                  <?php
                  }
                  if ($count % $divisor == 0 ) { ?>
                    </kbd> <?php
                  }
                } ?>
              </em>
            </p>
            <p class="row1">
              <label><?php echo 'Select extension:'; ?></label>
              <em> <?php
                e2e_display_radio_buttons($extensions, 'ext'); ?>
              </em>
            </p>
            <?php wp_nonce_field('e2e_export_data'); ?>

            <p class="row1">
              <label>&nbsp;</label>
              <em>
                <input type="submit" class="button-primary" name="Submit" value="Submit" />
              </em>
            </p>
          </div>
        </div>
      </div>
    </form> <?php
  } ?>