<?php
session_start();
//cek apakah user sudah login
if (!isset($_SESSION['no_telp'])) {
    die("Anda belum login!");//jika belum login jangan lanjut
    header("../../masuk/");
}
include "../function/config.php";
$id_transaksi = $_GET['id_transaksi'];
$id_pesan = $_GET['id_pesan'];
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-body">
        <form action="../../dashboard/img/update-transaksi.php" class="foto" method="POST" enctype="multipart/form-data">
            <p>
                Pembayaran dilakukan secara transfer ke rekening P.O Budiman:<br/><br/>
                Rekening BNI: <b>0354783821</b><br/>
                Atas Nama: <b>P.O Budiman</b>
                <br/>
                <br/>
                <i><small>Batas waktu pengiriman paling lambat 3 hari setelah pemesanan.<br/>
                Jika melebihi waktu tersebut, pelanggan dinyatakan batal dalam memesan.</small></i>
            </p>
            <br/>
            
                <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
                <input type="hidden" class="form-control" name="id_pesan" value="<?php echo $id_pesan; ?>">
                <input type="file" class="form-control" id="foto" name="foto" required=""><br/>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-rounded btn-secondary" data-dismiss="modal">Tutup</a>
            <button type="submit" class="btn btn-rounded btn-success" id="submit">Upload Bukti</button>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    $("button#submit").click(function(){
    $.ajax({
        type: "POST",
        url: "../../dashboard/img/update-transaksi.php", //process to mail
        data: $('form.foto').serialize()
    });
});
    
    });
    </script>