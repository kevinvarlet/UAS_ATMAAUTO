<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Kendaraan
                    </div>
                    <div class="box-body">

                    <button type="button" class="btn" onclick="window.location = 'tambah-kendaraan.php'"><i class="fa fa-plus"></i> Tambah Kendaraan</button>

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Nomor Polisi Kendaraan">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Polisi</th>
                                    <th>Tipe Kendaraan</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND no_polisi_kendaraan LIKE '%".$_GET['key']."%' ";
                                }


                                 $kendaraan = mysqli_query($conn,"SELECT * FROM 9400_kendaraan $where ORDER BY id_kendaraan DESC");
                                 if(mysqli_num_rows($kendaraan) > 0) {
                                    while($k = mysqli_fetch_array($kendaraan)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['no_polisi_kendaraan'] ?></td>
                                <td><?= $k['tipe_kendaraan'] ?></td>
                                <td>
                                <a href="edit-kendaraan.php?id_kendaraan=<?= $k['id_kendaraan']?>" title="Edit Data" ><i class="fa fa-edit"></i></a> |
                                <a href="hapus.php?id_kendaraan=<?= $k['id_kendaraan']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
                                </td>
                                </tr>
                                <?php }} else { ?>
                                    <tr>
                                        <td colspan ="5">Data Kosong</td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            
                        </table>
                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>