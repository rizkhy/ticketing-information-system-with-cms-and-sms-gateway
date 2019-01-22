<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['no_telp'])) {
    die("Anda belum login!");//jika belum login jangan lanjut
    header("../../masuk/");
}

?>



<?php 
include '../function/indo_date.php';
include '../function/indo_date2.php';
include '../function/indo_date3.php';
include '../function/rupiah.php';
?>

<?php
include "../function/config.php";
$query = mysqli_query($connection, "SELECT transaksi.id_transaksi, transaksi.id_pesan, transaksi.foto, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, jadwal_keberangkatan.tujuan
FROM transaksi
JOIN pesan ON pesan.id_pesan = transaksi.id_pesan
JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal
where pesan.id_pelanggan='$_SESSION[id_pelanggan]' order by id_transaksi desc");

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
      <?php include '../function/nav-transaction.php' ?>
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
                            <h2 class="pageheader-title">Berikut Daftar Transaksi Anda,  <?php echo $_SESSION['nama_pelanggan'] ?>.</h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar Transaksi</a></li>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Data Transaksi Anda</h5>
                                <p>Berikut adalah daftar transaksi Anda di P.O Bus Budiman</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Merek Kendaraan</th>
                                                <th>Tanggal Berangkat</th>
                                                <th>Jumlah Penumpang</th>
												<th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($query) > 0) { ?>
										<?php
            $no = 1;

            while ($data = mysqli_fetch_array($query)) {

                ?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo $data["id_transaksi"]; ?></td>
											<td><?php echo indonesian_date($data["tgl_transaksi"]); ?></td>
											<td><?php echo $data["merek_kendaraan"]; ?></td>
											<td><?php echo indonesian_date_only($data["tgl_berangkat"]); ?></td>
											<td><?php echo $data["jml_penumpang"]; ?> Orang</td>
											<td>
											<?php
            if ($data["foto"] == null) {
                ?>
                <a href="modal.php?id_transaksi=<?php echo $data["id_transaksi"]; ?>&&id_pesan=<?php echo $data["id_pesan"]; ?>" id="upload" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal" onclick="tampilkan()">Upload bukti bayar</a>
                <form onsubmit="return false" id="form" method="get">
                <input type="hidden" class="form-control" id="transaksi" name="id_transaksi" value="<?php echo $data["id_transaksi"]; ?>">
                <input type="hidden" class="form-control" id="pesan" name="id_pesan" value="<?php echo $data["id_pesan"]; ?>">
                
                </form>
            <?php

        } else {
            echo "<a href='#' data-toggle='modal' data-target='#selesaiModal'><span class='badge badge-brand'><i class='fa fa-check'></i> Selesai</span></a>";
            include 'modal_selesai.php';
        }
        ?>
											</td>
										</tr>
                                        <?php $no++;


                                    } ?>
										<?php 
        } else {
            echo "Anda belum melakukan transaksi apapun.";
        } ?>
                                        </tbody>
                                    </table>
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModal"  role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><span class="badge badge-primary"><i class="fas fa-bus"></i> Upload Bukti Pembayaran</span></h5>
                                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="../../dashboard/img/update-transaksi.php" id="formUpload" class="foto" method="POST" enctype="multipart/form-data">
                                                            <p>
                                                                Pembayaran dilakukan secara transfer ke rekening P.O Budiman:<br/><br/>
                                                                Rekening BNI: <b>0354783821</b><br/>
                                                                Atas Nama: <b>P.O Budiman</b>
                                                                <br/>
                                                                <br/>
                                                                <i><small>Batas waktu pengiriman paling lambat 3 hari setelah pemesanan.<br/>
                                                                Jika melebihi waktu tersebut, pelanggan dinyatakan batal dalam memesan.</small></i>
                                                            </p>
                                                            <br/>
                                                            
                                                                <input type="hidden" class="form-control" id="upTransaksi" name="id_transaksi" >
                                                                <input type="hidden" class="form-control" id="upPesan" name="id_pesan" >
                                                                <input type="file" class="form-control" id="foto" name="foto" required=""><br/>
                                                        
                                                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                                                            <button type="submit" class="btn btn-rounded btn-success" id="submit">Upload Bukti</button>
                                                        
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>  
                                        </div>

                                        
                                </div>
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
    <script type="text/javascript">
    
        function tampilkan(){
            
        var pesan=document.getElementById("pesan").value;
        var transaksi=document.getElementById("transaksi").value;
        
            $('#exampleModal').on('show.bs.modal', function() {
        document.getElementById("upTransaksi").value = transaksi;
        document.getElementById("upPesan").value = pesan;
        
            })
        }
    </script>
</body>
 
</html>