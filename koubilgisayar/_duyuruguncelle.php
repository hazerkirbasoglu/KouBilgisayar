


<?php 

if($_POST["DuyuruBaslik"] && $_POST["DuyuruIcerik"] && $_POST["ID"])
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
		
		$sql = "UPDATE Duyurular SET DuyuruBaslik = '".$_POST["DuyuruBaslik"]."' , DuyuruIcerikHtml = '".$_POST["DuyuruIcerik"]."' WHERE ID=".$_POST["ID"];

		
		if ($conn->query($sql) === TRUE) 
		{
			
		} 
		else 
		{
		}

		$conn->close();

}
	header('Location: admin_duyurular.php');

?>