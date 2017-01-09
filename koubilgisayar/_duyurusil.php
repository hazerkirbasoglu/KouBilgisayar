<?php

   if($_GET['id'])
   {
	   $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "koubilgisayar";

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "DELETE FROM Duyurular WHERE ID = ".$_GET["id"];
		
		if ($conn->query($sql) === TRUE) 
		{
			
		}
	   
	   
	   header('Location: admin_duyurular.php');
	   
   }
   
   
   
?>