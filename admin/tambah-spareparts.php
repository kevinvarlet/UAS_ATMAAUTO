<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Spareparts
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" placeholder="Nama Merk" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Spareparts" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" placeholder="Lokasi Spareparts" class="input-control"required>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" placeholder="Harga Spareparts" class="input-control"required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'spareparts.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $merk_spareparts = ucwords($_POST['merk']);
                            $nama_spareparts = ucwords($_POST['nama']);
                            $lokasi_spareparts = $_POST['lokasi'];
                            $harga_spareparts = $_POST['harga'];
                            $stok_spareparts = "0" ;

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_spareparts VALUES (
                                null,
                                '".$merk_spareparts."',
                                '".$nama_spareparts."',
                                '".$lokasi_spareparts."',
                                '".$harga_spareparts."',
                                '".$stok_spareparts."'
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