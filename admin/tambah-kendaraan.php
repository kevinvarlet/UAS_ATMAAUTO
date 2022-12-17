<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Kendaraan
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nomor Polisi</label>
                            <input type="text" name="nopolisi" placeholder="Nomor Polisi Lengkap Kendaraan" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tipe Kendaraan</label>
                            <input type="text" name="tipe" placeholder="Tipe Kendaraan" class="input-control"required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'kendaraan.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $no_polisi_kendaraan = strtoupper($_POST['nopolisi']);
                            $tipe_kendaraan = ucwords($_POST['tipe']);

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_kendaraan VALUES (
                                null,
                                '".$no_polisi_kendaraan."',
                                '".$tipe_kendaraan."'
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