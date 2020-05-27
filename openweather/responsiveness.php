<?php
	$user_device = $_SERVER['HTTP_USER_AGENT'];
	// echo "11. " . $user;

	if(strpos($user_device, "Mobile") !== false)
	{
		echo "<br>Hello Mobile user!";
	}
	else
	{
		echo "<br>Hello Desktop user!";
	}

	$header = apache_request_headers();

	$ip = $_SERVER['REMOTE_ADDR'];
	echo '<br>Your IP Address is: '. $ip;

	$json_data = file_get_contents("http://ipinfo.io/{$ip}/json");
	// echo("<br>33. " . $json_data);

	$details = json_decode($json_data);

	$city_name = $details->city;
	echo("<br>Currently you are in " . $city_name);

	$weather_json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$city_name}&appid=9a2b3712c20ace3faf7d2b02d0199080&units=metric");
	// echo("<br>44. " . $weather_json);

	$weather_details = json_decode($weather_json);

	$temperature = $weather_details->main->temp;
	echo("<br>Temperature in " . $city_name . " is " . $temperature);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-browser/0.1.0/jquery.browser.min.js"></script>
<script>
// console.log($.browser)
document.write("<br>You are using " + $.browser.name + " on " + $.browser.platform + ".");
</script>



