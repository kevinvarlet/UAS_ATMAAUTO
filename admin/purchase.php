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
                        Transaksi Lanjut
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama Customer</label>
                            <input type="text" name="nama" placeholder="Nama Customer" class="input-control" value="<?=$k->nama_customer?>" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Nama Sparepart</label>
                            <input type="text" name="sparepart" placeholder="Nama Sparepart/Jasa" class="input-control" value="<?= $k -> nama_spareparts?>" readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Harga Sparepart</label>
                            <input type="number" name="harga" placeholder="Harga Sparepart/Jasa" class="input-control" value="<?= $k -> harga_spareparts?>" readonly="readonly">
                        </div>
                    </form>

                    
                    </div>
                </div>
        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-body">

                        <div class="form-group">
                            <label>Total Harga</label>
                            <input type="number" name="harga2" placeholder="Harga Sparepart/Jasa" class="input-control" value="<?= $k -> harga_spareparts?>" readonly="readonly">
                            <label>Diskon</label>
                            <input type="number" name="harga" placeholder="Diskon" class="input-control">

                        </div>

                    <button type="submit"  class="btn btn-green" onclick="window.location = 'nota-pembayaran.php'">Konfirmasi</button>
                    <button type="button" class="btn btn-red" onclick="window.location = 'pembayaran.php'">Kembali</button>
                    </form>

                    <?php
                                  if(isset($_POST['submit'])){
                                    $diskon = $_POST['harga'];
        
        
                                    
        
                                    $update = mysqli_query($conn, "UPDATE 9400_transaksi_penjualan SET
                                          harga_spareparts = (harga_spareparts - '$diskon')
        
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
    
            </div>

        </div>

<?php include 'footer.php' ?>