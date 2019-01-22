<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_jadwal = $_GET['id_jadwal'];

$query = mysqli_query($kon, "delete from jadwal_keberangkatan where id_jadwal='$id_jadwal'") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_jadwal';
	</script>
	<?php 
}
?>