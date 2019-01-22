<?php
    require_once("konektion.php");
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
             
        if ($act == "add") {
            if (isset($_GET['id_jadwal'], $_GET['id_kendaraan'], $_SESSION['id_pelanggan'])) {
                $jml_penumpang = $_GET['jml_penumpang'];
                if (isset($_SESSION['id_pelanggan'][$jml_penumpang])) {
                    $_SESSION['id_pelanggan'][$jml_penumpang] += 1;
                } else {
                    $_SESSION['id_pelanggan'][$jml_penumpang] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['jml_penumpang'])) {
                $jml_penumpang = $_GET['jml_penumpang'];
                if (isset($_SESSION['jumlah'][$jml_penumpang])) {
                    $_SESSION['jumlah'][$jml_penumpang] += 1;
                }
            }
        } 
         
        header ("location:tampil-cart.php");
    }   
     
?>