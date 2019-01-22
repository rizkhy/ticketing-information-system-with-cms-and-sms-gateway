<?php
include "../../config.php";

$id_tiket = $_GET['id_tiket'];

$query = mysqli_query(
    $connection,
    "SELECT tiket.id_tiket, tiket.id_transaksi, pelanggan.nama_pelanggan, pelanggan.no_telp, pelanggan.alamat, pelanggan.jk, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, jadwal_keberangkatan.tujuan
FROM tiket
    JOIN transaksi ON transaksi.id_transaksi = tiket.id_transaksi
    JOIN pesan ON pesan.id_pesan = transaksi.id_pesan
    JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
    JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
    JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal
WHERE tiket.id_tiket='$id_tiket'"
);
$data = mysqli_fetch_array($query);
?>

<div class="modal-close-area modal-close-df">
    <a class="close" href="?act=data_tiket"><i class="fa fa-close"></i></a>
</div>
<div class="modal-body">
    <h2>KIRIM SMS</h2>
    <div class="all-form-element-inner">
        <form action="pages/tiket/proses_tambah.php" method="post">
            <input type="hidden" name="id_transaksi" class="form-control" value="<?php echo $data["id_transaksi"]; ?>" readonly />
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Nama Pelanggan</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden" name="no_telp" class="form-control" value="<?php echo $data["no_telp"]; ?>" readonly />
                        <input type="text" name="nama" class="form-control" value="<?php echo $data["nama_pelanggan"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Alamat</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <textarea name="alamat" class="form-control" readonly><?php echo $data["alamat"]; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="jk" class="form-control" value="<?php echo $data["jk"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Tanggal Transaksi</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="tgl_transaksi" class="form-control" value="<?php echo $data["tgl_transaksi"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Jumlah Penumpang</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="jml_penumpang" class="form-control" value="<?php echo $data["jml_penumpang"]; ?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Kendaraan</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="kendaraan" class="form-control" value="<?php echo $data["merek_kendaraan"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Tanggal Berangkat</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="tgl_berangkat" class="form-control" value="<?php echo $data["tgl_berangkat"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Tujuan</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="tujuan" class="form-control" value="<?php echo $data["tujuan"]; ?>" readonly />
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Isi SMS</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <textarea name="isi_sms" class="form-control" rows="8" style="height: 150px;" placeholder="Masukan Isi SMS"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            
                    </div>
                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                        <input data-dismiss="modal" class="btn btn-white" type="reset" value="Batal" />
                        <input class="btn btn-sm btn-primary login-submit-cs" type="submit" value="Simpan" name="simpan"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>