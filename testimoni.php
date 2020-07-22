<?php
session_start();
include "lib/koneksi.php";
include "templates/header.php";

//jika tidak ada session pelanggan (blm melakukan login), maka dilarikan ke login.php
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}
?>
    <div class="container">
        <div class="col-lg-4">
            <div class="page-header">
                <h3>Form Testimoni Pelanggan</h3>
            </div>

            <form method="POST" role="form" class="form-horizontal">
                <div class="form-group">
                <label>Nama</label>
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama"]?>" name="nama" class="form-control">
                </div>

                <div class="form-group">
                <label>Email</label>
                <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["email"]?>"name="email" class="form-control">
                </div>

                <div class="form-group">
                <label>Testimoni</label>
                <textarea  name="isi" class="form-control"></textarea>
                </div>

                <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
                <?php
                    if (isset($_POST["simpan"]))
                     {
                        $id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
                        $nama = $_SESSION["pelanggan"]["nama"];
                        $email = $_SESSION["pelanggan"]["email"];
                        $tanggal = date("y-m-d");
                        $isi = $_POST["isi"];

                        $koneksi->query("INSERT INTO testimoni (id_pelanggan,nama, email, tanggal, isi)
                        VALUES ('$id_pelanggan','$nama', '$email', '$tanggal', '$isi' )");

                        echo "<script>alert('Terimakasih sudah memberikan testimoni, semoga anda puas dengan pelayanan kami');</script>";
                        echo "<script>location='index.php';</script>";
                    }
                ?>

        </div>
    </div>



<?php 
include "templates/footer.php";
?>