<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tambah Data Transaksi</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="pages/transaksi/proses_tambah.php" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal Transaksi</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <input type="date" name="tgl_transaksi" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Kode Pesan</label>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="form-select-list">
                                                            <select class="form-control custom-select-value" name="id_pesan" id="id_pesan"  onChange="tampil(this.value)">
                                                            <option value="">- Pesan -</option>
                                                            <?php 
                                                            $kon = new mysqli("localhost", "root", "", "budiman");
                                                            $sql = "SELECT pelanggan.id_pelanggan, pelanggan.nama_pelanggan, pelanggan.jk, pelanggan.no_ktp, pelanggan.alamat, pesan.jml_penumpang, 
                                                                           pesan.id_pesan, pesan.tgl_pesan, kendaraan.id_kendaraan, kendaraan.merek_kendaraan, kendaraan.kelas_kendaraan, kendaraan.harga_kelas, 
                                                                           jadwal_keberangkatan.id_jadwal, jadwal_keberangkatan.tgl_berangkat, jadwal_keberangkatan.jam, jadwal_keberangkatan.tujuan 
                                                                    FROM pesan
                                                                        JOIN pelanggan ON pelanggan.id_pelanggan = pesan.id_pelanggan
                                                                        JOIN kendaraan ON kendaraan.id_kendaraan = pesan.id_kendaraan
                                                                        JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal";
                                                            $hasil = mysqli_query($kon, $sql);
                                                            $jsArray = "var dt_pesan = new Array();\n";
                                                            while ($pesan = mysqli_fetch_assoc($hasil)) {
                                                                echo "<option value=$pesan[id_pesan]>$pesan[id_pesan]</option>";
                                                                $jsArray .= "dt_pesan['" . $pesan['id_pesan'] . "'] = {
                                                                    nama_pelanggan:'" . addslashes($pesan['nama_pelanggan']) . "',
                                                                    jk:'" . addslashes($pesan['jk']) . "',
                                                                    no_ktp:'" . addslashes($pesan['no_ktp']) . "',
                                                                    alamat:'" . addslashes($pesan['alamat']) . "',
                                                                    jml_penumpang:'" . addslashes($pesan['jml_penumpang']) . "',
                                                                    tgl_pesan:'" . addslashes($pesan['tgl_pesan']) . "',
                                                                    merek_kendaraan:'" . addslashes($pesan['merek_kendaraan']) . "',
                                                                    kelas_kendaraan:'" . addslashes($pesan['kelas_kendaraan']) . "',
                                                                    harga_kelas:'" . addslashes($pesan['harga_kelas']) . "',
                                                                    tgl_berangkat:'" . addslashes($pesan['tgl_berangkat']) . "',
                                                                    jam:'" . addslashes($pesan['jam']) . "',
                                                                    tujuan:'" . addslashes($pesan['tujuan']) . "'
                                                                };\n";
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner" id="data-pesan">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-3">

                                                            <label class="login2 pull-left pull-left-pro">Pelanggan</label>
                                                            <input type="text" id="pelanggan" name="pelanggan" class="form-control" readonly />

                                                            <label class="login2 pull-left pull-left-pro">Jenis Kelamin</label>
                                                            <input type="text" id="jk" name="jk" class="form-control" readonly />

                                                            <label class="login2 pull-left pull-left-pro">No KTP</label>
                                                            <input type="text" id="ktpp" name="ktp" class="form-control" maxlength="16" readonly />
                                                            
                                                            <label class="login2 pull-left pull-left-pro">Alamat</label>
                                                            <textarea name="alamat" id="alamatt" class="form-control" readonly></textarea>

                                                    </div>
                                               
                                                    <div class="col-md-3">

                                                        <label class="login2 pull-left pull-left-pro">Jumlah Penumpang</label>
                                                        <input type="text" name="jml_penumpang" id="jml_penumpang" class="form-control" readonly />

                                                        <label class="login2 pull-left pull-left-pro">Tanggal Pesan</label>
                                                        <input type="text" name="tgl_pesan" id="tgl_pesan" class="form-control" readonly />

                                                        <label class="login2 pull-left pull-left-pro">Kendaraan</label>
                                                        <input type="text" id="kendaraan" name="kendaraan" class="form-control" readonly />

                                                        <label class="login2 pull-left pull-left-pro">Kelas</label>
                                                        <input type="text" name="kelas" id="kelas" class="form-control" readonly />

                                                        <label class="login2 pull-left pull-left-pro">Harga Kelas</label>
                                                        <input type="text" name="harga_kelas" id="harga" class="form-control" readonly>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <label class="login2 pull-left pull-left-pro">Jadwal</label>
                                                        <input type="text" id="jadwal" name="jadwal" class="form-control" readonly />

                                                        <label class="login2 pull-left pull-left-pro">Jam Berangkat</label>
                                                        <input type="text" name="jam" id="jam" class="form-control" readonly>

                                                        <label class="login2 pull-left pull-left-pro">Tujuan</label>
                                                        <input type="text" id="tujuan" name="tujuan" class="form-control" readonly />

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
<script type="text/javascript">
<?php echo $jsArray; ?> 
var elem = document.getElementById("id_pesan");
elem.onchange = function(){
    // var hiddenDiv = document.getElementById("data-pesan");
        // if (hiddenDiv.style.display == 'none'){
        //     $("#showPelanggan").slideDown();
            tampil(elem.value);
        // }
        // else{
        //     hiddenDiv.style.display != 'none';
        //     $("#showPelanggan").slideUp();
        // }
};
 
function tampil(id){  
    document.getElementById('pelanggan').value = dt_pesan[id].nama_pelanggan;  
    document.getElementById('jk').value = dt_pesan[id].jk;  
    document.getElementById('ktpp').value = dt_pesan[id].no_ktp;  
    document.getElementById('alamatt').value = dt_pesan[id].alamat;  
    document.getElementById('jml_penumpang').value = dt_pesan[id].jml_penumpang;  
    document.getElementById('tgl_pesan').value = dt_pesan[id].tgl_pesan;  
    document.getElementById('kendaraan').value = dt_pesan[id].merek_kendaraan;  
    document.getElementById('kelas').value = dt_pesan[id].kelas_kendaraan;  
    document.getElementById('harga').value = dt_pesan[id].harga_kelas;  
    document.getElementById('jadwal').value = dt_pesan[id].tgl_berangkat;  
    document.getElementById('jam').value = dt_pesan[id].jam;
    document.getElementById('tujuan').value = dt_pesan[id].tujuan;  
    };  

</script>