


<?php 

if($_POST["SlaytBaslik"])
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
		
		$sql = "UPDATE Slaytlar SET SlaytBaslik = '".$_POST["SlaytBaslik"]."' WHERE ID=".$_POST["ID"];

		if ($conn->query($sql) === TRUE) 
		{
		} 
		else 
		{
		}

		$conn->close();
		
		
		echo "asdasdasd</br>";


		if($_FILES['resim']['name'])
		{
			echo "asdasdasd</br>";
			//if no errors...
			if(!$_FILES['resim']['error'])
			{
				echo "asdasdasd</br>";
				//now is the time to modify the future file name and validate the file
					$new_file_name = 'C:\wamp64\www\koubilgisayar\slayt/'.$_POST["ID"].'.png'; //rename file
			
					//move it to where we want it to be
					move_uploaded_file($_FILES['resim']['tmp_name'],$new_file_name);
					echo "asdasdasd</br>";
			}
		}
}
	header('Location: admin_slaytlar.php');

?>