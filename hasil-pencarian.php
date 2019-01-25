<?php
require 'halo-pelanggan/function/indo_date.php';
require 'halo-pelanggan/function/indo_date2.php';
require 'halo-pelanggan/function/indo_date3.php';
require 'halo-pelanggan/function/rupiah.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dorne - Directory &amp; Listing Template | Listing</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="dorne-load"></div>
    </div>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="./"><img src="img/budiman.png" alt="P.O Budiman" width="150" height="150"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="./">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="kontak-kami.php">Kontak Kami</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="list-tujuan-bus.php">Daftar Tujuan</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" href="list-kendaraan-bus.php">Daftar Kendaraan</a>
                                </li>
                            </ul>
                            <!-- Signin btn -->
                            <div class="dorne-signin-btn">
                                <a href="masuk/">Masuk</a>
                            </div>
                            <div class="dorne-signin-btn">
                                <a href="daftar/">Daftar</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/hero-1.jpg)"></div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Listing Destinations Area Start ***** -->
    <section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Hasil Pencarian</h4>
                        <p>Berikut hasil pencarian bus Anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Features Area -->
				<?php
require 'halo-pelanggan/function/kon.php';
$jam = $_GET['jam'];
$tgl_berangkat = $_GET['tgl_berangkat'];
$tujuan = $_GET['tujuan'];
$kelas_kendaraan = $_GET['kelas_kendaraan'];
$sql = "SELECT kendaraan.*, jadwal_keberangkatan.*, SUM(harga+harga_kelas) AS total
                             FROM jadwal_keberangkatan,kendaraan
                             WHERE tgl_berangkat='$tgl_berangkat' AND kelas_kendaraan='$kelas_kendaraan' AND jam='$jam' AND tujuan='$tujuan'";
$query2 = mysqli_query($kon, $sql) or die("Gagal query");

$data = mysqli_num_rows($query2);

if ($data > 0) {
  $query = mysqli_query($kon, "SELECT kendaraan.*, jadwal_keberangkatan.*, SUM(harga+harga_kelas) AS total
                               FROM jadwal_keberangkatan,kendaraan
                               WHERE tgl_berangkat='$tgl_berangkat' AND kelas_kendaraan='$kelas_kendaraan' AND jam='$jam' AND tujuan='$tujuan'") or die("Gagal query");

  while ($r = mysqli_fetch_assoc($query)) {
    if($r['merek_kendaraan'] != null){
          ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-features-area mb-50">
					              <img src="img/bus1.jpg" alt="" width="500" height="500">
                        <div class="feature-content d-flex align-items-center justify-content-between">
                            <div class="feature-title">
                                <h5><?= $r['tujuan']; ?></h5>
                                <p>
                                  Tanggal Berangkat: <?= indonesian_date_only($r['tgl_berangkat']); ?><br/>
                  								Jam Berangkat: <?= indonesian_hour_only($r['jam']); ?><br/>
                  								Merek Kendaraan: <?= $r['merek_kendaraan']; ?><br/>
                                  Nomor Kendaraan: <?= $r['nomor_kendaraan']; ?><br/>
								                </p>
                								<div class="feature-favourite">
                                                <a href="#"><?= rupiah($r['total']); ?></a>
                								</div>
                            </div>
                        </div>
                    </div>
                </div>
  <?php
}else {
  ?>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="feature-title">
                        <h5 style="text-align: center">Tidak Ada Jadwal Yang Ditemukan</h5>
                    </div>
                </div>
  <?php
}
      }
    }
 ?>
            </div>
        </div>
    </section>
    <!-- ***** Listing Destinations Area End ***** -->

    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
