<?php
$kon = new mysqli("localhost", "root", "", "budiman");

//tangkap data dari form
$id_pesan = $_POST['id_pesan'];
$id_pelanggan = $_POST['id_pelanggan'];
$jml_penumpang = $_POST['jml_penumpang'];
$tgl_pesan = $_POST['tgl_pesan'];
$id_kendaraan = $_POST['id_kendaraan'];
$jadwal = $_POST['jadwal'];
	
//update data di database sesuai user_id

$sql = "update pesan set
		id_pelanggan='$id_pelanggan',
		jml_penumpang='$jml_penumpang',
        tgl_pesan='$tgl_pesan',
        id_kendaraan='$id_kendaraan',
		id_jadwal='$jadwal'
        where id_pesan = '$id_pesan'";

// echo $sql;
$hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='../../index.php?act=data_pesan';
	 </script>
<?php

}
?>