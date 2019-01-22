<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$id_pesan = $_POST['id_pesan'];
$id_pelanggan = $_POST['id_pelanggan'];
$jml_penumpang = $_POST['jml_penumpang'];
$id_kendaraan = $_POST['id_kendaraan'];
$id_jadwal = $_POST['id_jadwal'];


$sql = "INSERT INTO pesan (id_pesan, id_pelanggan, jml_penumpang, id_kendaraan, id_jadwal) 
                VALUES
                ('$id_pesan', '$id_pelanggan', '$jml_penumpang', '$id_kendaraan', '$id_jadwal')";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    echo "Gagal Simpan, silahkan diulangi!<br />";
    echo mysqli_error($koneksi);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
} else {
    header("location:../invoice/");

}
?>