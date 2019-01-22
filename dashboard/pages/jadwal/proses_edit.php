<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_jadwal = $_POST['id_jadwal'];
$tanggal = $_POST['tgl_berangkat'];
$jam = $_POST['jam'];
$tujuan = $_POST['tujuan'];
$harga = $_POST['harga'];
	
//update data di database sesuai user_id

$sql = "update jadwal_keberangkatan set
		tgl_berangkat='$tanggal',
		jam='$jam',
        tujuan='$tujuan',
		harga='$harga'
        where id_jadwal = '$id_jadwal'";


$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='../../index.php?act=data_jadwal';
	 </script>
<?php

}
?>