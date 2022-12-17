<?php include 'header.php' ?>

<?php
    $kendaraan   = mysqli_query($conn, "SELECT * FROM 9400_kendaraan WHERE id_kendaraan = '".$_GET['id_kendaraan']."' " );

    if(mysqli_num_rows($kendaraan) == 0){
        echo "<script>window.location='kendaraan.php'</script>";
    }

    $k          = mysqli_fetch_object($kendaraan);
    
?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Kendaraan
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nomor Polisi</label>
                            <input type="text" name="nopolisi" placeholder="Nomor Polisi Lengkap Kendaraan" class="input-control" value="<?=$k->no_polisi_kendaraan?>" required>
                        </div>

                        <div class="form-group">
                            <label>Tipe Kendaraan</label>
                            <input type="text" name="tipe" placeholder="Tipe Kendaraan" class="input-control" value="<?=$k->tipe_kendaraan?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'kendaraan.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $no_polisi_kendaraan = strtoupper($_POST['nopolisi']);
                            $tipe_kendaraan = ucwords($_POST['tipe']);

                            

                            $update = mysqli_query($conn, "UPDATE 9400_kendaraan SET
                                  no_polisi_kendaraan = '".$no_polisi_kendaraan."',
                                  tipe_kendaraan = '".$tipe_kendaraan."'
                                  WHERE id_kendaraan = '".$_GET['id_kendaraan']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='kendaraan.php?success=Edit Data Berhasil'</script>";
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