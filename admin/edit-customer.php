<?php include 'header.php' ?>

<?php
    $customer   = mysqli_query($conn, "SELECT * FROM 9400_customer WHERE id_customer = '".$_GET['id_customer']."' " );

    if(mysqli_num_rows($customer) == 0){
        echo "<script>window.location='customer.php'</script>";
    }

    $k          = mysqli_fetch_object($customer);
    
?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Edit Customer
                    </div>
                    <div class="box-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?=$k->nama_customer?>" required >
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" class="input-control" value="<?= $k -> alamat_customer?>" required>
                        </div>

                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" name="telp" placeholder="Nomor Telepon" class="input-control" value="<?= $k -> no_telp_customer?>" required>
                        </div>

                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'customer.php'">Kembali</button>
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            $nama_customer = ucwords($_POST['nama']);
                            $alamat_customer = $_POST['alamat'];
                            $no_telepon_customer = $_POST['telp'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_customer SET
                                  nama_customer = '".$nama_customer."',
                                  alamat_customer = '".$alamat_customer."',
                                  no_telepon_customer = '".$no_telepon_customer."'
                                  WHERE id_customer = '".$_GET['id_customer']."'
                             ");

                          

                                if($update){
                                    echo "<script>window.location='customer.php?success=Edit Data Berhasil'</script>";
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