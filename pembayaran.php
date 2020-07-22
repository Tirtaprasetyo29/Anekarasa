<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

//jika tidak ada session pelanggan (blm melakukan login), maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}

$idpsn =$_GET["id"];
$ambil=$koneksi->query("SELECT * FROM pesanan WHERE id_pesanan='$idpsn'");
$detpsn = $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli 
$pelangganbeli =$detpsn["id_pelanggan"];
//mendapatkan id pelanggan yang login
$pelagganlogin =$_SESSION["pelanggan"]["id_pelanggan"];

if ($pelangganbeli !== $pelagganlogin)
{
    echo "<script>alert('hayo,..mau lihat yaaa');</script>";
    echo "<script>location='riwayat_belanja.php'</script>";
    exit();
}
?>
<div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim bukti pembayaran anda disini untuk melanjutkan pesanan agar dikirim</p>
    <div class="alert alert-info">Total tagihan anda <strong>
     Rp.<?php echo number_format($detpsn["total_pesanan"])?>
    </strong></div>
    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label >Nama Penyetor</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label >Bank</label>
                            <input type="text" class="form-control" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label >Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" min="10" required>
                        </div>
                        <div class="form-group">
                            <label >Foto Bukti</label>
                            <input type="file" class="form-control" name="bukti">
                            <p class="text-danger">Foto bukti harus JPG maksimal 2MB</p>
                        </div>
                        <button class="btn btn-primary" name="kirim">Kirim</button> <hr>

    </form>
</div>

<?php
//jika ada tombol kirim di pencet
if (isset($_POST["kirim"]))
 {
    //upload dulu foto bukti nya
    $namabukti=$_FILES["bukti"]["name"];
    $lokasibukti=$_FILES["bukti"]["tmp_name"];
    $namafik = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti,"file/bukti_pembayaran/$namafik");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("y-m-d");

    $koneksi->query("INSERT INTO pembayaran(id_pesanan, nama, bank, jumlah, tanggal, bukti)
    VALUES ('$idpsn','$nama','$bank','$jumlah','$tanggal','$namafik')");

//Simpan pembayaran
$koneksi->query("INSERT INTO pembayaran(id_pesanan, nama, bank, jumlah, tanggal, bukti)
VALUES ('$idpsn','$nama','$bank','$jumlah','$tanggal','$namafik')");

//update data pembelian dari pending menjadi sudah kirim pembayaran
$koneksi->query("UPDATE pesanan SET status_pesanan='Sudah kirim pembayaran'
WHERE id_pesanan='$idpsn' ");

echo "<script>alert('Terimakasih sudah mengirim pembayaran, selanjutnya tunggu pesanan');</script>";
echo "<script>location='riwayat_belanja.php';</script>";

}
?>

<?php
include "templates/footer.php";
?>