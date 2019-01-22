<script src="assets/js/jquery-1.10.1.min.js"></script>
<script src="assets/js/highcharts.js"></script>
<script>
    var chart; 
    $(document).ready(function() {
            chart = new Highcharts.Chart(
            {
                
                chart: {
                renderTo: 'mygraph',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
                },   
                title: {
                text: 'Statistics'
                },
                tooltip: {
                formatter: function() {
                    return '<b>'+
                    this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                }
                },
                
            
                plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: 'green',
                        formatter: function() 
                        {
                            return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                        }
                    }
                }
                },
    
                series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                <?php
                $con = new mysqli("localhost", "root", "", "budiman");

                $sql = "SELECT COUNT(*) AS tahun, jadwal_keberangkatan.tujuan, transaksi.tgl_transaksi 
                FROM transaksi 
                JOIN pesan ON pesan.id_pesan = transaksi.id_pesan 
                JOIN jadwal_keberangkatan ON pesan.id_jadwal = jadwal_keberangkatan.id_jadwal
                WHERE YEAR(transaksi.tgl_transaksi) = '" . $_POST['tahun'] . "' 
                GROUP BY jadwal_keberangkatan.tujuan";

                $query = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($query)) {
                    $tujuan = $row['tujuan'];

                    // $sqlQuery = "SELECT COUNT(YEAR(transaksi.tgl_transaksi)) as tahun, transaksi.tgl_transaksi, tujuan.nama_tujuan
                    //             FROM transaksi
                    //                 JOIN pesan ON transaksi.id_pesan = pesan.id_pesan
                    //                 JOIN jadwal_keberangkatan ON pesan.id_jadwal = jadwal_keberangkatan.id_jadwal
                    //                 JOIN tujuan ON jadwal_keberangkatan.id_tujuan = tujuan.id_tujuan 
                    //             WHERE tujuan.nama_tujuan='$nama_tujuan'
                    //             GROUP BY YEAR(transaksi.tgl_transaksi)";

                    // $data = mysqli_fetch_array(mysqli_query($con, $sqlQuery));
                    $jumlah = $row['tahun'];
                    ?>
                        [ 
                            '<?php echo $tujuan ?>', <?php echo $jumlah; ?>
                        ],
                        <?php

                    }

                    ?>
            
                ]
            }]
            });
    });	
</script>
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
		<?php
                            require '../halo-pelanggan/function/kon2.php';
                            $query = mysqli_query($kon, "SELECT * FROM pelanggan");
                            $jml = mysqli_num_rows($query);
                            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Pelanggan</h5>
                        <h2><span class="counter"><?php echo $jml; ?></span> Orang</h2>
                        
                    </div>
                </div>
            </div>
            <?php
                            require '../halo-pelanggan/function/kon2.php';
                            $query = mysqli_query($kon, "SELECT * FROM transaksi");
                            $jml1 = mysqli_num_rows($query);
                            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Transaksi</h5>
                        <h2><span class="counter"><?php echo $jml1; ?></span> Transaksi</h2>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Versi Aplikasi</h5>
                        <h2><span class="counter">1.0</span></h2>
                    </div>
                </div>
            </div>
			<?php
                            require '../halo-pelanggan/function/kon2.php';
                            $query = mysqli_query($kon, "SELECT * FROM pesan");
                            $jml2 = mysqli_num_rows($query);
                            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Jumlah Pesanan Bus</h5>
                        <h2><span class="counter"><?php echo $jml2; ?></span> Pesanan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Grafik Berdasarkan Tujuan Pertahun</b></span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <form action="" name="form" method="POST" >
                                        <select class="form-control custom-select-value" name="tahun" onChange="form.submit()">
                                            <option value="" selected>Pilih</option>
                                        <?php 
                                        $kon = new mysqli("localhost", "root", "", "budiman");
                                        $sql = "SELECT YEAR(transaksi.tgl_transaksi) as tahun
                                                FROM transaksi
                                                JOIN pesan ON pesan.id_pesan = transaksi.id_pesan 
                                                JOIN jadwal_keberangkatan ON jadwal_keberangkatan.id_jadwal = pesan.id_jadwal
                                                GROUP BY YEAR(transaksi.tgl_transaksi)";
                                        $hasil = mysqli_query($kon, $sql);
                                        while ($tahun = mysqli_fetch_assoc($hasil)) {

                                            if (($_POST["tahun"] == $tahun["tahun"])) {
                                                echo "<option value=$tahun[tahun] selected>$tahun[tahun]</option>";
                                            } else {
                                                echo "<option value=$tahun[tahun]>$tahun[tahun]</option>";
                                            }

                                            // echo "<option value=$tahun[tahun]>$tahun[tahun]</option>";
                                        }
                                        ?>
                                        </select>
                                        <!-- <input type="submit" name="submit" value="Lihat" class="btn btn-custon-rounded-three btn-primary"> -->
                                    </form>
                                </div>
                                <div id ="mygraph"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>