<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_pelanggan = $_GET['id_pelanggan'];

$query = mysqli_query($kon, "select * from pelanggan where id_pelanggan='$id_pelanggan'") or die(mysqli_error());

$data = mysqli_fetch_array($query);

$jk = $data['jk'];
?>

<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit Data Pelanggan</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/pelanggan/proses_edit.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_pelanggan']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Alamat</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="i-checks pull-left">
                                                            <label>
                                                                <input type="radio" value="Pria" name="jk" <?php if ($jk == 'Pria') {
                                                                                                                echo 'checked';
                                                                                                            } ?> /> <i></i> Pria </label>
                                                        </div>
                                                        <br/><br/>
                                                        <div class="i-checks pull-left">
                                                            <label>
                                                                <input type="radio" value="Wanita" name="jk" <?php if ($jk == 'Wanita') {
                                                                                                                echo 'checked';
                                                                                                            } ?> /> <i></i> Wanita </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Usia</label>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                        <input type="text" name="usia" class="form-control" maxlength="2" value="<?php echo $data['usia']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">No KTP</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="ktp" class="form-control" maxlength="16" value="<?php echo $data['no_ktp']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">No Telepon</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="telp" class="form-control" maxlength="16" value="<?php echo $data['no_telp']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Password</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            
                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <input type="hidden" name="id_pelanggan" class="form-control" value="<?php echo $data['id_pelanggan']; ?>" />
                                                            
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