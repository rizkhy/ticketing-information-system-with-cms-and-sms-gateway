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
    <title>Pesan Bus Budiman</title>
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
      <?php include '../function/nav-cart.php' ?>
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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Detail Pemesanan</a></li>
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
                require '../function/kon.php';
                $pelanggan = $_GET['id_pelanggan'];
                $id_jadwal = $_GET['id_jadwal'];
                $id_kendaraan = $_GET['id_kendaraan'];
                $total = $_GET['total'];
                $query = mysqli_query($kon, "SELECT pelanggan.*, jadwal_keberangkatan.*, kendaraan.*
                                                FROM pelanggan, jadwal_keberangkatan, kendaraan
													WHERE pelanggan.id_pelanggan = '$pelanggan'
													AND jadwal_keberangkatan.id_jadwal = '$id_jadwal'
													AND kendaraan.id_kendaraan ='$id_kendaraan'") or die("Gagal query");
                $harga = $_GET['harga'];
                $harga_kelas = $_GET['harga_kelas'];
                $jml_penumpang = $_GET['jml_penumpang'];
                $jumlah = $total * $jml_penumpang;
                while ($r = mysqli_fetch_assoc($query)) { ?>
                <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="mb-0">Detail Pesanan</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form class="needs-validation" novalidate="" action="isi.php" name="invoice" id="invoice" method="POST">
												<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan; ?>">
												<input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
												<input type="hidden" name="id_kendaraan" value="<?php echo $id_kendaraan; ?>">
                                                <?php 
                                                $kon = new mysqli("localhost", "root", "", "budiman");
                                                $sql = "SELECT MAX(id_pesan) AS urut FROM pesan";
                                                $hasil = mysqli_query($kon, $sql);

                                                while ($pesan = mysqli_fetch_assoc($hasil)) {
                                                    $nomor = $pesan['urut'];
                                                    $nomor++;
                                                    ?>

                                                <input type="hidden" id="id_pesan" name="id_pesan" class="form-control" value="<?php echo $nomor; ?>" />

                                           <?php 
                                        }
                                        ?>
                                                <?php
                                                $query = mysqli_query($kon, "SELECT * from pelanggan WHERE id_pelanggan='$pelanggan'");
                                                while ($pelanggan = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                <div class="mb-3">
                                                    <label for="firstName">Nama Anda</label>
                                                    <input type="text" class="form-control" id="firstName" name="nama_pelanggan" value="<?= $r['nama_pelanggan']; ?>" required="" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lastName">Alamat</label>
                                                    <input type="text" class="form-control" id="lastName" name="alamat" value="<?= $r['alamat']; ?>" required="" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lastName">No Telepon</label>
                                                    <input type="text" class="form-control" id="lastName" name="no_telp" value="<?= $r['no_telp']; ?>" required="" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="lastName">No KTP</label>
                                                    <input type="text" class="form-control" id="lastName" name="no_ktp" value="<?= $r['no_ktp']; ?>" required="" readonly>
                                                </div>
                                                <?php 
                                            } ?>
                                                <div class="mb-3">
                                                    <label for="lastName">Jumlah Penumpang</label>
                                                    <input type="text" class="form-control" id="jml_penumpang" name="jml_penumpang" required onfocus="startCalculate()" onblur="stopCalc()">
                                                    <input type="hidden" class="form-control" id="total" name="total" value="<?php echo $total; ?>">
                                                </div>
                                                <hr class="mb-4">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Checkout Sekarang</button>
                                            </form>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="d-flex justify-content-between align-items-center mb-0">
                                                        <span class="text-muted">Pesanan Anda</span>
                                                 </h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="my-0">Tujuan</h6>
                                                        <small class="text-muted">Yogyakarta - <?= $r['tujuan']; ?></small>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="my-0">Tgl Berangkat</h6>
                                                        <small class="text-muted"><?= indonesian_date_only($r['tgl_berangkat']); ?></small>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="my-0">Jam Berangkat</h6>
                                                        <small class="text-muted"><?= indonesian_hour_only($r['jam']); ?></small>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Total (IDR)</span>
                                                    <strong><span id="bayar"></span></strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
				<?php 
} ?>
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
    <script type="text/javascript">
        function startCalculate(){
        interval=setInterval("Calculate()",10);
        }

        function Calculate(){
        var jml_penumpang=document.invoice.jml_penumpang.value;
        var total=document.invoice.total.value;
        document.getElementById("bayar").innerHTML = jml_penumpang * total;
        }

        function stopCalc(){
        clearInterval(interval);
        }
    </script>
</body>
 
</html>