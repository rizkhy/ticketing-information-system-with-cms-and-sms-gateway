<?php
include "koneksi.php";
$no_telp = $_POST['no_telp'];
$password = $_POST['password'];

session_start();
$query = "select * from pelanggan where no_telp='$no_telp' and password='$password'";
// echo $query;
// die;
$login = mysqli_query($kon, $query);
if (mysqli_num_rows($login) > 0) {
    $ambil = mysqli_fetch_array($login);
    $_SESSION['id_pelanggan'] = $ambil['id_pelanggan'];
    $_SESSION['no_telp'] = $ambil['no_telp'];
    $_SESSION['nama_pelanggan'] = $ambil['nama_pelanggan'];
    $_SESSION['no_ktp'] = $ambil['no_ktp'];
    $_SESSION['alamat'] = $ambil['alamat'];
    $_SESSION['usia'] = $ambil['usia'];
    $_SESSION['jk'] = $ambil['jk'];
    header("location:../halo-pelanggan/");
} else {
    echo "<script>alert('Username atau Password salah')</script>";
    echo "<meta http-equiv='refresh' content='0 url=./'>";
}

?>