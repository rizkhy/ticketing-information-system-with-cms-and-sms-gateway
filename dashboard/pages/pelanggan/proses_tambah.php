<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$usia = $_POST['usia'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$pass = $_POST['password'];


$sql = "insert into pelanggan (nama_pelanggan, alamat, jk, usia, no_ktp, no_telp, password) 
                values
                ('$nama', '$alamat', '$jk', '$usia', '$ktp', '$telp', '$pass')";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    echo "Gagal Simpan, silahkan diulangi!<br />";
    echo mysqli_error($koneksi);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
} else {
    ?>
        <script language="JavaScript">
            alert('Anda Berhasil Menambah Data');
            window.location='../../index.php?act=data_pelanggan';
        </script>
        <?php

    }
    ?>