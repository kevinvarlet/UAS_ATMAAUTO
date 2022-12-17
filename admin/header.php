<?php
session_start();
include '../Connect.php';
if(!isset($_SESSION['status_login'])){
    echo "<script>window.location = '../login.php?msg=Login Terlebih Dahulu!'</script>";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css"  href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <title>Panel</title>
    </head>

        <body class="bg-light">
        <div class="navbar">
            <div class="container">
                <h2 class="nav-brand float-left"><a href="index.php">ATMA AUTO</a></h2>
                <ul class="nav-menu float-left">
                    <li><a href="index.php">Dashboard</a></li>

                    <?php if($_SESSION['ulevel'] == 'Admin'){ ?>

                    <li><a href="karyawan.php">Karyawan</a></li>
                    <li><a href="spareparts.php">Sparepart</a></li>
                    <li><a href="service.php">Service</a></li>
                    <li><a href="supplier.php">Supplier</a></li>
                    <li><a href="histori.php">Histori</a></li>
                    <li><a href="pengadaan.php">Pengadaan<i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown">
                    <li><a href="transaksi-pengadaan.php">Transaksi Pengadaan</a></li>
                    <li><a href="verifikasi-pengadaan.php">Verifikasi Pengadaan</a></li>
                    <li><a href="histori-pengadaan.php">Histori Pengadaan</a></li>
                    </ul>
                    </li>


                    <?php }elseif($_SESSION['ulevel'] == 'CS'){ ?>
                    
                    <li><a href="customer.php">Customer</a></li>
                    <li><a href="kendaraan.php">Kendaraan</a></li>
                    <li><a href="penjualan.php">Penjualan</a></li>
                    
                    <?php }elseif($_SESSION['ulevel'] == 'Kasir'){ ?>

                    <li><a href="pembayaran.php">Pembayaran</a></li> 

                    <?php } ?>


                    <li><a href="#"><?= $_SESSION['uname'] ?>(<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
                     <ul class="dropdown">
                    <?php if($_SESSION['ulevel'] == 'Admin'){ ?>
                        <li><a href="akun-baru.php">Buat Akun Baru</a></li>
                        <li><a href="akun-terdaftar.php">Akun Terdaftar</a></li>
                    <?php } ?>
                        <li><a href="ganti-password.php">Ganti Password</a></li>
                        <li><a href="logout.php">Keluar</a></li>
                     </ul>
                    </li>
                </ul>
            <div class="clearfix"></div>

            </div>
        </div>
