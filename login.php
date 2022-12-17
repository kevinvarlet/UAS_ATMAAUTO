<?php
session_start();
include 'Connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css"  href="style.css">
        <title>Halaman Login</title>
    </head>
        <body>
         <div class="page-login">
            <div class="box box-login">

               <div class="box-header text-center">
                  Login
               </div>

               <div class="box-body">

               <?php
               if(isset($_GET['msg'])){
                echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
               }
               ?>


                  <form action="" method="POST">

                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class="input-control">
                     </div>

                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" placeholder="Password" class="input-control">
                     </div>

                     <input type="submit" name="submit" value="Login" class="btn">

                  </form>

                  <?php
                    if(isset($_POST['submit'])){
                        
                        $user = mysqli_real_escape_string($conn, $_POST['user']);
                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                        $cek = mysqli_query($conn, "SELECT * FROM 9400_role WHERE username_role = '".$user."' ");
                        if (mysqli_num_rows($cek) > 0){

                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->pass_role){

                                $_SESSION['status_login'] = true;
                                $_SESSION['uid'] = $d->id_role;
                                $_SESSION['uname'] = $d->nama_role;
                                $_SESSION['ulevel'] = $d->level_role;

                                echo"<script>window.location = 'admin/index.php'</script>";


                            }else{
                                echo '<div class="alert alert-error">Password Salah</div>';
                            }

                        }else{
                            echo '<div class="alert alert-error">Username / Password salah</div>';
                        }

                    }
                  ?>



               </div>

               <div class="box-footer text-center">
               <a href="pengguna.php">Halaman Pengguna</a>
               </div>

            </div>
         </div>
        </body>
</html>      
  