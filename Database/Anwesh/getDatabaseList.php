
<?php

	$conn = mysqli_connect("localhost", "Anwesh", "Anwesh");
	if (!$conn)
	{
	  die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "show databases";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) 
	{
		echo "<select id = 'databaseList' name = 'Databaselist' onchange = 'getTablesList()''>";
		echo('<option selected hidden>Choose a database</option>');
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

