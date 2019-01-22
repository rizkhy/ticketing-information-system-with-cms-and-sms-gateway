<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Menjadi Pelanggan P.O Budiman</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/budimansn.png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/busbudiman.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="isi.php">
                        <h2>Daftar Menjadi Pelanggan P.O Budiman</h2>
                        <div class="form-group">
                            <label for="name">Nama Lengkap :</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" required/>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat :</label>
                            <input type="text" name="alamat" id="alamat" required/>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Jenis Kelamin :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="jk" id="male" value="Pria" checked>
                                <label for="male">Pria</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="jk" id="female" value="Wanita">
                                <label for="female">Wanita</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Usia (cukup masukkan angka usia Anda):</label>
                            <input type="text" name="usia" id="usia">
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                            <label for="pincode">No KTP :</label>
                            <input type="text" name="no_ktp" id="no_ktp">
                        </div>
                        <div class="form-group">
                            <label for="pincode">No Telepon :</label>
                            <input type="text" name="no_telp" id="no_telp">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="pincode">kata Sandi :</label>
                            <input type="password" name="password" id="password">
                        </div>
                        
                        
                        <div class="form-submit">
                            <input type="submit" value="Ulang Semua" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Daftar" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>