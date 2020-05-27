
<?php

	$servername = "165.22.14.77";
	$username = "Satish";
	$password = "Satish";
	$dbname = "dbSatish";  
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn)
	{
	  die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "show databases";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) 
	{
		echo "<select id = 'databaseList' name = 'Databaselist'>";
		while ($row = mysqli_fetch_assoc($result)) 
		{
		    echo "<option value=" . $row['Database'] . ">". $row['Database'] ."</option>";
		}
		echo "</select>";
	}		
	else 
	{
	  echo "no database found.";
	}

	mysqli_close($conn);
	
?>

