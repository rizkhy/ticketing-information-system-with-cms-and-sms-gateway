<?php
    session_start();

    unset($_SESSION['no_telp']);
    header('Location: ../masuk/');
     exit();
?> 