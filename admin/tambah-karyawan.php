<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Karyawan
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" class="input-control"required>
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" name="telp" placeholder="Nomor Telepon" class="input-control"required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'karyawan.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_karyawan = ucwords($_POST['nama']);
                            $alamat_karyawan = $_POST['alamat'];
                            $no_telepon_karyawan = $_POST['telp'];

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_karyawan VALUES (
                                null,
                                '".$nama_karyawan."',
                                '".$alamat_karyawan."',
                                '".$no_telepon_karyawan."'
                            )");

                                if($simpan){
                                    echo '<div class="alert-success">Berhasil</div>';
                                } else {
                                    echo 'gagal'.mysqli_error($conn);
                                }


                        } 
                    ?>


                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>