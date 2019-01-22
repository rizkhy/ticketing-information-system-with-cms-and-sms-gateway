<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$usia = $_POST['usia'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$pass = $_POST['password'];
	
//update data di database sesuai user_id

$sql = "update pelanggan set
		nama_pelanggan='$nama',
		alamat='$alamat',
        jk='$jk',
        usia='$usia',
		no_ktp='$ktp',
		no_telp='$telp',
		password='$pass'
        where id_pelanggan = '$id_pelanggan'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='../../index.php?act=data_pelanggan';
	 </script>
<?php

}
?>