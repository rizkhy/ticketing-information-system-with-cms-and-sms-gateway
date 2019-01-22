<?php

if (isset($_POST['kirim'])) {
    $notujuan = $_POST['notujuan'];
    $isipesan = $_POST['isipesan'];

    $userKey = 'blablabla';
    $passKey = '1414';

    function KirimSMS($notujuan, $isipesan, $userKey, $passKey)
    {
        $isi = urldecode($isipesan);
        $hp = str_replace('+62', '0', $notujuan);
        $hp = str_replace(' ', '', $hp);
        $hp = str_replace('.', '', $hp);
        $hp = str_replace(',', '', $hp);
        $ho = trim($hp);
        $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userKey&passkey=$passKey&nohp=$nohptujuan&pesan=$isi";
        $data = file_get_contents($url);
        if (eregi('success', $data)) {
            $hasil = '1';
        } else {
            $hasil = '0';
        }
        return $hasil;

    }
    $kirim = KirimSMS($notujuan, $isipesan, $userKey, $passKey);

    if ($kirim == '1') {
        echo "<script language='javascript'>window.alert('SMS ini berhasil dikirim');
            window.location.href='index.php';
            </script>";
    } else {
        echo "<script language='javascript'>window.alert('SMS Gagal');
            window.location.href='index.php';
            </script>";
    }
}

?>