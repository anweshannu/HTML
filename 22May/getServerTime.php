<?php
date_default_timezone_set('America/New_York');
$timezone = date_default_timezone_get();
echo "Server time is " .date("D M d Y h:i:s A ", time());
echo $timezone;
?>