<?php include 'header.php' ?>

<?php
    $verifikasispareparts   = mysqli_query($conn, "SELECT * FROM 9400_verifikasi_pengadaan WHERE id_verifikasi_pengadaan = '".$_GET['id_verifikasi_pengadaan']."' " );

    $namaspareparts   = mysqli_query($conn, "SELECT * FROM 9400_verifikasi_pengadaan WHERE nama_verifikasi_pengadaan = '".$_GET['nama_verifikasi_pengadaan']."' " );

    if(mysqli_num_rows($verifikasispareparts) == 0){
        echo "<script>window.location='verifikasi-pengadaan.php'</script>";
    }

    $k          = mysqli_fetch_object($verifikasispareparts);

    date_default_timezone_set("Asia/Bangkok");
    
?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Verifikasi Penambahan Spareparts
                    </div>


                    <div class="box-body">

                     <form action="" method="POST">

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" placeholder="Nama Merk" class="input-control" value="<?=$k->merk_verifikasi_pengadaan?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Spareparts" class="input-control" value="<?=$k->nama_verifikasi_pengadaan?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" name="supplier" placeholder="supplier" class="input-control" value="<?=$k->supplier_verifikasi_pengadaan?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Jumlah Pengadaan</label>
                            <input type="number" name="stok" placeholder="Jumlah Pengadaan" class="input-control" value="<?=$k->jumlah_verifikasi_pengadaan?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pengadaan</label>
                            <input type="date" name="tanggal" value="<?=$k->tanggal_verifikasi_pengadaan?>" class="input-control" required readonly="readonly">
                    </div>
        
                    <input type="submit" name="submit" value="Verifikasi" class="btn btn-green">
                    <button type="button" class="btn btn-red" onclick="window.location = 'verifikasi-pengadaan.php'">Kembali</button>
                    </form>





                    <?php
                        if(isset($_POST['submit'])){
                            $jumlah_verifikasi_pengadaan = $_POST['stok'];

                            

                            $update = mysqli_query($conn, "UPDATE 9400_spareparts INNER JOIN 9400_verifikasi_pengadaan ON nama_spareparts = nama_verifikasi_pengadaan SET
                                  stok_spareparts = (stok_spareparts + '$jumlah_verifikasi_pengadaan')
                             ");

                          

                                if($update){
                                    echo '<div class="alert-success">Berhasil</div>';
                                    /*echo "<script>window.location='transaksi-pengadaan.php?success=Edit Data Berhasil'</script>";*/
                                    if(isset($_GET['id_verifikasi_pengadaan'])){

                                        $deleteverifikasipengadaan = mysqli_query($conn,"DELETE FROM 9400_verifikasi_pengadaan WHERE id_verifikasi_pengadaan = '".$_GET['id_verifikasi_pengadaan']."'");
                                    }
                                } else {
                                    echo 'Gagal'.mysqli_error($conn);
                                }


                        } 
                    ?>

                    <?php
                        if(isset($_POST['submit'])){
                            $merk_histori_pengadaan = ucwords($_POST['merk']);
                            $nama_histori_pengadaan= ucwords($_POST['nama']);
                            $supplier_histori_pengadaan = $_POST['supplier'];
                            $jumlah_histori_pengadaan = $_POST['stok'];
                            $tanggal_histori_pengadaan = $_POST['tanggal'];

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_histori_pengadaan VALUES (
                                null,
                                '".$merk_histori_pengadaan."',
                                '".$nama_histori_pengadaan."',
                                '".$supplier_histori_pengadaan."',
                                '".$jumlah_histori_pengadaan."',
                                '".$tanggal_histori_pengadaan."'
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
        </div>
</div>
<?php include 'footer.php' ?>