<?php

if (isset($_POST['simpan'])) {
    $notelp = $_POST['no_telp'];
    $isi_sms = $_POST['isi_sms'];

    $userKey = 'xj8ute';
    $passKey = 'pobudiman';

    function KirimSMS($notelp, $isi_sms, $userKey, $passKey)
    {
        $isi = urldecode($isi_sms);
        $isi = str_replace(' ', '%20', $isi_sms);
        $hp = str_replace('+62', '0', $notelp);
        $hp = str_replace(' ', '', $hp);
        $hp = str_replace('.', '', $hp);
        $hp = str_replace(',', '', $hp);
        $ho = trim($hp);
        $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userKey&passkey=$passKey&nohp=$notelp&pesan=$isi";
        $data = file_get_contents($url);
        // echo $data;
        // die;
        if (!preg_match('~^\\.([0-9_])\\?$~', $data)) {
            $hasil = '1';
        } else {
            $hasil = '0';
        }
        return $hasil;
        // echo $hasil;
        // die;

    }
    $kirim = KirimSMS($notelp, $isi_sms, $userKey, $passKey);
}

$koneksi = new mysqli("localhost", "root", "", "budiman");

$id_transaksi = $_POST['id_transaksi'];
$tgl_sms = date("Y-m-d H:i:s");
$isi_sms = $_POST['isi_sms'];


$sql = "insert into sms (id_transaksi, tgl_sms, isi_sms) 
                values
                ('$id_transaksi', '$tgl_sms', '$isi_sms')";
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
            window.location='../../index.php?act=data_sms';
        </script>
        <?php

    }
    ?>