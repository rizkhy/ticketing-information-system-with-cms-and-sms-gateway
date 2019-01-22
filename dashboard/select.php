<?php
if (empty($_GET['act'])) {
    include "beranda.php";
} else {
    switch ($_GET['act']) {
        
        //pelanggan
        case ('data_pelanggan'):
            include('pages/pelanggan/data_pelanggan.php');
            break;
        case ('tambah_pelanggan'):
            include('pages/pelanggan/tambah_pelanggan.php');
            break;
        case ('edit_pelanggan'):
            include('pages/pelanggan/edit_pelanggan.php');
            break;

            //kendaraan
        case ('data_kendaraan'):
            include('pages/kendaraan/data_kendaraan.php');
            break;
        case ('tambah_kendaraan'):
            include('pages/kendaraan/tambah_kendaraan.php');
            break;
        case ('edit_kendaraan'):
            include('pages/kendaraan/edit_kendaraan.php');
            break;

            //tiket
        case ('data_tiket'):
            include('pages/tiket/data_tiket.php');
            break;
        case ('tambah_tiket'):
            include('pages/tiket/tambah_tiket.php');
            break;
        case ('edit_tiket'):
            include('pages/tiket/edit_tiket.php');
            break;

            //jadwal
        case ('data_jadwal'):
            include('pages/jadwal/data_jadwal.php');
            break;
        case ('tambah_jadwal'):
            include('pages/jadwal/tambah_jadwal.php');
            break;
        case ('edit_jadwal'):
            include('pages/jadwal/edit_jadwal.php');
            break;

            //pesan
        case ('data_pesan'):
            include('pages/pesan/data_pesan.php');
            break;
        case ('tambah_pesan'):
            include('pages/pesan/tambah_pesan.php');
            break;
        case ('edit_pesan'):
            include('pages/pesan/edit_pesan.php');
            break;

            //sms
        case ('data_sms'):
            include('pages/sms/data_sms.php');
            break;

            //transaksi
        case ('data_transaksi'):
            include('pages/transaksi/data_transaksi.php');
            break;
        case ('tambah_transaksi'):
            include('pages/transaksi/tambah_transaksi.php');
            break;
        case ('edit_transaksi'):
            include('pages/transaksi/edit_transaksi.php');
            break;

        default:
            include('beranda.php');
    }
}
?>
