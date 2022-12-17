<?php include 'header.php' ?>

<?php
    $transaksi = mysqli_query($conn, "SELECT * FROM 9400_transaksi_penjualan WHERE id_penjualan = '".$_GET['id_penjualan']."' " );

    if(mysqli_num_rows($transaksi) == 0){
        echo "<script>window.location='pembayaran.php'</script>";
    }

    $k = mysqli_fetch_object($transaksi);
    
?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Transaksi
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama Customer</label>
                            <input type="text" name="nama" placeholder="Nama Customer" class="input-control" value="<?=$k->nama_customer?>" required >
                        </div>

                        <div class="form-group">
                            <label>Nama Sparepart/Jasa</label>
                            <input type="text" name="sparepart" placeholder="Nama Sparepart/Jasa" class="input-control" value="<?= $k -> nama_spareparts?>" required>
                        </div>

                        <div class="form-group">
                            <label>Harga Sparepart/Jasa</label>
                            <input type="number" name="harga" placeholder="Harga Sparepart/Jasa" class="input-control" value="<?= $k -> harga_spareparts?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'pembayaran.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_customer = ucwords($_POST['nama']);
                            $nama_spareparts = $_POST['sparepart'];
                            $harga_spareparts = $_POST['harga'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_transaksi_penjualan SET
                                  nama_customer = '".$nama_customer."',
                                  nama_spareparts = '".$nama_spareparts."',
                                  harga_spareparts = '".$harga_spareparts."'
                                  WHERE id_penjualan = '".$_GET['id_penjualan']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='pembayaran.php?success=Edit Data Berhasil'</script>";
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