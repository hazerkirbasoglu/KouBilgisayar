<?php

	// ADMİN LOGİN KONTROL İŞLEMLERİ

	if(!isset($_COOKIE["admin_unvan"]) || !isset($_COOKIE["admin_username"]) || !isset($_COOKIE["admin_id"]) || !isset($_COOKIE["admin_password"])) {
		header('Location: sistemegiris.php');
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
		if ($result->num_rows <= 0) {
			header('Location: sistemegiris.php');
		}
	}
 ?>


<?php include('header.php'); ?>

 
<div class="container content profile">
			<div class="row">
				<!--Left Sidebar-->
				<div class="col-md-3 md-margin-bottom-40">
					
					<h4><p>Hosgeldin</p><p><b> <?php echo iconv("","UTF-8",$_COOKIE["admin_unvan"]); ?></b></p></h4>
					
					<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
						<li class="list-group-item">
							<a href="admin_slaytlar.php"><i class="fa fa-bar-chart-o"></i> Slaytlar</a>
						</li>
						<li class="list-group-item active">
							<a href="admin_duyurular.php"><i class="fa fa-cubes"></i> Duyurular</a>
						</li>
						<li class="list-group-item">
							<a href="admin_haberler.php"><i class="fa fa-comments"></i> Haberler</a>
						</li>
						<li class="list-group-item">
							<a href="logout.php"><i class="fa fa-cog"></i> Cikis Yap</a>
						</li>
					</ul>

					

					<hr>


				</div>
				<!--End Left Sidebar-->
				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body margin-bottom-20">
					
						<div class="tag-box tag-box-v3 form-page">
						<form action="_duyuruekle.php" method="post">
							<div class="headline"><h3>Duyuru Ekle</h3></div>
							<div class="margin-bottom-20"></div>
							<h4>Duyuru Başlığı</h4>
							<input type="text" name="DuyuruBaslik" class="form-control"/>
							<h4>Duyuru İçeriği</h4>
							<textarea class="form-control" rows="7" name="DuyuruIcerik"></textarea>
							<!--End Textarea-->

							<div class="margin-bottom-40"></div>
							
							


							<input class="btn-u margin-bottom-20" type="submit"></input>
						</form>
					</div>
						
					
					
						
						
						</div>
					</div>
				</div>
				<!-- End Profile Content -->
			</div><!--/end row-->
		</div>
 

 <?php include('footer.php'); ?>
