<?php
    include'../Connect.php';

    if(isset($_GET['id_karyawan'])){

        $deletekaryawan = mysqli_query($conn,"DELETE FROM 9400_karyawan WHERE id_karyawan = '".$_GET['id_karyawan']."'");

        echo "<script> window.location='karyawan.php'</script>";
    }

    if(isset($_GET['id_kendaraan'])){

        $deletekendaraan = mysqli_query($conn,"DELETE FROM 9400_kendaraan WHERE id_kendaraan = '".$_GET['id_kendaraan']."'");

        echo "<script> window.location='kendaraan.php'</script>";
    }

    if(isset($_GET['id_spareparts'])){

        $deletespareparts = mysqli_query($conn,"DELETE FROM 9400_spareparts WHERE id_spareparts = '".$_GET['id_spareparts']."'");

        echo "<script> window.location='spareparts.php'</script>";
    }

    if(isset($_GET['id_service'])){

        $deleteservice = mysqli_query($conn,"DELETE FROM 9400_service WHERE id_service = '".$_GET['id_service']."'");

        echo "<script> window.location='service.php'</script>";
    }

    if(isset($_GET['id_customer'])){

        $deletecustomer = mysqli_query($conn,"DELETE FROM 9400_customer WHERE id_customer = '".$_GET['id_customer']."'");

        echo "<script> window.location='customer.php'</script>";
    }

    if(isset($_GET['id_supplier'])){

        $deletesupplier = mysqli_query($conn,"DELETE FROM 9400_supplier WHERE id_supplier = '".$_GET['id_supplier']."'");

        echo "<script> window.location='supplier.php'</script>";
    }

    if(isset($_GET['id_role'])){

        $deleterole = mysqli_query($conn,"DELETE FROM 9400_role WHERE id_role = '".$_GET['id_role']."'");

        echo "<script> window.location='akun-terdaftar.php'</script>";
    }

    if(isset($_GET['id_penjualan'])){

        $deletesupplier = mysqli_query($conn,"DELETE FROM 9400_transaksi_penjualan WHERE id_penjualan = '".$_GET['id_penjualan']."'");

        echo "<script> window.location='pembayaran.php'</script>";
    }

    if(isset($_GET['id_verifikasi_pengadaan'])){

        $deleteverifikasipengadaan = mysqli_query($conn,"DELETE FROM 9400_verifikasi_pengadaan WHERE id_verifikasi_pengadaan = '".$_GET['id_verifikasi_pengadaan']."'");

        echo "<script> window.location='verifikasi-pengadaan.php'</script>";
    }



?>