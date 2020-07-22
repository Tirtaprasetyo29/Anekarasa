<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";
?>

<section class="konten">
    <div class="container">
        <h2>Nota Pesanan</h2>
        <h3 align="center">RM. Aneka Rasa</h3>
        <h5 align="center">Jln.Wahid Hasyim No 12, Pringgolayan, Depok, Sleman</h5>
<?php
/* menggabungkan data pesanan dan data pelanggan */
        $ambil=$koneksi->query("SELECT*FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
        WHERE pesanan.id_pesanan='$_GET[id]'");
        $detail=$ambil->fetch_assoc();
?>. 

<!-- jika pelanggan mencoba melihat nota orang dengan menganti id di url maka sistem
akan melindungi dan mengubah nya ke riwayat.php sendiri -->

<!-- pelanggan yang beli harus sama dengan pelanggan yang login -->
<?php
//mendapatkan id pelanggan yang beli 
$pelangganbeli =$detail["id_pelanggan"];
//mendapatkan id pelanggan yang login
$pelagganlogin =$_SESSION["pelanggan"]["id_pelanggan"];

if ($pelangganbeli !== $pelagganlogin)
{
    echo "<script>alert('hayo,..mau lihat yaaa');</script>";
    echo "<script>location='riwayat_belanja.php'</script>";
    exit();
}
?>

<!-- header nota -->
<div class="row">
<div class="col-md-4">
<h3>Pembelian</h3>
<strong>No. Pembelian: <?php echo $detail['id_pesanan']; ?></strong><br>
Tanggal : <?php echo $detail['tgl_pesanan'] ;?><br>
Total : <?php echo number_format($detail['total_pesanan']) ;?>
</div>

<div class="col-md-4">
<h3>Pelanggan</h3>
<strong><?php echo $detail['nama'];?></strong><br>
<p>
    <?php echo $detail['no_hp'];?><br>
    <?php echo $detail['email']; ?>
</p>
</div>

<div class="col-md-4">
<h3>Pengiriman</h3>
<strong>Alamat : <?php echo $detail['Alamat_pengiriman'];?></strong><br>
Tanggal : <?php echo $detail['tgl_pengiriman'];?><br>
Jam dikirim : <?php echo $detail['jam_pesanan'];?>
</div>
</div>



<table class=" table table-bordered"> 
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM detail_pesanan WHERE id_pesanan='$_GET[id]'");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama'];?></td>
            <td>Rp.<?php echo number_format ($pecah['harga']); ?></td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td>Rp.<?php echo number_format ($pecah['harga']*$pecah['jumlah']);?>
            </td>
        
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>

<div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
            <p>
                Silahkan menunggu konfirmasi admin jika bisa pesan silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pesanan']); ?><br>
                <strong>BANK BRI 3071-1010-1642-5533 AN. TUTI ANEKAWATI</strong>  
            </p> 
            </div>
        </div>
</div>


    </div>
</section>

<?php
include "templates/footer.php";
?>