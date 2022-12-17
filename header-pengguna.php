<?php
session_start();
include 'Connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <title>Panel</title>
    </head>

        <body class="bg-light">
        <div class="navbar">
            <div class="container">
                <h2 class="nav-brand float-left"><a href="pengguna.php">ATMA AUTO</a></h2>
                <ul class="nav-menu float-left">
                    <li><a href="pengguna.php">Dashboard</a></li>
                    <li><a href="show-sparepart.php">Sparepart</a></li>
                    <li><a href="show-jasaservice.php">Service</a></li>


                    <li><a href="#">Akun<i class="fa fa-caret-down"></i></a>
                     <ul class="dropdown">
                        <li><a href="login.php">Login</a></li>
                     </ul>
                    </li>
                </ul>
            <div class="clearfix"></div>

            </div>
        </div>
