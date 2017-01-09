<?php include('header.php'); ?>

		

		<!--=== Content Part ===-->
		<div class="container content">
		
			<div class="row">
				<!-- Begin Content -->
				<div class="col-md-12">
					<div class="headline-center breadcrumbs margin-bottom-20">
						<div class="container">
							<h1 class="pull-left">Tüm Duyurular</h1>
						</div>
					</div>
					<ul class="timeline-v2">
						
					<?php
					
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

					$sql = "SELECT d.*,a.Unvan FROM duyurular d inner join adminler a on a.ID = d.AdminID order by d.ID DESC";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							
							$strDate = strtotime($row["Tarih"]);
							$newDateFormat = date('d/m/Y',$strDate);
							$newDateFormatOnlyDay = date('l',$strDate);
							
							$htmlString = '<li class="equal-height-columns">
							<div class="cbp_tmtime equal-height-column"><span>'.$newDateFormat.'</span><span>'.$newDateFormatOnlyDay.'</span></div>
							<i class="cbp_tmicon rounded-x hidden-xs"></i>
							<div class="cbp_tmlabel equal-height-column">
								<h2>'.$row["DuyuruBaslik"].'</h2>
								<h5>'.$row["DuyuruIcerikHtml"].'</h5>
								<small class="color-green">'.$row["Unvan"].'</small>
							</div>
						</li>';
							
							
							echo iconv("","UTF-8",$htmlString);
						}
					} else {
						
					}
					?>
						
					</ul>
				</div>
				<!-- End Content -->
				
			</div>
		</div><!--/container-->
		<!--=== End Content Part ===-->

		
<?php include('footer.php'); ?>