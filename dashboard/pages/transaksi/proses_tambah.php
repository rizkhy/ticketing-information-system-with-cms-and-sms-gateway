<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$tgl_transaksi = $_POST['tgl_transaksi'];
$id_pesan = $_POST['id_pesan'];


$sql = "insert into transaksi (tgl_transaksi, id_pesan) 
                values
                ('$tgl_transaksi', '$id_pesan')";
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
            window.location='../../index.php?act=data_transaksi';
        </script>
        <?php

    }
    ?>