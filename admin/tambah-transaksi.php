<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Tambah Transaksi
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Customer" class="input-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Sparepart</label>
                            <input type="text" name="nama_spareparts" placeholder="Nama Sparepart" class="input-control"required>
                        </div>

                        <div class="form-group">
                            <label>Harga Sparepart</label>
                            <input type="number" name="harga_spareparts" placeholder="Harga Sparepart" class="input-control"required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'pembayaran.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_customer = ucwords($_POST['nama']);
                            $nama_spareparts = $_POST['nama_spareparts'];
                            $harga_spareparts = $_POST['harga_spareparts'];

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_transaksi_penjualan (nama_customer, nama_spareparts, harga_spareparts) VALUES (
                                
                                '".$nama_customer."',
                                '".$nama_spareparts."',
                                '".$harga_spareparts."'

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