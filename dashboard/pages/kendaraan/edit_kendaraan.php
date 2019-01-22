<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($kon, "select * from kendaraan where id_kendaraan='$id_kendaraan'") or die(mysqli_error());

$data = mysqli_fetch_array($query);

?>
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit Data Kendaraan</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/kendaraan/proses_edit.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nomor Kendaraan</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" name="nomor" class="form-control"  value="<?php echo $data['nomor_kendaraan']; ?>"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Merek Kendaraan</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="merek">
                                                              <option value="<?php echo $data['merek_kendaraan']; ?>"><?php echo $data['merek_kendaraan']; ?></option>
                                                              <option value="Scania">Scania</option>
                                                              <option value="Hino">Hino</option>
                                                              <option value="Mercedes">Mercedes</option>
                                                              <option value="Volvo">Volvo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kelas Kendaraan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="kelas">
                                                              <option value="<?php echo $data['kelas_kendaraan']; ?>"><?php echo $data['kelas_kendaraan']; ?></option>
                                                              <option value="Best In Class">Best In Class</option>
                                                              <option value="Super Executive">Super Executive</option>
                                                              <option value="First Class">First Class</option>
                                                              <option value="Executive">Executive</option>
                                                              <option value="Bussiness Class">Bussiness Class</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Harga Kelas</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" name="harga" class="form-control" value="<?php echo $data['harga_kelas']; ?>"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <input type="hidden" name="id_kendaraan" class="form-control" value="<?php echo $data['id_kendaraan']; ?>"  />

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
