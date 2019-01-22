<?php 
$kon = new mysqli("localhost", "root", "", "budiman");

$id_sms = $_GET['id_sms'];

$query = mysqli_query($kon, "delete from sms where id_sms='$id_sms'") or die(mysqli_error());

if ($query) {
    ?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='../../index.php?act=data_sms';
	</script>
	<?php 
}
?>