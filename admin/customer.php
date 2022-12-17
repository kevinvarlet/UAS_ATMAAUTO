<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Customer
                    </div>
                    <div class="box-body">

                    <button type="button" class="btn" onclick="window.location = 'tambah-customer.php'"><i class="fa fa-plus"></i> Tambah Customer</button>

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Nama Customer">
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
                                    $where .= " AND nama_customer LIKE '%".$_GET['key']."%' ";
                                }


                                 $customer = mysqli_query($conn,"SELECT * FROM 9400_customer $where ORDER BY id_customer DESC");
                                 if(mysqli_num_rows($customer) > 0) {
                                    while($k = mysqli_fetch_array($customer)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama_customer'] ?></td>
                                <td><?= $k['alamat_customer'] ?></td>
                                <td><?= $k['no_telepon_customer'] ?></td>
                                <td>
                                <a href="edit-customer.php?id_customer=<?= $k['id_customer']?>" title="Edit Data" ><i class="fa fa-edit"></i></a> |
                                <a href="hapus.php?id_customer=<?= $k['id_customer']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
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