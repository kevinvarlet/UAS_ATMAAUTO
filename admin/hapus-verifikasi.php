<?php
    include'../Connect.php';


    if(isset($_GET['id_verifikasi_pengadaan'])){

        $deleteverifikasipengadaan = mysqli_query($conn,"DELETE FROM 9400_verifikasi_pengadaan WHERE id_verifikasi_pengadaan = '".$_GET['id_verifikasi_pengadaan']."'");

        echo "<script> window.location='verifikasi-pengadaan.php'</script>";
    }



?>