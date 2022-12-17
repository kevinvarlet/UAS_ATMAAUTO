<?php include 'header.php' ?>

<?php
    $supplier   = mysqli_query($conn, "SELECT * FROM 9400_supplier WHERE id_supplier = '".$_GET['id_supplier']."' " );

    if(mysqli_num_rows($supplier) == 0){
        echo "<script>window.location='supplier.php'</script>";
    }

    $k          = mysqli_fetch_object($supplier);
    
?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Supplier
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?=$k->nama_supplier?>" required >
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" class="input-control" value="<?= $k -> alamat_supplier?>" required>
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" name="telp" placeholder="Nomor Telepon" class="input-control" value="<?= $k -> no_telp_supplier?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'supplier.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_supplier = ucwords($_POST['nama']);
                            $alamat_supplier = $_POST['alamat'];
                            $no_telepon_supplier = $_POST['telp'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_supplier SET
                                  nama_supplier = '".$nama_supplier."',
                                  alamat_supplier = '".$alamat_supplier."',
                                  no_telepon_supplier = '".$no_telepon_supplier."'
                                  WHERE id_supplier = '".$_GET['id_supplier']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='supplier.php?success=Edit Data Berhasil'</script>";
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