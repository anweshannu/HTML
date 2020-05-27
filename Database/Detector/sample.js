function getTemp(city_name)
{
	var api_key = "251839045afcb2c38c6eba2d270899cd";
	$.getJSON("http://api.openweathermap.org/data/2.5/weather?q="+city_name+"&units=metric&APPID="+api_key, function(data){
		$("#two").html("The temperature in "+city_name+" is "+data["main"]["temp"]+".");
		console.log(data["main"]["temp"])
	});
}