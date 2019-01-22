<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tambah Data Kendaraan</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/kendaraan/proses_tambah.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nomor Kendaraan</label>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" name="nomor" class="form-control" />
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
                                                            <option value="">- Pilih Kendaraan -</option>
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
                                                              <option value="">- Pilih Kelas -</option>
                                                              <option value="First Class">First Class</option>
                                                              <option value="Executive">Executive</option>
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
                                                        <input type="text" name="harga" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
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
