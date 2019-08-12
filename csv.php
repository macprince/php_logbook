<?php
date_default_timezone_set("America/Chicago");
$today = date("Y-m-d");
header("Content-type: text/csv");
header("Cache-Control: no-store, no-cache");
header("Content-Disposition: attachment; filename=$today.csv");
$file = file_get_contents("members.txt");
echo "First Name,Last Name,Email\n";
echo $file;
?>
