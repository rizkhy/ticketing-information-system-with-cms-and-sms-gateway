<?php
include 'kon.php';
// menyimpan data kedalam variabel
$jenis_order  		= $_POST['jenis_order'];
$nama_order         = $_POST['nama_order'];
$nama_pelanggan   	= $_POST['nama_pelanggan'];
$no_hp  			= $_POST['no_hp'];
$id_admin  			= $_POST['id_admin'];
// query SQL untuk insert data
$query="INSERT INTO pesanan SET jenis_order='$jenis_order',nama_order='$nama_order',nama_pelanggan='$nama_pelanggan',no_hp='$no_hp',id_admin='$id_admin'";
mysqli_query($kon, $query);
// mengalihkan ke halaman index.php
?>

<?php header("location:../order/");