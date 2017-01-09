<?php

	// ADMÝN LOGÝN KONTROL ÝÞLEMLERÝ

	if(!isset($_COOKIE["admin_unvan"]) || !isset($_COOKIE["admin_username"]) || !isset($_COOKIE["admin_id"]) || !isset($_COOKIE["admin_password"])) {
		
	}
	else
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "koubilgisayar";

		$_username = $_COOKIE["admin_username"];
		$_password = $_COOKIE["admin_password"];
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = 'SELECT * FROM adminler where KullaniciAdi=\''.$_username.'\' and Sifre=\''.$_password.'\' Limit 1';
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			header('Location: admin.php');
		}
	}
 ?>


<?php include('header.php'); ?>


<?php

	echo iconv("","UTF-8",'<div class="container content">
	<div class="row">
		<div class="col-md-3 margin-bottom-40"></div>
		<div class="col-md-6">
			<div class="panel panel-blue margin-bottom-40 padding-top-100">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-tasks"></i> Sisteme Giris</h3>
				</div>
				<div class="panel-body">
					<form class="margin-bottom-40" role="form" action="login.php" method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Kullanýcý Adý</label>
							<input type="text" class="form-control" name="username" placeholder="Kullanýcý Adýný Giriniz.">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Þifre</label>
							<input type="password" class="form-control" name="password" placeholder="Þifrenizi Giriniz.">
						</div>
						<button type="submit" class="btn-u btn-u-blue">Giriþ</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>');

 ?>






<?php include('footer.php'); ?>