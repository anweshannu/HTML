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

?>