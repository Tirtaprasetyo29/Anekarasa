<footer id="footer"><!--Footer-->
<?php 
include "lib/koneksi.php";?> 
		<div class="footer-top">
			<div class="container">
			<div class="row">
					<!-- <div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
		<div class="footer-widget">
			<div class="container col-xs-12">
				<div class="col-sm-6">
						<div class="companyinfo">
							<h2><span>Aneka</span>Rasa</h2>
							<h>Jln. Wahid Hasyim No 12, Pringgolayan  <br />Condongcatur, Depok, Sleman <br/> Daerah Istimewa Yogyakarta</h>
						</div>
					</div>

					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Testimoni</a></li>
								<li><a href="#">Hubungi Kami</a></li>
								
								
							</ul>
						</div>
					</div>
				
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Peraturan</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a data-toggle="modal" href="#carapesen">Cara Pesen</a></li>

											<!-- Modal cara pesen -->
											<?php
											$ambil = $koneksi -> query ("SELECT * FROM navigasi where id_navigasi =2 ");
											$detail = $ambil->fetch_assoc();
											?>
											<div id="carapesen" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- konten modal-->
										<div class="modal-content">
											<!-- heading modal -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><?php echo $detail['nama']?></h4>
											</div>
											<!-- body modal -->
											<div class="modal-body">
												<p><?php echo $detail['isi']?></p>
											</div>
											<!-- footer modal -->
											<div class="modal-footer">
												<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<li><a data-toggle="modal" href="#carabayar">Cara Bayar</a></li>
								<!-- Modal cara pesan -->
								<?php
									$ambil = $koneksi -> query ("SELECT * FROM navigasi where id_navigasi =1 ");
									$detail = $ambil->fetch_assoc();
								?>
								<div id="carabayar" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- konten modal-->
										<div class="modal-content">
											<!-- heading modal -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title"><?php echo $detail['nama']?></h4>
											</div>
											<!-- body modal -->
											<div class="modal-body">
												<p><?php echo $detail['isi']?></p>
											</div>
											<!-- footer modal -->
											<div class="modal-footer">
												<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2> Aneka Rasa</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Informasi Usaha</a></li>
								<li><a href="#">Tempat Lokasi</a></li>
								
							</ul>
						</div>
					</div>
				<!-- 	<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Aneka Rasa</h2>
								<p>Jln. Wahid Hasyim No 7, Pringgolayan  <br />Condongcatur, Depok, Sleman <br/> Daerah Istimewa Yogyakarta</p>
						</div>
					</div> -->
				</div>
				</div>
				</div>
		</div> 
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		</div>
	</footer><!--/Footer-->
	

  
    <script src="assets/frontend/js/jquery.js"></script>
	<script src="assets/frontend/js/bootstrap.min.js"></script>
	<script src="assets/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="assets/frontend/js/price-range.js"></script>
    <script src="assets/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="assets/frontend/js/main.js"></script>
	<!-- <script type="text/javascript" src="assets/frontend/js/jquery.js"></script>
<script type="text/javascript" src="assets/frontend/js/jquery-ui/jquery-ui.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.input-tanggal').datepicker();
	});
</script> -->
</html>