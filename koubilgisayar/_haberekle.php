


<?php 


	//if no errors...
	if($_POST["HaberBaslik"] && $_POST["HaberIcerik"])
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
		
		$admin_id = $_COOKIE["admin_id"];
		
		//$date_now = NOW();
		
		$sql = "INSERT INTO Haberler (HaberBaslik,HaberIcerikHtml,Tarih,AdminID) VALUES ('".$_POST["HaberBaslik"]."','".$_POST["HaberIcerik"]."',NOW(),'".$admin_id."')";

		echo $sql;
		
		if ($conn->query($sql) === TRUE) 
		{
			
		} 
		else 
		{
			
		}

		$conn->close();
	}
	
	header('Location: admin_haberler.php');

?>