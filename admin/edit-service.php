<?php include 'header.php' ?>

<?php
    $service   = mysqli_query($conn, "SELECT * FROM 9400_service WHERE id_service = '".$_GET['id_service']."' " );

    if(mysqli_num_rows($service) == 0){
        echo "<script>window.location='service.php'</script>";
    }

    $k          = mysqli_fetch_object($service);
    
?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Service
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaser" placeholder="Nama Service" class="input-control" value="<?=$k->nama_service?>" required>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="hargaser" placeholder="Nomor Service" class="input-control" value="<?=$k->harga_service?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'service.php'">Kembali</button>
                    </form>

                   

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_service = ucwords($_POST['namaser']);
                            $harga_service = $_POST['hargaser'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_service SET
                                  nama_service = '".$nama_service."',
                                  harga_service = '".$harga_service."'
                                  WHERE id_service = '".$_GET['id_service']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='service.php?success=Edit Data Berhasil'</script>";
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