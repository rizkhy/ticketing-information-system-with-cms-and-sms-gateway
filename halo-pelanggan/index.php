<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['no_telp'])) {
    die("Anda belum login! Silahkan login terlebih dahulu!<br/><a href='../masuk/' type='button'>Masuk</a>");//jika belum login jangan lanjut
}

?>

<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Area <?php echo $_SESSION['nama_pelanggan'] ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="./"><img src="../img/budiman.png" width="100" height="50" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">
John Abraham</span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['nama_pelanggan'] ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $_SESSION['no_telp'] ?></span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Akun Saya</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pesanan Saya</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include 'function/nav.php' ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Selamat Datang,  <?php echo $_SESSION['nama_pelanggan'] ?></h2>
                            <?php
                            require 'function/kon2.php';
                            $query = mysqli_query($kon, "SELECT * FROM pesan where id_pelanggan='$_SESSION[id_pelanggan]'");
                            $jumlah = mysqli_num_rows($query);
                            ?>
                            <p class="pageheader-text">Anda memiliki <?php echo $jumlah; ?> pemesanan.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dasbor</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                <div class="col-xs-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card card-fluid">
                                <!-- .card-body -->
                                <div class="card-body text-center">
                                    <h3 class="card-title mb-2 text-truncate">
                                    <a href="user-profile.html"><?php echo $_SESSION['nama_pelanggan'] ?> </a>
                                      </h3>
                                    
                                    <p class="text-muted"> 
                                        Alamat: <b><?php echo $_SESSION['alamat'] ?></b><br/>
                                        No Telepon: <b><?php echo $_SESSION['no_telp'] ?></b><br/>
                                        No KTP: <b><?php echo $_SESSION['no_ktp'] ?></b><br/>
                                        Usia: <b><?php echo $_SESSION['usia'] ?> Tahun</b><br/>
                                        Jenis Kelamin: <b><?php echo $_SESSION['jk'] ?></b> 
                                    </p>
                                    <p>
                                        <a href="#" class="btn btn-success">Ubah Profil Saya
                                         <i class="fa fa-edit"></i>
                                        </a>
                                    </p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="mb-0">Jumlah Transaksi</h4>
                                        <div class="dropdown ml-auto">
                                            <a class="toolbar" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="far fa-flag"></i>  </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink5">
                                                <a class="dropdown-item" href="#">Ada Masalah?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    require 'function/kon2.php';
                                    $query = mysqli_query($kon, "SELECT * FROM transaksi join pesan on transaksi.id_pesan=pesan.id_pesan where id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $jumlah = mysqli_num_rows($query);
                                    ?>
                                    <div class="card-body">
                                        <p class="card-text">Anda memiliki <?php echo $jumlah; ?> transaksi.</p>
                                        <a href="pesan-bus/" class="btn btn-primary">Pesan Sekarang</a>
                                    </div>
                                </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- flush list  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <h5 class="card-header">Histori Transaksi</h5>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                    <?php
                                    require 'function/kon.php';
                                    $query = mysqli_query($kon, "SELECT transaksi.id_transaksi, transaksi.id_pesan, transaksi.foto, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, jadwal_keberangkatan.tujuan
                                    FROM transaksi
                                    JOIN pesan ON pesan.id_pesan = transaksi.id_pesan
                                    JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
                                    JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
                                    JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal
                                    where pesan.id_pelanggan='$_SESSION[id_pelanggan]' order by id_transaksi desc") or die("Gagal query");
                                    while ($r = mysqli_fetch_assoc($query)) { ?>
                                        <li class="list-group-item"><?= $r['id_transaksi']; ?> - <?= $r['tujuan']; ?></li>
                                    <?php 
                                } ?>
                                    </ul>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end flush list -->
                                <!-- ============================================================== -->
                            </div>
                </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <?php include 'footer.php' ?>
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>