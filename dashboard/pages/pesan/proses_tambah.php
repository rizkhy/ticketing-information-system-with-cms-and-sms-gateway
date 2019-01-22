<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$id_pesan = $_POST['id_pesan'];
$id_pelanggan = $_POST['id_pelanggan'];
$jml_penumpang = $_POST['jml_penumpang'];
$tgl_pesan = $_POST['tgl_pesan'];
$id_kendaraan = $_POST['id_kendaraan'];
$jadwal = $_POST['jadwal'];

$sql = "insert into pesan (id_pesan, id_pelanggan, jml_penumpang, tgl_pesan, id_kendaraan, id_jadwal) 
                values
                ('$id_pesan', '$id_pelanggan', '$jml_penumpang', '$tgl_pesan', '$id_kendaraan', '$jadwal')";
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
            window.location='../../index.php?act=data_pesan';
        </script>
        <?php

    }
    ?>