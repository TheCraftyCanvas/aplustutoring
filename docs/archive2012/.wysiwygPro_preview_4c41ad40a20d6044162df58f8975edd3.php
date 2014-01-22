<?php
if ($_GET['randomId'] != "rl_x8EjYAElj63ImHaHExivJmyEZ9oPQCWMevKkDqA0SfaecAITDn9B4vbrazZdK") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
