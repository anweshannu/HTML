<?php
        $servername = "localhost";
        $username = "Anudeep";
        $password = "Anudeep";
        $dbname = $_GET["db"];
	$itemid = $_GET["itemid"];
	//$dbname = "dbAnudeep";
	//$itemid = "999";
        $connection = new mysqli($servername, $username, $password, $dbname);
        if($connection->connect_error)
        {
                die("Connection failed: " . $connection->connect_error);
        }
	try
	{
		$stmt = $connection->prepare("DELETE FROM Item where ItemId = ? ");
	        $stmt->bind_param("s", $itemid);
	        $stmt->execute();
	        $stmt->close();
	        $connection->close();
	}
	catch(Exception $e)
	{
	}
?>

