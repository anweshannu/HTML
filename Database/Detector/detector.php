<?php
	$header = apache_request_headers();
	echo 'Your IP Address is: '. $_SERVER['REMOTE_ADDR'];
	echo "<br>";

	$user_ip = getenv('REMOTE_ADDR');
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
	$country = $geo["geoplugin_countryName"];
	$city = $geo["geoplugin_city"];
	echo($city);

	$data = $_SERVER['HTTP_USER_AGENT'];
	echo "<br>";
	if(strpos($data, "obile") !== false)
	{
	    echo "<script>alert('Hello Mobile user!'); </script>";
	} 
	else
	{
	    echo "<script>alert('Hello Desktop user!'); </script>";
	}	


	// $url = "http://api.openweathermap.org/data/2.5/weather?q=Hyderabad&appid=e0ecaedd2ce6247142d321727acedee6&units=metric";

	// //call api
	// $json = json_decode(file_get_contents($url), true);
	// console.log($json);

	$url = "http://api.openweathermap.org/data/2.5/weather?q=karimanagar&appid=e0ecaedd2ce6247142d321727acedee6&units=metric";
	$json = json_decode(file_get_contents($url), true);
	$balance = json("coord");
	console.log($json);
	echo $balance;


?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-browser/0.1.0/jquery.browser.min.js"></script>
<script>
console.log($.browser)
document.write("You are using " + $.browser.name + " browser on " + $.browser.platform + " platform.");
</script>


