<?php

require_once('wp-load.php');

global $wpdb;

$site=md5($_GET["site"]);

$sqlDel="DELETE FROM new_count WHERE MD5='$site'";

$wpdb->query($sqlDel);

?>