<?php 
session_start();
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../templates/header.php"; 



?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">

            <div class=" col-md-2 tile_stats_count">
            <?php
              $sql 	= "SELECT * FROM tbl_kategori";
              $data 	= mysqli_query($koneksi, $sql);
              $kategori = mysqli_num_rows($data);
            ?>
              <span class="count_top"><i class="fa fa-user"></i> Total Kategori</span>
              <div class="count"><?php echo $kategori ?></div>
            </div>

            <div class="col-md-2  tile_stats_count">
            <?php
              $sql 	= "SELECT * FROM tbl_produk";
              $data 	= mysqli_query($koneksi, $sql);
              $produk = mysqli_num_rows($data);
            ?>
              <span class="count_top"><i class="fa fa-camera"></i> Total Produk</span>
              <div class="count"><?php echo $produk ?></div>
            </div>

            <div class="col-md-2  tile_stats_count">
            <?php
              $sql 	= "SELECT * FROM pelanggan";
              $data 	= mysqli_query($koneksi, $sql);
              $pelanggan = mysqli_num_rows($data);
            ?>
              <span class="count_top"><i class="fa fa-user"></i> Total Pelanggan</span>
              <div class="count"><?php echo $pelanggan ?></div>
            </div>

            <div class="col-md-2  tile_stats_count">
            <?php
              $sql 	= "SELECT * FROM pesanan";
              $data 	= mysqli_query($koneksi, $sql);
              $pesanan = mysqli_num_rows($data);
            ?>
              <span class="count_top"><i class="fa fa-cc"></i> Total Pesanan</span>
              <div class="count"><?php echo $pesanan ?></div>
            </div>

            <div class=" tile_stats_count">
            <?php
              $sql 	= "SELECT * FROM tbl_user";
              $data 	= mysqli_query($koneksi, $sql);
              $user = mysqli_num_rows($data);
            ?>
              <span class="count_top"><i class="fa fa-user"></i> Total User</span>
              <div class="count"><?php echo $user ?></div>
            </div>

            <div class="  tile_stats_count">
            <?php
            $query = mysqli_query($koneksi, "SELECT SUM(total_pesanan) FROM pesanan where status_pesanan='barang dikirim' ");
            $total = mysqli_fetch_array($query); ?>
              <span class="count_top"><i class="fa fa-money"></i> Total Pendapatan</span>
              <div class="count green">Rp.<?php  echo number_format($total['SUM(total_pesanan)']) ; ?></div>
            </div>

          </div>
<!-- dasboard kotak-kotak -->
          <section class='content'>
          <div class='row'>
            <h2>Status</h2>
          <div class='col-lg-3 col-xs-6'>
          <?php
          $query1 = mysqli_query($koneksi,"SELECT COUNT(id_pesanan) FROM pesanan WHERE status ='menunggu konfirmasi admin'");
          $status = mysqli_fetch_array($query1);
          ?>
          <div class='small-box bg-green'>
            <h3 align="center">Menunggu Konfirmasi</h3>
            <div class='inner'><h3 align="center"><?php echo $status[0];?> </h3></div>
            <div class='icon' align="center"><i class='fa fa-thumbs-up'></i></div>
            <a href='../pesanan/main.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>

          <div class='col-lg-3 col-xs-6'>
          <?php
          $query2 = mysqli_query($koneksi,"SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan ='pending'");
          $status1 = mysqli_fetch_array($query2);
          ?>
          <div class='small-box bg-purple'>
            <h3 align="center">Pending</h3>
            <div class='inner'><h3 align="center"><?php echo $status1[0];?>  </h3></div>
            <div class='icon'align="center"><i class='fa fa-clock-o'></i></div>
            <a href='../pesanan/main.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>

        <div class='col-lg-3 col-xs-6'>
        <?php
          $query3 = mysqli_query($koneksi,"SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan ='barang dikirim'");
          $status2 = mysqli_fetch_array($query3);
          ?>
          <div class='small-box bg-blue'>
            <h3 align="center">Barang Dikirim</h3>
            <div class='inner'><h3 align="center"><?php echo $status2[0];?>  </h3></div>
            <div class='icon' align="center"><i class='fa fa-gift'></i></div>
            <a href='../pesanan/main.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>

        <div class='col-lg-3 col-xs-6'>
        <?php
          $query4 = mysqli_query($koneksi,"SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan ='batal'");
          $status3 = mysqli_fetch_array($query4);
          ?>
          <div class='small-box bg-red'>
          <h3 align="center">Batal</h3>
            <div class='inner'><h3 align="center"><?php echo $status3[0];?>  </h3></div>
            <div class='icon' align="center"><i class='fa fa-times'></i></div>
            <a href='../pesanan/main.php' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>

          </div> <!-- row -->
        </section>

        




  </div>
          
          
          </div>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div> 
        </div> 
        <!-- /page content -->
<?php include "../templates/footer.php"; ?>