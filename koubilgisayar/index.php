<?php include('header.php'); ?>

		

		<!--=== Content Part ===-->
		<div class="container content">
		
		<!-- Magazine Slider -->
		
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
					
					$sql = "SELECT * FROM slaytlar";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						
						echo iconv("","UTF-8",'<div class="carousel slide carousel-v1 margin-bottom-40" id="myCarousel-1">
				<div class="carousel-inner">'); 
						$first = ' active';
						while($row = $result->fetch_assoc()) {
							
							$htmlString = '<div class="item'.$first.'">
						<img alt="" style="height:400px; margin-left: auto;  margin-right: auto;" src="slayt/'.$row["ID"].'">
						<div class="carousel-caption">
							<p>'.$row["SlaytBaslik"].'</p>
						</div>
					</div>';
							
							
							echo iconv("","UTF-8",$htmlString);
							
							$first = '';
						}
						echo iconv("","UTF-8",'</div>

				<div class="carousel-arrow">
					<a data-slide="prev" href="#myCarousel-1" class="left carousel-control">
						<i class="fa fa-angle-left"></i>
					</a>
					<a data-slide="next" href="#myCarousel-1" class="right carousel-control">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>');
					} else {
						
					}
					
					
					
					?>
		
					<!-- End Magazine Slider -->
		
			<div class="row">
				<!-- Begin Content -->
				<div class="col-md-6">
					<div class="headline-center breadcrumbs margin-bottom-20">
						<div class="container">
							<h1 class="pull-left">Duyurular</h1>
						</div>
					</div>
					<ul class="timeline-v2">
						
					<?php
					

					$sql = "SELECT d.*,a.Unvan FROM duyurular d inner join adminler a on a.ID = d.AdminID order by ID DESC Limit 5";
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
					<div class="headline-center breadcrumbs margin-bottom-20">
						<div class="container">
							<h5 class="pull-left"><a href="tumduyurular.php">Tüm Duyuruları Görmek İçin Tıklayın</a></h5>
						</div>
					</div>
					
				</div>
				<!-- End Content -->
				
				<!-- Begin Content -->
				<div class="col-md-6">
					<div class="headline-center breadcrumbs margin-bottom-20">
						<div class="container">
							<h1 class="pull-left">Haberler</h1>
						</div>
					</div>
					<ul class="timeline-v2">
					
					<?php
					
					$sql = "SELECT d.*,a.Unvan FROM haberler d inner join adminler a on a.ID = d.AdminID order by ID DESC Limit 5";
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
								<h2>'.$row["HaberBaslik"].'</h2>
								<h5>'.$row["HaberIcerikHtml"].'</h5>
								<small class="color-green">'.$row["Unvan"].'</small>
							</div>
						</li>';
							
							
							echo iconv("","UTF-8",$htmlString);
						}
					} else {
						
					}
					$conn->close();
					?>
					
					</ul>
					<div class="headline-center breadcrumbs margin-bottom-20">
						<div class="container">
							<h5 class="pull-left"><a href="tumhaberler.php">Tüm Haberleri Görmek İçin Tıklayın</a></h5>
						</div>
					</div>
				</div>
				<!-- End Content -->
			</div>
		</div><!--/container-->
		<!--=== End Content Part ===-->

		
<?php include('footer.php'); ?>