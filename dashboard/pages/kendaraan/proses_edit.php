<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_kendaraan = $_POST['id_kendaraan'];
$nomor = $_POST['nomor'];
$merek = $_POST['merek'];
$kelas = $_POST['kelas'];
$harga = $_POST['harga'];
	
//update data di database sesuai user_id

$sql = "update kendaraan set
		nomor_kendaraan='$nomor',
		merek_kendaraan='$merek',
        kelas_kendaraan='$kelas',
        harga_kelas='$harga'
        where id_kendaraan = '$id_kendaraan'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='../../index.php?act=data_kendaraan';
	 </script>
<?php

}
?>