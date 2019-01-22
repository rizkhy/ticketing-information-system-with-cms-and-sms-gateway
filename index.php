<?php
require 'halo-pelanggan/function/indo_date.php';
require 'halo-pelanggan/function/indo_date2.php';
require 'halo-pelanggan/function/indo_date3.php';
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
    <title>P.O Budiman</title>

    <!-- Favicon -->
    <link rel="icon" href="img/budimansn.png">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">

</head>

<body>


    <!-- ***** Search Form Area ***** -->


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
                                <li class="nav-item active">
                                    <a class="nav-link" href="./">Beranda <span class="sr-only">(current)</span></a>
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

    <!-- ***** Welcome Area Start ***** -->
    <section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(img/busbudiman.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="hero-content">
                        <h2>Daftar Dan Pesan.</h2>
                        <h4>Daftar dan dapatkan kemudahan dalam memesan bus dari Budiman.</h4>
                    </div>
                    <!-- Hero Search Form -->
                    <div class="hero-search-form">
                        <!-- Tabs -->
                        <div class="nav nav-tabs" id="heroTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Tujuan Pergi</a>
                        </div>
                        <!-- Tabs Content -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                                <h6>Kemana tujuan Anda?</h6>
                                <form action="hasil-pencarian.php" method="GET">
                                    <select class="custom-select" id="id_jadwal" name="id_jadwal">
                                        <option value="show-all" selected="selected">== Pilih Tujuan Pergi ==</option>
                                                <?php
                                                require_once 'halo-pelanggan/function/pengaturan.php';
                                                $stmt = $db->prepare('SELECT * FROM jadwal_keberangkatan GROUP by tujuan');
                                                $stmt->execute();
                                                ?>
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                                <?php extract($row); ?>
                                                <option value="<?php echo $row['id_jadwal']; ?>"><?php echo indonesian_date_only($row['tgl_berangkat']); ?> - <?php echo indonesian_hour_only($row['jam']); ?> - <?php echo $row['tujuan']; ?></option>
                                                <?php endwhile; ?>
                                    </select>
                                    <select class="custom-select" id="kelas_kendaraan" name="kelas_kendaraan">
                                        <option value="show-all" selected="selected">== Pilih Kelas Kendaraan ==</option>
                                                <?php
                                                require_once 'halo-pelanggan/function/pengaturan.php';
                                                $stmt = $db->prepare('SELECT * FROM kendaraan GROUP by kelas_kendaraan');
                                                $stmt->execute();
                                                ?>
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                                                <?php extract($row); ?>
                                                <option value="<?php echo $row['kelas_kendaraan']; ?>"><?php echo $row['kelas_kendaraan']; ?></option>
                                                <?php endwhile; ?>
                                    </select>
                                    <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Cari Bus</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Catagory Area Start ***** -->
    <section class="dorne-catagory-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="all-catagories">
                        <div class="row">
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.2s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-1.png" alt="">
                                        <a href="#">
                                            <h6>Pesan Mudah</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.4s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-2.png" alt="">
                                        <a href="#">
                                            <h6>Harga Terjangkau</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Catagory Area -->
                            <div class="col-12 col-sm-6 col-md">
                                <div class="single-catagory-area wow fadeInUpBig" data-wow-delay="0.6s">
                                    <div class="catagory-content">
                                        <img src="img/core-img/icon-3.png" alt="">
                                        <a href="#">
                                            <h6>Terpercaya</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Catagory Area End ***** -->

    <!-- ***** About Area Start ***** -->
    <section class="dorne-about-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content text-center">
                        <h2>Selamat datang di <br><span>P.O Budiman</span></h2>
                        <p>Dapatkan fitur menarik dari kami hanya dengan mendaftar menjadi pelanggan.<br/>
						Jika ingin memesan, harap mendaftar menjadi pelanggan P.O Budiman terlebih dahulu.</p><br/>
						<a href="list-tujuan-bus.php" class="btn btn-success"><i class="fa fa-map" aria-hidden="true"></i> Tujuan Kami</a> <a href="list-kendaraan-bus.php" class="btn btn-primary"><i class="fa fa-bus" aria-hidden="true"></i> Kendaraan Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area End ***** -->


    <!-- ****** Footer Area Start ****** -->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> P.O Budiman. All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
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
