<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
/* include "../../lib/pagination.php"; */
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
/* $page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
/* $table = ''; */

// ambil data
/* $dataTable = getTableData($koneksi, $page, $dataPerPage); */
 
include "../templates/header.php";

/* 1. Tentukan batas dan cek halaman & posisi data */
$batas =10;
$halaman =@$_GET['halaman'];
if (empty($halaman)) {
	$posisi=0;
	$halaman=1;
} else{
	$posisi=($halaman-1) * $batas;
}
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manajemen <small>Data Pesanan</small></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								Go!
							</button> </span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Data Pesanan</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 0px;">No</th>
									<th style="width: 0px;">Nama</th>
									<th style="width: 0px;">Tgl pesanan</th>
									<th style="width: 0px;">Tgl pengiriman</th>
									<th style="width: 0px;">Jam pengiriman</th>
									<th style="width: 0px;">Status pesanan</th>
									<th style="width: 0px;">Status pembayaran</th>
                                    <th style="width: 0px;">Total pesanan</th>
									<th style="width: 0px;">Aksi</th>

								</tr>
							</thead>
							<tbody>
								<?php ?>

								<?php $nomor=1;?>
								<!-- query pesanan dan pelanggan -->
								<?php $ambil=$koneksi->query("SELECT * FROM pesanan JOIN pelanggan 
								ON pesanan.id_pelanggan=pelanggan.id_pelanggan ORDER BY pesanan.id_pesanan DESC LIMIT $posisi,$batas")  ?>
								<?php while($pecah=$ambil->fetch_assoc()){?>
								<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama'];?></td>
                                <td><?php echo $pecah['tgl_pesanan'];?></td>
								<td><?php echo $pecah['tgl_pengiriman'];?></td>
								<td><?php echo $pecah['jam_pesanan'];?></td>
								<td><?php echo $pecah['status'];?></td>
								<td><?php echo $pecah['status_pesanan'];?></td>
                                <td>Rp.<?php echo number_format ($pecah['total_pesanan']);?></td>
                                
									<!-- tombol detail -->
								<td><a href="<?php echo $admin_url; ?>pesanan/detail_pesanan.php?id=<?php echo $pecah['id_pesanan'];?>">
								<button class="btn btn-warning">
									Detail
								</button></a>
									<!-- tombol lihat pembayaran -->
								<?php if ($pecah['status_pesanan']!=="Pending"): ?>
								<a href="<?php echo $admin_url; ?>pesanan/lihat_pembayaran.php?id=<?php echo $pecah['id_pesanan'];?>" class="btn btn-success">Lihat Pembayaran</a>
								<?php endif ?>


								<a href="<?php echo $admin_url; ?>pesanan/hapus.php?id=<?php echo $pecah['id_pesanan'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								<button class="btn btn-danger">
									<i class="fa fa-remove"></i>
								</button></a></td>

								</tr>
								<?php $nomor++?>
								<?php } ?>
							</tbody>
						</table>
						
						
<?php
/* hitung total data dan halaman serta link  */
$ambil2 =mysqli_query($koneksi,"SELECT * FROM pesanan");
$jmldata=mysqli_num_rows($ambil2);

$jmlhalaman=ceil($jmldata/$batas);
echo "<br> Halaman :";
for ($i=1; $i <=$jmlhalaman ; $i++) {
if ($i != $halaman){  
	echo "<a href=\"main.php?halaman=$i\">$i</a>|";
} else {
	echo"<b>$i</b>|";
}
}
echo "<p>Jumlah data pesanan  :<b>$jmldata</b></p>";
?>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
			
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>