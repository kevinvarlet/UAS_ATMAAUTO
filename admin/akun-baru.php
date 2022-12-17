<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Akun Baru
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" placeholder="Username" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"required>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="input-control">
                                <option value="">Pilih</option>
                                <option value="Admin">Admin</option>
                                <option value="CS">CS</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'index.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit']))
                        {

                            $username_role = $_POST['user'];
                            $pass_role = '123';
                            $nama_role = $_POST['nama'];
                            $level_role = $_POST['level'];

                            $cek = mysqli_query($conn, "SELECT username_role FROM 9400_role WHERE username_role = '".$username_role."' ");
                            if(mysqli_num_rows($cek) > 0) {
                                echo '<div class="alert alert-error">Username sudah digunakan</div>';
                            }

                            else {


                            $simpan = mysqli_query($conn, "INSERT INTO 9400_role VALUES (
                                null,
                                '".$username_role."',
                                '".MD5($pass_role)."',
                                '".$nama_role."',
                                '".$level_role."'
                            )");

                                if($simpan){
                                    echo '<div class="alert-success">Berhasil</div>';
                                } else {
                                    echo 'gagal'.mysqli_error($conn);
                                }
                            }


                         
                        }
                    ?>


                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>