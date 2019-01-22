<?php
include 'kon.php';
// menyimpan data kedalam variabel
$nama_pelanggan  	= $_POST['nama_pelanggan'];
$alamat             = $_POST['alamat'];
$jk   	            = $_POST['jk'];
$usia   	        = $_POST['usia'];
$no_ktp  			= $_POST['no_ktp'];
$no_telp  			= $_POST['no_telp'];
$password  			= $_POST['password'];
// query SQL untuk insert data
$query="INSERT INTO pelanggan SET nama_pelanggan='$nama_pelanggan',alamat='$alamat',jk='$jk',usia='$usia',no_ktp='$no_ktp',no_telp='$no_telp',password='$password'";
mysqli_query($kon, $query);
// mengalihkan ke halaman index.php
?>

<?php header("location:../masuk/");