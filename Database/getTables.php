
<?php

	$dbname = $_GET['dbName'];
	$servername = "165.22.14.77";
	$username = "Satish";
	$password = "Satish";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn)
	{
	  die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "show tables";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) 
	{
		echo "<select id='table'>";
		while ($row = mysqli_fetch_assoc($result)) 
		{
		    echo "<option value=" . $row['Tables_in_'. $dbname] . ">". $row['Tables_in_'. $dbname] ."</option>";
		}
		echo "</select>";
	}		
	else 
	{
	  echo "no table found.";
	}

	mysqli_close($conn);
	
?>