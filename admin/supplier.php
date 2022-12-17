<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Supplier
                    </div>
                    <div class="box-body">

                    <button type="button" class="btn" onclick="window.location = 'tambah-supplier.php'"><i class="fa fa-plus"></i> Tambah Supplier</button>

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Nama Supplier">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telp</th>
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_supplier LIKE '%".$_GET['key']."%' ";
                                }


                                 $supplier = mysqli_query($conn,"SELECT * FROM 9400_supplier $where ORDER BY id_supplier DESC");
                                 if(mysqli_num_rows($supplier) > 0) {
                                    while($k = mysqli_fetch_array($supplier)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama_supplier'] ?></td>
                                <td><?= $k['alamat_supplier'] ?></td>
                                <td><?= $k['no_telepon_supplier'] ?></td>
                                <td>
                                <a href="edit-supplier.php?id_supplier=<?= $k['id_supplier']?>" title="Edit Data" ><i class="fa fa-edit"></i></a> |
                                <a href="hapus.php?id_supplier=<?= $k['id_supplier']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
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