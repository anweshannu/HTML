<?php
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
	echo("Currently you are accessing our web page through ". $browser_name. ". <br>");
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$city_name = $details->city;
	echo("Currently you are in ". $city_name . ".");
?>
<!-- <script type="text/javascript">var city_name="<?= $city_name?>";</script> -->
<script type="text/javascript" src="sample.js"></script>
<script type="text/javascript">
	getTemp("<?php echo($city_name)?>");
</script>
