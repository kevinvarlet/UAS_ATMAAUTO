<?php include 'header.php' ?>

<?php
    $spareparts   = mysqli_query($conn, "SELECT * FROM 9400_spareparts WHERE id_spareparts = '".$_GET['id_spareparts']."' " );

    if(mysqli_num_rows($spareparts) == 0){
        echo "<script>window.location='spareparts.php'</script>";
    }

    $k          = mysqli_fetch_object($spareparts);

    $supplier = "SELECT * FROM `9400_supplier`";
    $result = mysqli_query($conn, $supplier);

    date_default_timezone_set("Asia/Bangkok");
    
?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Selected Spareparts
                    </div>


                    <div class="box-body">

                     <form action="" method="POST">

                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" name="merk" placeholder="Nama Merk" class="input-control" value="<?=$k->merk_spareparts?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Spareparts" class="input-control" value="<?=$k->nama_spareparts?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" placeholder="Lokasi Spareparts" class="input-control" value="<?=$k->lokasi_spareparts?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" placeholder="Harga Spareparts" class="input-control" value="<?=$k->harga_spareparts?>" required readonly="readonly">
                        </div>
</div>
</div>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Penambahan Stok Spareparts
                    </div>


                    <div class="box-body">

                    <div class="form-group">

                    <div class="form-group">
                            <label>Tanggal saat ini</label>
                            <input type="date" name="tanggal" value="<?php echo date("Y-m-d");?>" class="input-control" required readonly="readonly">
                    </div>

                    <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier" class="input-control">
                                <?php while ($row1 = mysqli_fetch_array($result)):;?>
                                <option><?php echo $row1[1];?></option>
                                <?php endwhile;?>
                               
                            </select>
                        </div>

                        
                            <label>Stok saat ini </label>
                            <input type="number" name="saatini" placeholder="Harga Spareparts" class="input-control" value="<?=$k->stok_spareparts?>" required readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label>Jumlah Pengadaan</label>
                            <input type="number" name="stok" placeholder="Jumlah Pengadaan Spareparts" class="input-control" required>
                        </div>

                    <a href="verifikasi-pengadaan.php"><input type="submit" name="submit" value="Simpan" class="btn btn-green"></a>
                    <button type="button" class="btn btn-red" onclick="window.location = 'transaksi-pengadaan.php'">Kembali</button>
                    </form>





                

                    <?php
                        if(isset($_POST['submit'])){
                            $merk_verifikasi_pengadaan = ucwords($_POST['merk']);
                            $nama_verifikasi_pengadaan= ucwords($_POST['nama']);
                            $supplier_verifikasi_pengadaan = $_POST['supplier'];
                            $jumlah_verifikasi_pengadaan = $_POST['stok'];
                            $tanggal_verifikasi_pengadaan = $_POST['tanggal'];

                            $simpan = mysqli_query($conn, "INSERT INTO 9400_verifikasi_pengadaan VALUES (
                                null,
                                '".$merk_verifikasi_pengadaan."',
                                '".$nama_verifikasi_pengadaan."',
                                '".$supplier_verifikasi_pengadaan."',
                                '".$jumlah_verifikasi_pengadaan."',
                                '".$tanggal_verifikasi_pengadaan."'
                            )");

                                if($simpan){
                                    echo "<script>window.location='verifikasi-pengadaan.php?success=Edit Data Berhasil'</script>";
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