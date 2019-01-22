<?php
$kon = new mysqli("localhost", "root", "", "budiman");

$id_pesan = $_GET['id_pesan'];

$query = mysqli_query($kon, "select * from pesan where id_pesan='$id_pesan'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit Data Pesan</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/pesan/proses_edit.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Pelanggan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="id_pelanggan" id="id_pelanggan"  onChange="tampil(this.value)" >
                                                            <option value="">- Pelanggan -</option>
                                                            <?php 
                                                            $kon = new mysqli("localhost", "root", "", "budiman");
                                                            $sql = "SELECT * FROM pelanggan";
                                                            $hasil = mysqli_query($kon, $sql);
                                                            $jsArray = "var dt_pelanggan = new Array();\n";
                                                            while ($pelanggan = mysqli_fetch_assoc($hasil)) {

                                                                if ($data["id_pelanggan"] == $pelanggan["id_pelanggan"]) {
                                                                    echo "<option value=$pelanggan[id_pelanggan] selected>$pelanggan[nama_pelanggan]</option>";
                                                                } else {
                                                                    echo "<option value=$pelanggan[id_pelanggan]>$pelanggan[nama_pelanggan]</option>";
                                                                }

                                                                $jsArray .= "dt_pelanggan['" . $pelanggan['id_pelanggan'] . "'] = {jk:'" . addslashes($pelanggan['jk']) . "',ktp:'" . addslashes($pelanggan['no_ktp']) . "',alamat:'" . addslashes($pelanggan['alamat']) . "'};\n";

                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="showPelanggan" style="display: none;">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Jenis Kelamin</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="jk" name="jk" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">No KTP</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="ktpp" name="ktp" class="form-control" maxlength="16" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Alamat</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <textarea name="alamat" id="alamatt" class="form-control" readonly></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Jumlah Penumpang</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" name="jml_penumpang" class="form-control" value="<?php echo $data['jml_penumpang']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal Pesan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <input type="date" name="tgl_pesan" class="form-control" value="<?php echo date('Y-m-d', strtotime($data["tgl_pesan"])) ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kendaraan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="id_kendaraan" id="id_kendaraan" onChange="tampilKendaraan(this.value)">
                                                            <option value="">- Kendaraan -</option>
                                                            <?php 
                                                            $kon = new mysqli("localhost", "root", "", "budiman");
                                                            $sql = "SELECT * FROM kendaraan";
                                                            $hasil = mysqli_query($kon, $sql);
                                                            $jsKendaraan = "var dt_kendaraan = new Array();\n";
                                                            while ($kendaraan = mysqli_fetch_assoc($hasil)) {

                                                                if ($data["id_kendaraan"] == $kendaraan["id_kendaraan"]) {
                                                                    echo "<option value=$kendaraan[id_kendaraan] selected>$kendaraan[merek_kendaraan]</option>";
                                                                } else {
                                                                    echo "<option value=$kendaraan[id_kendaraan]>$kendaraan[merek_kendaraan]</option>";
                                                                }

                                                                $jsKendaraan .= "dt_kendaraan['" . $kendaraan['id_kendaraan'] . "'] = {kelas:'" . addslashes($kendaraan['kelas_kendaraan']) . "',harga:'" . addslashes($kendaraan['harga_kelas']) . "'};\n";

                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="showKendaraan" style="display: none;">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" name="kelas" id="kelas" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Harga Kelas</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" name="harga_kelas" id="harga" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Jadwal</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="jadwal" id="id_jadwal" onChange="tampilJadwal(this.value)">
                                                            <option value="">- Pilih Jadwal -</option>
                                                            <?php 
                                                            $kon = new mysqli("localhost", "root", "", "budiman");
                                                            $sql = "SELECT * FROM jadwal_keberangkatan";
                                                            $hasil = mysqli_query($kon, $sql);
                                                            $jsJadwal = "var dt_jadwal = new Array();\n";
                                                            while ($jadwal = mysqli_fetch_assoc($hasil)) {

                                                                if ($data["id_jadwal"] == $jadwal["id_jadwal"]) {
                                                                    echo "<option value=$jadwal[id_jadwal] selected>$jadwal[tgl_berangkat]</option>";
                                                                } else {
                                                                    echo "<option value=$jadwal[id_jadwal]>$jadwal[tgl_berangkat]</option>";
                                                                }

                                                                $jsJadwal .= "dt_jadwal['" . $jadwal['id_jadwal'] . "'] = {jam:'" . addslashes($jadwal['jam']) . "', tujuan:'" . addslashes($jadwal['tujuan']) . "'};\n";

                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="showJadwal" style="display: none;">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Jam Berangkat</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" name="jam" id="jam" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Tujuan</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" name="tujuan" id="tujuan" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                            
                                                        </div>
                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                            <input type="hidden" name="id_pesan" class="form-control" value="<?php echo $data['id_pesan']; ?>" />

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
<script type="text/javascript">
<?php echo $jsArray, $jsJadwal, $jsKendaraan; ?> 

var elem = document.getElementById("id_pelanggan");
elem.onchange = function(){
    var hiddenDiv = document.getElementById("showPelanggan");
        if (hiddenDiv.style.display == 'none'){
            $("#showPelanggan").slideDown();
            tampil(elem.value);
        }
        else{
            hiddenDiv.style.display != 'none';
            $("#showPelanggan").slideUp();
        }
};
 
function tampil(id){  
    document.getElementById('jk').value = dt_pelanggan[id].jk;  
    document.getElementById('ktpp').value = dt_pelanggan[id].ktp;  
    document.getElementById('alamatt').value = dt_pelanggan[id].alamat;  
    };  
    

var e = document.getElementById("id_kendaraan");
e.onchange = function(){
    var hiddenDiv = document.getElementById("showKendaraan");
        if (hiddenDiv.style.display == 'none'){
            $("#showKendaraan").slideDown();
            tampilKendaraan(e.value);
        }
        else{
            hiddenDiv.style.display != 'none';
            $("#showKendaraan").slideUp();
        }
};
 
function tampilKendaraan(id){  
    document.getElementById('harga').value = dt_kendaraan[id].harga;  
    document.getElementById('kelas').value = dt_kendaraan[id].kelas;   
    };  


var v = document.getElementById("id_jadwal");
v.onchange = function(){
    var hiddenDiv = document.getElementById("showJadwal");
        if (hiddenDiv.style.display == 'none'){
            $("#showJadwal").slideDown();
            tampilJadwal(v.value);
        }
        else{
            hiddenDiv.style.display != 'none';
            $("#showJadwal").slideUp();
        }
};
 
function tampilJadwal(id){  
    document.getElementById('jam').value = dt_jadwal[id].jam;   
    document.getElementById('tujuan').value = dt_jadwal[id].tujuan;  
    };  
</script>