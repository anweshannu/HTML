<?php
	$servername = "localhost";
	$username = "Anudeep";
	$password = "Anudeep";
	$connection = new mysqli($servername, $username, $password);
	if($connection->connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
	}
	$result = $connection->query("show databases");
	echo("Choose database ");
	echo("<select id = 'databases' name = 'databases' onchange = 'getTableNames()'>");
	if($result->num_rows > 0)
	{
		//echo("database");
		while($row = $result->fetch_assoc())
		{
			echo("<option value = " . $row['Database'] . ">" . $row['Database'] . "</option>");
			//echo($row["Database"]);
			//echo(1);
		}

	}
	echo("</select>");
	$connection->close();
?>
