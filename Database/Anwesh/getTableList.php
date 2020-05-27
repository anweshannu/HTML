
<?php
	$dbname = $_GET['db_name'];
	$conn = mysqli_connect("localhost", "Anwesh", "Anwesh", $dbname);
	if (!$conn)
	{
	  die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "show tables";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) 
	{
		
		echo "<select id='table' onchange = 'getTableData()'>";
		echo "<option selected hidden>select a table to display</option>";
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