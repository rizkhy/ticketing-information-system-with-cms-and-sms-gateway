<br/><br/>
<br/><br/>
<br/><br/>
<br/><br/>
<br/><br/>
<br/>
<center>
<?php
$id_transaksi = $_POST['id_transaksi'];
$id_pesan = $_POST['id_pesan'];

$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];

$maxsize = 9900000000000;
$typeYgBoleh = array("image/jpeg", "image/png", "image/pjpeg");

$dirFoto = "foto_upload_transaksi";
if (!is_dir($dirFoto))
	mkdir($dirFoto);
$fileTujuanFoto = $dirFoto . "/" . $foto;

$dirThumb = "thumb_foto_upload_transaksi";
if (!is_dir($dirThumb))
	mkdir($dirThumb);
$fileTujuanThumb = $dirThumb . "/t_" . $foto;

$dataValid = "YA";

if ($size > 0) {
	if ($size > $maxsize) {
		echo "Ukuran File Terlalu besar! <br/>";
		$dataValid = "TIDAK";
	}
	if (!in_array($type, $typeYgBoleh)) {
		echo "Maaf, Kami tidak mengenal file tersebut! <br/>";
		$dataValid = "TIDAK";
	}
}

if (strlen(trim($id_transaksi)) == 0) {
	echo "Nama Barang Harus Diisi! <br />";
	$dataValid = "TIDAK";
}
if (strlen(trim($id_pesan)) == 0) {
	echo "Harga harus Diisi! <br />";
	$dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
	echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
	echo "<input type='button' value='Kembali'
		onClick='self.history.back()'>";
	exit;
}
include "../../halo-pelanggan/function/koneksi2.php";

$sql = "insert into transaksi (id_transaksi, id_pesan, foto) values ('$id_transaksi','$id_pesan','$foto') ";
$hasil = mysqli_query($kon, $sql);
$sql2 = "insert into tiket (id_transaksi) values ('$id_transaksi') ";
// echo $sql2;
// die;
$hasil2 = mysqli_query($kon, $sql2);

if (!$hasil && !$hasil2) {
	echo "Gagal Simpan, silakan diulangi! </br>";
	echo mysqli_error($kon);
	echo "<br /> <input type='button' value='Kembali' onClick='self.history.back()'>";
	exit;
} else {
	echo "Simpan data berhasil";
}

if ($size > 0) {
	if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal Upload Gambar! <br/>";
		echo "<a href='../../halo-pelanggan/invoice/'>Kembali Upload Bukti Pembayaran Anda.</a>";
		exit;
	} else {
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
	}
}
echo "<br/>File Sudah Diupload! <br/>";

function buat_thumbnail($file_src, $file_dst)
{
	list($w_src, $h_src, $type) = getImageSize($file_src);

	switch ($type) {
		case 1: // gif -> jpg
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2: // jpeg -> jpg
			$img_src = imagecreatefromjpeg($file_src);
			break;
		case 3: // png -> jpg
			$img_src = imagecreatefrompng($file_src);
			break;
	}

	$thumb = 100;
	if ($w_src > $h_src) {
		$w_dst = $thumb;
		$h_dst = round($thumb / $w_src * $h_src);
	} else {
		$w_dst = round($thumb / $w_src * $h_src);
		$h_dst = $thumb;
	}

	$img_dst = imagecreatetruecolor($w_dst, $h_dst);

	imagecopyresampled(
		$img_dst,
		$img_src,
		0,
		0,
		0,
		0,
		$w_dst,
		$h_dst,
		$w_src,
		$h_src
	);
	imagejpeg($img_dst, $file_dst);
	imagedestroy($img_src);
	imagedestroy($img_dst);
}
?>

<?php header("location:../../halo-pelanggan/my-transaction-list/"); ?>
</center>
