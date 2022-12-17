<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Pengadaan Spareparts
                    </div>
                    <div class="box-body">

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Nama Spareparts">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_spareparts LIKE '%".$_GET['key']."%' ";
                                }


                                 $spareparts = mysqli_query($conn,"SELECT * FROM 9400_spareparts $where ORDER BY id_spareparts DESC");
                                 if(mysqli_num_rows($spareparts) > 0) {
                                    while($k = mysqli_fetch_array($spareparts)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['merk_spareparts'] ?></td>
                                <td><?= $k['nama_spareparts'] ?></td>
                                <td><?= $k['lokasi_spareparts'] ?></td>
                                <td><?= $k['harga_spareparts'] ?></td>
                                <td><?= $k['stok_spareparts'] ?></td>
                                <td>
                                <a href="tambah-pengadaan.php?id_spareparts=<?= $k['id_spareparts']?>" title="Tambah Stok"><i class="fa fa-shopping-cart"></i></a>
                                </td>
                                </tr>
                                <?php }} else { ?>
                                    <tr>
                                        <td colspan ="6">Data Kosong</td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            
                        </table>
                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>