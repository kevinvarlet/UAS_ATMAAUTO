<?php include 'header.php' ?>

<?php
    $spareparts   = mysqli_query($conn, "SELECT * FROM 9400_spareparts WHERE id_spareparts = '".$_GET['id_spareparts']."' " );

    if(mysqli_num_rows($spareparts) == 0){
        echo "<script>window.location='spareparts.php'</script>";
    }

    $k          = mysqli_fetch_object($spareparts);
    
?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Spareparts
                    </div>
                    <div class="box-body">


                    <form action="" method="POST">

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" placeholder="Nama Merk" class="input-control" value="<?=$k->merk_spareparts?>" required>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Spareparts" class="input-control" value="<?=$k->nama_spareparts?>" required>
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" placeholder="Lokasi Spareparts" class="input-control" value="<?=$k->lokasi_spareparts?>" required>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" placeholder="Harga Spareparts" class="input-control" value="<?=$k->harga_spareparts?>" required>
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

                            

                            $update = mysqli_query($conn, "UPDATE 9400_spareparts SET
                                  merk_spareparts = '".$merk_spareparts."',
                                  nama_spareparts = '".$nama_spareparts."',
                                  lokasi_spareparts = '".$lokasi_spareparts."',
                                  harga_spareparts = '".$harga_spareparts."'
                                  WHERE id_spareparts = '".$_GET['id_spareparts']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='spareparts.php?success=Edit Data Berhasil'</script>";
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