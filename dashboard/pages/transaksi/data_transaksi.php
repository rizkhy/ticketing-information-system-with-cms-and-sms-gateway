<?php
include "config.php";
$query = mysqli_query($connection, "SELECT pelanggan.nama_pelanggan, pesan.jml_penumpang, transaksi.tgl_transaksi, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, jadwal_keberangkatan.tujuan, transaksi.foto
FROM transaksi
JOIN pesan ON pesan.id_pesan = transaksi.id_pesan
JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal order by id_transaksi desc");
?>

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Data Transaksi</h1> 
                            <a href="?act=tambah_transaksi" type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Tambah Data  </a>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" 
                                              data-pagination="true" 
                                              data-search="true" 
                                              data-show-columns="true" 
                                              data-show-pagination-switch="true" 
                                              data-show-refresh="true" 
                                              data-key-events="true" 
                                              data-show-toggle="true" 
                                              data-resizable="true" 
                                              data-cookie="true"
                                              data-cookie-id-table="saveId" 
                                              data-show-export="true" 
                                              data-click-to-select="true" 
                                              data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <!-- <th data-field="state"></th> -->
                                        <th data-field="no">NO</th>
                                        <th data-field="nama_pelanggan">Nama Pelanggan</th>
                                        <th data-field="tgl_transaksi">Tanggal Transaksi</th>
                                        <th data-field="merek_kendaraan">Merek Kendaraan</th>
                                        <th data-field="tgl_berangkat">Tanggal Berangkat</th>
                                        <th data-field="nama_tujuan">Tujuan</th>
                                        <th data-field="foto">Foto Bukti Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (mysqli_num_rows($query) > 0) { ?>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td><?php echo $no ?></td>
                                        <td><font face="trebuchet MS"><?php echo $data["nama_pelanggan"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["tgl_transaksi"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["merek_kendaraan"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["tgl_berangkat"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["tujuan"]; ?></font></td>
                                        <td>
                                        <?php    
                                        if ($data["foto"] == null) {
                                            echo "<button type='button' class='btn btn-custon-rounded-three btn-warning'>Belum Upload Bukti Bayar</button>";
                                        }else{
                                            echo "<a href='img/foto_upload_transaksi/$data[foto]' class='MagicZoom' rel='zoom-id:zoom;opacity-reverese:true;'><img src='img/foto_upload_transaksi/$data[foto]' style='width: 32px; height: 32px;' />";
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                    
                                            <?php 
                                            $no++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->
<style>
    thead, th {text-align: center;}
</style>