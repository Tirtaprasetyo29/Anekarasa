<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

$id_pesanan=$_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
LEFT JOIN pesanan ON pembayaran.id_pesanan=pesanan.id_pesanan
WHERE pesanan.id_pesanan='$id_pesanan'");
$lhtpembayaran=$ambil->fetch_assoc();

if (empty($lhtpembayaran)) {
    echo "<script>alert('data pembayaran kosong')</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}

if ($_SESSION["pelanggan"]["id_pelanggan"]!==$lhtpembayaran["id_pelanggan"]) {
    echo "<script>alert('anda tidak berhak melakukan akses')</script>";
    echo "<script>location='riwayat_belanja.php';</script>";
    exit();
}
?>

<div class="container">
    <h1>Lihat Pembayaran</h1>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $lhtpembayaran["nama"];?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $lhtpembayaran["bank"]; ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp.<?php echo number_format ($lhtpembayaran["jumlah"]);?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $lhtpembayaran["tanggal"];?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
        <img src="file/bukti_pembayaran/<?php echo $lhtpembayaran["bukti"]?>" alt="" class="img-responsive">
        </div>
    </div>
</div>

<?php
include "templates/footer.php";
?>