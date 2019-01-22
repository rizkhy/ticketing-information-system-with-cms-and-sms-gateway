<?php

$koneksi = new mysqli("localhost", "root", "", "budiman");

$id_transaksi = $_POST['id_transaksi'];
$id_pesan = $_POST['id_pesan'];


$sql = "insert into transaksi (id_transaksi, id_pesan, foto) 
                values
                ('$id_transaksi', '$id_pesan', '')";
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
            alert('Baik. Anda bisa mengunggah bukti pembayaran Anda nanti.');
            window.location='../my-transaction-list/index.php';
        </script>
        <?php

    }
    ?>