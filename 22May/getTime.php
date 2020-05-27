<?php
date_default_timezone_set('America/New_York');
$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
echo "Server time is " .date('m/d/Y h:i:s A', time());


?>