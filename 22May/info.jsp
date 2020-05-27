<%@ page import = "java.io.*" %>
<%@ page import = "java.net.*" %>

<%!
	String browser, operatingsystem;
	int index;

%>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>Show Info</title>
</head>
<body>

<%
	String userInfo = request.getHeader("User-Agent");
	String ipAddress = request.getRemoteAddr();
	String usertype;
	if(userInfo.contains("Mobile"))
	{
		usertype = "Mobile";
	}
	else
	{
		usertype = "Desktop";
	}
	out.println("Hello " + usertype + " user! <br>");
	out.print("Your IP address is " + ipAddress + "<br>");
	String os[] = {"Android", "Linux", "Windows", "iOS"};
	String browsers[] = {"Chrome", "Firefox", "Mac"};
	for(int counter = 0; counter < os.length; counter++)
	{
		if(userInfo.contains(os[counter]))
		{
			operatingsystem = os[counter];
		}
	}
	for(int counter = 0; counter < browsers.length; counter++)
	{
		if(userInfo.contains(browsers[counter]))
		{
			browser = browsers[counter];
		}
	}
	out.println("You are accessing this site through " + browser +  " browser on " + operatingsystem +" platform.<br>");

%>

<%!
	String getData(String apiUrl)
    {
      try
      {
        URL obj = new URL(apiUrl);
        HttpURLConnection httpConnection = (HttpURLConnection) obj.openConnection();
        httpConnection.setDoOutput(true);
        httpConnection.setRequestMethod("POST");
        DataOutputStream wr = new DataOutputStream(httpConnection.getOutputStream());
        // get the response  
        BufferedReader bufferedReader = null;
        if (httpConnection.getResponseCode() == 200) 
        {
            bufferedReader = new BufferedReader(new InputStreamReader(httpConnection.getInputStream()));

        } 
        else 
        {
            bufferedReader = new BufferedReader(new InputStreamReader(httpConnection.getErrorStream()));
        }
        StringBuilder content = new StringBuilder();
        String line;
        while ((line = bufferedReader.readLine()) != null) 
        {
            content.append(line).append("\n");
        }
        bufferedReader.close();
        return content.toString();

      }
      catch(Exception ex)
      {
        return "{'status':500,'message':'Internal Server Error'}";
      }
        
    }
%>
<%!
	String extractValueFromData(String data, String word, char character)
	{
		index = data.indexOf(word);
		data = data.substring(index + 8);
		index=data.indexOf(character);
		return data.substring(0, index);
	}

%>

<%
	String locationapiUrl = "http://ip-api.com/json/" + ipAddress;
	String data = getData(locationapiUrl);
	String city = extractValueFromData(data, "\"city\":\"", '\"');
	out.println("Now you are in " + city + ".<br>");
	data = getData("http://api.openweathermap.org/data/2.5/weather?q="+ city +"&appid=e0ecaedd2ce6247142d321727acedee6&units=metric");
	String temperature = extractValueFromData(data, "{\"temp\":", ',');
	out.println("Temperature in "+ city + " is " + temperature + "&#8451;.<br>");

%>
</body>
</html>
