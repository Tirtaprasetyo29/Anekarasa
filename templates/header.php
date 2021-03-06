<?php
//untuk menghidupkan session
if (!isset($_SESSION)) {

	session_start();
	
	}
//untuk menjadikan session cart kedalam array
if (!isset($_SESSION['cart'])) {

	$_SESSION['cart']=array();
	} 

	$ambil
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include "lib/koneksi.php";?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | RM.Aneka Rasa</title>
    <link href="assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/frontend/css/price-range.css" rel="stylesheet">
    <link href="assets/frontend/css/animate.css" rel="stylesheet">
	<link href="assets/frontend/css/main.css" rel="stylesheet">
	<link href="assets/frontend/css/responsive.css" rel="stylesheet">

<!-- 	<link rel="stylesheet" type="text/css" href="assets/frontend/js/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/frontend/css/style.css"> -->

<!-- <input type="text" class="input-tanggal">
 -->
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0896-0770-7067</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-envelope"></i> AnekaRasa@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="assets\frontend\images\home\logo.png" height="50px"width="150px" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li> -->
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="keranjang.php"><span class="badge"><?php echo count($_SESSION['cart']);?></span><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<!-- jika sudah login (ada session pelanggan) -->
								<?php if (isset($_SESSION["pelanggan"])):?>
								<li><div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
									<i class="fa fa-user"></i>Hai,<?php echo $_SESSION["pelanggan"]['nama']?><i class="fa fa-angle-down"></i>
									<!-- <span class="caret"></span> -->
									</button>
										<ul class="dropdown-menu">
											<li><a href="profil_pelanggan.php?id_pelanggan=<?php echo $_SESSION["pelanggan"]['id_pelanggan'];?>">Profil</a></li>
											<li><a href="riwayat_belanja.php">Riwayat Belanja</a></li> 
											<li><a href="testimoni.php">Testimoni</a></li>
											<br>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</li> 
								</div></li>	
								<!-- selain itu jika belum login / belum ada session pelanggan  -->
								<?php else: ?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login or Register</a></li>
								<?php endif ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
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
								<!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.php">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
							<!-- 	<li><a href="contact-us.html">Testimoni</a></li> -->
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->