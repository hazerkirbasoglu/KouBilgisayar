
<?php

	$_username = $_POST["username"];
	$_password = $_POST["password"];
	
	if($_username)
	{
		if($_password)
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "koubilgisayar";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = 'SELECT * FROM adminler where KullaniciAdi=\''.$_username.'\' and Sifre=\''.$_password.'\' Limit 1';
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) 
				{
					setcookie("admin_username", $row["KullaniciAdi"] , time() + (60*30), "/"); // 30 dakika
					setcookie("admin_password", $row["Sifre"] , time() + (60*30), "/"); // 30 dakika
					setcookie("admin_unvan", $row["Unvan"] , time() + (60*30), "/"); // 30 dakika
					setcookie("admin_id", $row["ID"] , time() + (60*30), "/"); // 30 dakika
				}
				
				header('Location: admin.php');
				
			}else {
				header('Location: sistemegiris.php');
			}
			
		}
		else
		{
			header('Location: sistemegiris.php');
		}	
	}
	else
	{
		header('Location: sistemegiris.php');
	}

 ?>
