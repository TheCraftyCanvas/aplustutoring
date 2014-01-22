<?php

require_once('wp-load.php');

global $wpdb;

$sqlDel="DELETE FROM new_count WHERE MD5='$site'";
$sqlIns="INSERT INTO new_count ( MD5, VER) VALUES ( '$site', '$ver')";

$qry = $wpdb->get_results("SELECT count(*) tot FROM new_count");
print $qry[0]->tot;

?>