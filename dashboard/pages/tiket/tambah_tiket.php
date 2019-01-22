<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tambah Data Tiket</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/jadwal/proses_tambah.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kode Transaksi</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="id_transaksi">
                                                            <option value="">- Transaksi -</option>
                                                            <?php 
                                                            $kon = new mysqli("localhost", "root", "", "budiman");
                                                            $sql = "SELECT * FROM transaksi";
                                                            $hasil = mysqli_query($kon, $sql);
                                                            while ($transaksi = mysqli_fetch_assoc($hasil)) {
                                                                echo "<option value=$transaksi[id_transaksi]>$transaksi[id_transaksi]</option>";
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            
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