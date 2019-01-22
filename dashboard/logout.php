<?php
session_start();

unset($_SESSION['username']);
?>
        <script language="JavaScript">
            alert('Anda Berhasil Logout');
            window.location='pages/loginadmin/';
        </script>
<?php
exit();
?> 