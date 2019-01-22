<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_pesan = $_GET['id_pesan'];

$query = mysqli_query($kon, "delete from pesan where id_pesan='$id_pesan'") or die(mysqli_error($kon));

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_pesan';
	</script>
	<?php 
}
?>