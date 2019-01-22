<?php
include "config.php";
$query = mysqli_query($connection, "select * from jadwal_keberangkatan");
?>

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Data Jadwal</h1> 
                            <a href="?act=tambah_jadwal" type="button" class="btn btn-custon-rounded-three btn-success"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Tambah Data  </a>
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
                                        <th data-field="tgl">Tanggal</th>
                                        <th data-field="jam">Jam</th>
                                        <th data-field="tujuan">Tujuan</th>
										<th data-field="harga">Harga</th>
                                        <th data-field="aksi">Aksi</th>
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
                                        <td><font face="trebuchet MS"><?php echo $data["tgl_berangkat"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["jam"]; ?></font></td>
                                        <td><font face="trebuchet MS"><?php echo $data["tujuan"]; ?></font></td>
										<td><font face="trebuchet MS"><?php echo $data["harga"]; ?></font></td>
                                        <td>
                                        <a href="?act=edit_jadwal&id_jadwal=<?php echo $data['id_jadwal']; ?>" ><i class="fa fa-edit edu-checked-pro" aria-hidden="true" style="color: blue; font-size: 15px"> Edit </i></a> |
                                        <a href="pages/jadwal/hapus_jadwal.php?id_jadwal=<?php echo $data['id_jadwal']; ?>" onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');"  ><i class="fa fa-trash edu-checked-pro" aria-hidden="true" style="color: red; font-size: 15px"> Delete </i></a>
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