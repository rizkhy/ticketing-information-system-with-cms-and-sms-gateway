<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_jadwal = $_GET['id_jadwal'];

$query = mysqli_query($kon, "select * from jadwal_keberangkatan where jadwal_keberangkatan.id_jadwal='$id_jadwal'") or die(mysqli_error());

$data = mysqli_fetch_array($query);

?>

<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tambah Data Jadwal</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/jadwal/proses_edit.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal Keberangkatan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <input type="date" name="tgl_berangkat" class="form-control" value="<?php echo $data['tgl_berangkat']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Jam Keberangkatan</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <input type="time" name="jam" class="form-control" value="<?php $time = date("H:i", strtotime($data['jam']));
                                                                                                                    echo $time; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tujuan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="tujuan">
                                                              <option value="<?php echo $data['tujuan']; ?>"><?php echo $data['tujuan']; ?></option>
                                                              <option value="Tasikmalaya">Tasikmalaya</option>
                                                              <option value="Jakarta">Jakarta</option>
                                                              <option value="Bogor">Bogor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											                      <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Harga</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $data['id_jadwal']; ?>" />

                                                            <input class="btn btn-white" onclick="window.history.back()" type="reset" />
                                                            <input class="btn btn-sm btn-primary login-submit-cs" type="submit" value="Simpan" name="simpan"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
