<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Service
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaser" placeholder="Nama Service" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="hargaser" placeholder="Nomor Service" class="input-control"required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'service.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_service = ucwords($_POST['namaser']);
                            $harga_service = $_POST['hargaser'];

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_service VALUES (
                                null,
                                '".$nama_service."',
                                '".$harga_service."'
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