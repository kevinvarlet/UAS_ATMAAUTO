<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Service
                    </div>
                    <div class="box-body">

                    <button type="button" class="btn" onclick="window.location = 'tambah-service.php'"><i class="fa fa-plus"></i> Tambah Service</button>

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Service">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_service LIKE '%".$_GET['key']."%' ";
                                }


                                 $service = mysqli_query($conn,"SELECT * FROM 9400_service $where ORDER BY id_service DESC");
                                 if(mysqli_num_rows($service) > 0) {
                                    while($k = mysqli_fetch_array($service)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama_service'] ?></td>
                                <td><?= $k['harga_service'] ?></td>
                                <td>
                                <a href="edit-service.php?id_service=<?= $k['id_service']?>" title="Edit Data" ><i class="fa fa-edit"></i></a> |
                                <a href="hapus.php?id_service=<?= $k['id_service']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
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