<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_pelanggan = $_GET['id_pelanggan'];

$query = mysqli_query($kon, "delete from pelanggan where id_pelanggan='$id_pelanggan'") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_pelanggan';
	</script>
	<?php 
}
?>