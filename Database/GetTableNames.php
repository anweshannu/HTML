<?php
	$servername = "localhost";
	$username = "Anudeep";
	$password = "Anudeep";
	//$dbname = $GET['']
	$dbname = "dbAnudeep";
	$connection = new mysqli($servername, $username, $password, $dbname);
	if($connection->connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
	}
	$result = $connection->query("show tables");
	echo("Choose table ");
	echo("<select id = 'tables' name = 'tables' onchange = 'getData()'>");
	if($result->num_rows > 0)
	{
		//while($row = $result->fetch_assoc())
		while($row = mysqli_fetch_array($result))
		{
			echo("<option value = " . $row[0] . ">" . $row[0] . "</option>");
		}
	}
	echo("</select>");
	$connection->close();
?>
