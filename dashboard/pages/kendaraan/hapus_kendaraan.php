<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($kon, "delete from kendaraan where id_kendaraan='$id_kendaraan'") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_kendaraan';
	</script>
	<?php 
}
?>