<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Ganti Password
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" name="pass2" placeholder="Ulangi Password" class="input-control" required>
                        </div>

                    <input type="submit" name="submit" value="Ubah Password" class="btn btn-green">

                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $pass1 = addslashes($_POST['pass1']);
                            $pass2 = addslashes($_POST['pass2']);

                            if($pass2 != $pass1){
                                echo '<div class="alert alert-error">Pasword tidak sama</div>';
                            }else{

                                $update = mysqli_query($conn, "UPDATE 9400_role SET
                                  pass_role = '".MD5($pass1)."'
                                  WHERE id_role = '".$_SESSION['uid']."'
                             ");

                          

                                if($update){
                                    echo '<div class="alert alert-success">Ubah Password Berhasil</div>';
                                } else {
                                    echo 'Gagal'.mysqli_error($conn);
                                }

                            }


                        } 
                    ?>


                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>