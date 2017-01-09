


<?php 

if($_POST["HaberBaslik"] && $_POST["HaberIcerik"] && $_POST["ID"])
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
		
		$sql = "UPDATE Haberler SET HaberBaslik = '".$_POST["HaberBaslik"]."' , HaberIcerikHtml = '".$_POST["HaberIcerik"]."' WHERE ID=".$_POST["ID"];

		
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