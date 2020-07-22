<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
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
$table = 'testimoni';

// ambil data
$dataTable = getTableData($koneksi, $table, $page, $dataPerPage); */
$batas =10;
$halaman =@$_GET['halaman'];
if (empty($halaman)) {
	$posisi=0;
	$halaman=1;
} else{
	$posisi=($halaman-1) * $batas;
}

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manajemen <small>Data Navigasi</small></h3>
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
						<h2><small>Data Navigasi</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
                                    <th>isi</th>
									<th style="width: 150px;">Aksi</th>

								</tr>
							</thead>
							<tbody>
							<?php $nomor=1;?>
								<!-- query navigasi -->
								<?php 
								$ambil= mysqli_query($koneksi,"SELECT * FROM Navigasi ORDER BY id_navigasi DESC LIMIT $posisi, $batas"); 
								 while ($pecah= mysqli_fetch_array ($ambil)){ ?>
								<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah ['nama'];?></td>
                                <td><?php echo $pecah ['isi']?></td>
                          
								<td><a href="<?php echo $admin_url; ?>navigasi/form_edit.php?id_navigasi=<?php echo $pecah ['id_navigasi'];?>">
								<button class="btn btn-warning">
									<i class="fa fa-edit"></i>
								</button></a>
								
								<a href="<?php echo $admin_url; ?>navigasi/hapus.php?id_navigasi=<?php echo $pecah ['id_navigasi'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								
								<button class="btn btn-danger">
									<i class="fa fa-remove"></i>
								</button></a></td>

								</tr>
								<?php $nomor++?>
								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>navigasi/form_tambah.php">
				<button class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah
				</button></a>
				
			
			</div>
			<div class="clearfix"></div>
			<?php
/* hitung total data dan halaman serta link  */
$ambil2 =mysqli_query($koneksi,"SELECT * FROM navigasi");
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
echo "<p>Jumlah navigasi  :<b>$jmldata</b></p>";
?>
		</div>
	</div>
</div>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>