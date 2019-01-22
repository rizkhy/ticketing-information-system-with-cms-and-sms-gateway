<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$nomor = $_POST['nomor'];
$merek = $_POST['merek'];
$kelas = $_POST['kelas'];
$harga = $_POST['harga'];


$sql = "insert into kendaraan (nomor_kendaraan, merek_kendaraan, kelas_kendaraan, harga_kelas) 
                values
                ('$nomor', '$merek', '$kelas', '$harga')";
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
            window.location='../../index.php?act=data_kendaraan';
        </script>
        <?php

    }
    ?>