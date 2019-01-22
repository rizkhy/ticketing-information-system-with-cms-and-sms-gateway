<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['no_telp'])) {
    die("Anda belum login!");//jika belum login jangan lanjut
    header("../../masuk/");
}

?>

<?php
error_reporting(0);
?>
<?php 
include '../function/indo_date.php';
include '../function/indo_date2.php';
include '../function/indo_date3.php';
include '../function/rupiah.php';
?>



<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice Pesanan Bus Budiman</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                <a class="navbar-brand" href="./"><img src="../../img/budiman.png" width="100" height="50" /></a>
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
                                                    <div class="notification-list-user-img"><img src="../assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="../assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">
John Abraham</span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="../assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="../assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['nama_pelanggan'] ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $_SESSION['no_telp'] ?></span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Akun Saya</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Pesanan Saya</a>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Keluar</a>
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
      <?php include '../function/nav-invoice.php' ?>
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
                            <h2 class="pageheader-title">Berikut Detail Pesanan Anda,  <?php echo $_SESSION['nama_pelanggan'] ?>.</h2>
                            <?php
                            require '../function/kon2.php';
                            $query = mysqli_query($kon, "SELECT * FROM pesan where id_pelanggan='$_SESSION[id_pelanggan]'");
                            $jumlah = mysqli_num_rows($query);
                            ?>
                            <p class="pageheader-text">Anda memiliki <?php echo $jumlah; ?> pemesanan.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Invoice Pemesanan</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <?php

                $sql = mysqli_query($kon, "SELECT pesan.*, pelanggan.*, jadwal_keberangkatan.*, SUM((jadwal_keberangkatan.harga + kendaraan.harga_kelas) * pesan.jml_penumpang) as sub_total 
                                            FROM pesan 
                                                JOIN pelanggan ON pesan.id_pelanggan=pelanggan.id_pelanggan 
                                                JOIN jadwal_keberangkatan ON pesan.id_jadwal=jadwal_keberangkatan.id_jadwal 
                                                JOIN kendaraan ON kendaraan.id_kendaraan=pesan.id_kendaraan 
                                            where pesan.id_pelanggan='$_SESSION[id_pelanggan]' AND pesan.id_pesan = (SELECT MAX(id_pesan) FROM pesan)");
                $pesan = mysqli_fetch_assoc($sql);
                ?>
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                     <a class="pt-2 d-inline-block" href="../"><img src="../../img/budiman.png" width="100" height="50" /></a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice No: <?php echo $pesan['id_pesan']; ?></h3>
                                    Tanggal: <?php echo indonesian_date($pesan['tgl_pesan']); ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Dari:</h5>                                            
                                            <h3 class="text-dark mb-1">P.O Budiman</h3>
                                         
                                            <div>Jl. Imogiri Timur No.206, Giwangan, Umbulharjo</div>
                                            <div>Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163</div>
                                            <div>Telepon: (0274) 381250</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Kepada:</h5>
                                            <h3 class="text-dark mb-1"><?php echo $pesan['nama_pelanggan']; ?></h3>                                            
                                            <div><?php echo $pesan['alamat']; ?></div>
                                            <div><?php echo $pesan['jk']; ?></div>
                                            <div><?php echo $pesan['usia']; ?> Tahun</div>
                                            <div><?php echo $pesan['no_telp']; ?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Tujuan</th>
                                                    <th>Jumlah Penumpang</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Jam Berangkat</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong"><?php echo $pesan['tujuan']; ?></td>
                                                    <td class="left"><?php echo $pesan['jml_penumpang']; ?> Orang</td>
                                                    <td class="right"><?php echo indonesian_date_only($pesan['tgl_berangkat']); ?></td>
                                                    <td class="center"><?php echo indonesian_hour_only($pesan['jam']); ?></td>
                                                    <td class="right"><?php echo rupiah($pesan['sub_total']); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5"><br/>
                                        <h5>Mohon untuk segera mengunggah foto bukti pembayaran di bawah ini:</h5>
                                        <form action="../../dashboard/img/upload_bukti.php" method="POST" enctype="multipart/form-data">
                                        <div>
											<input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $pesan['id_pesan']; ?>">
											<input type="hidden" class="form-control" name="id_pesan" value="<?php echo $pesan['id_pesan']; ?>">
                                            <input type="file" class="form-control" id="foto" name="foto" required=""><br/>
                                        </div>
                                        <div>
                                        <button type="submit" class="btn btn-rounded btn-success btn-sm">Upload Bukti</button>
                                        </div>
                                        </form><br/>
                                        <form action="simpan_invoice.php" method="POST" enctype="multipart/form-data">
                                        <div>
											<input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $pesan['id_pesan']; ?>">
											<input type="hidden" class="form-control" name="id_pesan" value="<?php echo $pesan['id_pesan']; ?>">
                                        </div>
                                        <div>
                                        <button type="submit" class="btn btn-rounded btn-primary btn-sm">Upload Nanti</button>
                                        </div>
                                        </form>
                                        <br/>
                                        <h5>
                                        Pembayaran dilakukan secara transfer ke rekening P.O Budiman:<br/><br/>
                                        Rekening BNI: <b>0354783821</b><br/>
                                        Atas Nama: <b>P.O Budiman</b>
                                        </h5><br/>
                                        <p><i><small>Batas waktu pengiriman paling lambat 3 hari setelah pemesanan.<br/>
                                        Jika melebihi waktu tersebut, pelanggan dinyatakan batal dalam memesan.</small></i></p>
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Diskon</strong>
                                                        </td>
                                                        <td class="right">0%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark"><?php echo rupiah($pesan['sub_total']); ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <p class="mb-0">P.O Budiman Yogyakarta <script>document.write(new Date().getFullYear());</script>.</p>
                                </div>
                            </div>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <?php include '../footer.php' ?>
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
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>