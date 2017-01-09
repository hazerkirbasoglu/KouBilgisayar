


<?php 

echo $_POST["SlaytBaslik"];

if($_FILES['resim']['name'])
{
	//if no errors...
	if(!$_FILES['resim']['error'] && $_POST["SlaytBaslik"])
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
		
		$sql = "INSERT INTO Slaytlar (SlaytBaslik) VALUES ('".$_POST["SlaytBaslik"]."')";

		if ($conn->query($sql) === TRUE) 
		{
			$sql = "SELECT ID FROM Slaytlar order by ID DESC Limit 1";
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				
				$row = $result->fetch_assoc();
				
				$new_inserted_id = $row["ID"];
				
				//now is the time to modify the future file name and validate the file
				$new_file_name = 'C:\wamp64\www\koubilgisayar\slayt/'.$new_inserted_id.'.png'; //rename file
		
		
				//move it to where we want it to be
				move_uploaded_file($_FILES['resim']['tmp_name'],$new_file_name);
				
			}
		} 
		else 
		{
			
		}

		$conn->close();
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['resim']['error'];
	}
}

	header('Location: admin_slaytlar.php');

?>