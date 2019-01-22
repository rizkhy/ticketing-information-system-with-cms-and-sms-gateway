<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_tiket = $_GET['id_tiket'];

$query = mysqli_query($kon, "delete from tiket where id_tiket='$id_tiket'") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_tiket';
	</script>
	<?php 
}
?>