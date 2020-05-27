<?php


	use Cmfcmf\OpenWeatherMap;
	use Cmfcmf\OpenWeatherMap\Exception as OWMException;
	use Http\Factory\Guzzle\RequestFactory;
	use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

	$header = apache_request_headers();

	$os = array("Linux", "Android", "Mac", "Windows");
	$browser = array("Chrome", "Firefox");
	global $os_name, $browser_name;
	foreach ($header as $headers => $value) 
	{
		if($headers == "User-Agent")
		{
			for($counter=0; $counter<count($os);$counter++)
			{
				if(strpos($value, $os[$counter]) != false)
				{
					$os_name = $os[$counter];
				}
				if(strpos($value, $browser[$counter]) != false)
				{
					$browser_name = $browser[$counter];
				}
			}
		}
	}
	echo("Hello ". $os_name . " user! <br>");
	echo("Currently you are accessing our web page through ". $browser_name. ".");
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$city_name = $details->city;

	$httpRequestFactory = new RequestFactory();
	$httpClient = GuzzleAdapter::createWithConfig([]);

	$owm = new OpenWeatherMap("251839045afcb2c38c6eba2d270899cd", $httpClient, $httpRequestFactory);
	$weather = $owm->getWeather('Berlin', "metric", "de");
	echo($weather->temperature);
?>
