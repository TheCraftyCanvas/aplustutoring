<?php
 /**
  * Displays radio buttons
  */
  function e2e_display_radio_buttons($selection_array, $radio_button_name, $content_type = '') {
    $count = 0;
    $disabled = '';
    $divisor = '';
    if (!array($selection_array)) {
      return false;
    }
    foreach ($selection_array as $sel_key => $sel_val) {
      $divisor = 3;
      if ($count % $divisor == 0) { ?>
        <kbd> <?php
      }
      if ($content_type == $sel_key) {
        $selected = 'checked="true"';
      } else {
        $selected = '';
      } ?>
      <i>
        <input type="radio" <?php echo $selected; ?>  class="<?php echo $radio_button_name; ?>" name="<?php echo $radio_button_name; ?>"  id="<?php echo $sel_key; ?>" value="<?php echo $sel_key; ?>" >
      </i>
      <small><?php echo $sel_val; ?></small> <?php
      $count++;
      if ($count % $divisor == 0 ) { ?>
        </kbd> <?php
      }
    }
  }
?>