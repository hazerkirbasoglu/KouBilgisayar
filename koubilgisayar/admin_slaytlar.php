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
						<li class="list-group-item active">
							<a href="admin_slaytlar.php"><i class="fa fa-bar-chart-o"></i> Slaytlar</a>
						</li>
						<li class="list-group-item">
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
					
						<a class="btn-u margin-bottom-20" href="admin_slaytekle.php">Yeni Slayt Ekle</a>
						<div class="table-search-v1 margin-bottom-20">
							<div class="table-responsive">
								<table class="table table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>Slayt Resmi</th>
											<th>Slayt Yazısı</th>
											<th>İşlemler</th>
										</tr>
									</thead>
									<tbody>
									
									<?php
										
										$sql = 'SELECT * FROM slaytlar';
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
							
												$htmlString = '<tr><td><img src="slayt/'.$row["ID"].'" style="max-width:300px; max-height:200px;"/></td><td>'.$row["SlaytBaslik"].'</td><td><a class="btn-u btn-u-blue" href="admin_slaytguncelle.php?id='.$row["ID"].'">Guncelle</a></br></br><a class="btn-u btn-u-red" href="_slaytsil.php?id='.$row["ID"].'">Sil</a></td></tr>';
												
												
												echo iconv("","UTF-8",$htmlString);
											}
										}
									
									
									?>
									
									</tbody>
								</table>
							</div>
						</div>
						</div>
					</div>
				</div>
				<!-- End Profile Content -->
			</div><!--/end row-->
		</div>
 

 <?php include('footer.php'); ?>
