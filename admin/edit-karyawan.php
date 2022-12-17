<?php include 'header.php' ?>

<?php
    $karyawan   = mysqli_query($conn, "SELECT * FROM 9400_karyawan WHERE id_karyawan = '".$_GET['id_karyawan']."' " );

    if(mysqli_num_rows($karyawan) == 0){
        echo "<script>window.location='karyawan.php'</script>";
    }

    $k          = mysqli_fetch_object($karyawan);
    
?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Karyawan
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?=$k->nama_karyawan?>" required >
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" class="input-control" value="<?= $k -> alamat_karyawan?>" required>
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" name="telp" placeholder="Nomor Telepon" class="input-control" value="<?= $k -> no_telp_karyawan?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'karyawan.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_karyawan = ucwords($_POST['nama']);
                            $alamat_karyawan = $_POST['alamat'];
                            $no_telepon_karyawan = $_POST['telp'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_karyawan SET
                                  nama_karyawan = '".$nama_karyawan."',
                                  alamat_karyawan = '".$alamat_karyawan."',
                                  no_telepon_karyawan = '".$no_telepon_karyawan."'
                                  WHERE id_karyawan = '".$_GET['id_karyawan']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='karyawan.php?success=Edit Data Berhasil'</script>";
                                } else {
                                    echo 'Gagal'.mysqli_error($conn);
                                }


                        } 
                    ?>


                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>