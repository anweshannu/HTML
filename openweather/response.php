<?php
	$user_device = $_SERVER['HTTP_USER_AGENT'];

	if(strpos($user_device, "Mobile") !== false)
	{
		$user_type = "Mobile";
	}
	else
	{
		$user_type = "Desktop";
	}
	echo "<br>Hello " .$user_type ." user!";

	$ip_address = $_SERVER['REMOTE_ADDR'];
	echo '<br>Your IP Address is: '. $ip_address;
	$json_data = file_get_contents("http://ipinfo.io/{$ip_address}/json");
	$details = json_decode($json_data);
	$city_name = $details->city;
	echo("<br>Currently you are in " . $city_name . ".");
	$weather_json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$city_name}&appid=e0ecaedd2ce6247142d321727acedee6&units=metric");
	$weather_details = json_decode($weather_json);

	$temperature = $weather_details->main->temp;
	echo("<br>Temperature in " . $city_name . " is " . $temperature ."&#8451;.");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-browser/0.1.0/jquery.browser.min.js"></script>
<script>
// console.log($.browser)
document.write("<br>Currently you are using " + $.browser.name + " on " + $.browser.platform + " platform to access this site.");
</script>


