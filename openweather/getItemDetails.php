
<?php
	
	$itemid = $_GET['itemid'];
	$servername = "165.22.14.77";
	$username = "Anwesh";
	$password = "Anwesh";
	$dbname = "dbAnwesh";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = "SELECT Description, UnitPrice FROM Item where ItemId = '".$itemid."'";
	$result = mysqli_query($conn, $query);
	sleep(5);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		echo "Item Name is " . $row["Description"] . " and it costs Rs." .$row["UnitPrice"];
	} 
	else 
	{
	  echo "No item found.";
	}

	mysqli_close($conn);
	$conn->close();

?>