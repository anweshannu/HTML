<?php
$header = apache_request_headers();
echo 'User IP Address - '. $_SERVER['REMOTE_ADDR'];


$ip = $_SERVER['REMOTE_ADDR']; // your ip address here
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success')
{
    echo '<br>Your City is ' . $query['city'];
    echo '<br />';
    echo 'Your State is ' . $query['region'];
    echo '<br />';
    echo 'Your Zipcode is ' . $query['zip'];
    echo '<br />';
    echo 'Your Coordinates are ' . $query['lat'] . ', ' . $query['lon'];
}















// echo "<br>";

// $user_ip = getenv('REMOTE_ADDR');
// $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
// $country = $geo["geoplugin_countryName"];
// $city = $geo["geoplugin_city"];
// echo($city);
// foreach ($header as $headers => $value) 
// {
// 	echo "$headers: $value <br />\n";
// }

?>