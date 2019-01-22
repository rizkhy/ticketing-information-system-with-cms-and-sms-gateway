<?php
require '../function/kon.php';
$pelanggan = $_SESSION['id_pelanggan'];
$id_jadwal = $_GET['id_jadwal'];
$id_kendaraan = $_GET['id_kendaraan'];
$query = mysqli_query($kon, "select id_jadwal, tgl_berangkat, jam, tujuan, harga, id_kendaraan, nomor_kendaraan, merek_kendaraan, kelas_kendaraan, harga_kelas, SUM(harga+harga_kelas) as total from jadwal_keberangkatan,kendaraan where id_jadwal='$id_jadwal' and id_kendaraan='$id_kendaraan'") or die("Gagal query");
while ($r = mysqli_fetch_assoc($query)) { ?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="mb-0">Tujuan: <?= $r['tujuan']; ?></h4>
                                        
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                        Tanggal Berangkat: <?= indonesian_date_only($r['tgl_berangkat']); ?><br/>
                                        Jam Berangkat: <?= indonesian_hour_only($r['jam']); ?><br/>
                                        Merek Kendaraan: <?= $r['merek_kendaraan']; ?><br/>
                                        Nomor Kendaraan: <?= $r['nomor_kendaraan']; ?><br/>
                                        Kelas: <?= $r['kelas_kendaraan']; ?>
                                        </p>
                                        <button class="btn btn-primary">
                                            <?= rupiah($r['total']); ?>
                                        </button> 
                                        <a href="../cart/index.php?id_jadwal=<?= $r['id_jadwal']; ?>
                                                &&id_kendaraan=<?= $r['id_kendaraan']; ?>
                                                &&tujuan=<?= $r['tujuan']; ?>
                                                &&id_pelanggan=<?= $pelanggan; ?>
                                                &&total=<?= $r['total']; ?>" 
                                        class="btn btn-success">Pesan</a>
                                    </div>
                                </div>
</div>
<?php 
} ?>