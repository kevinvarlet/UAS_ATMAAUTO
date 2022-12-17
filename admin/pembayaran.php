<?php include 'header.php' ?>


<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Pembayaran
            </div>
            <div class="box-body">

            <button type="button" class="btn" onclick="window.location = 'tambah-transaksi.php'"><i class="fa fa-plus"></i> Tambah Transaksi</button>

            <form action="">
                <div class="input-group">
                    <input type="text" name="key" placeholder="Cari Transaksi">
                    <button type="submit">Cari</button>
                </div>
            </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Nama Sparepart/Jasa</th>
                            <th>Harga Sparepart/Jasa</th>
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


                         $penjualan = mysqli_query($conn,"SELECT * FROM 9400_transaksi_penjualan $where ORDER BY id_penjualan DESC");
                         if(mysqli_num_rows($penjualan) > 0) {
                            while($k = mysqli_fetch_array($penjualan)){
                        ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k['nama_customer'] ?></td>
                        <td><?= $k['nama_spareparts'] ?></td>
                        <td><?= $k['harga_spareparts'] ?></td>
                        <td>
                        <a href="edit-transaksi.php?id_penjualan=<?= $k['id_penjualan']?>" title="Edit Data" onclick="return confirm('Edit Transaksi?')"><i class="fa fa-edit"></i></a> |
                        <a href="hapus.php?id_penjualan=<?= $k['id_penjualan']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus Transaksi?')"><i class="fa fa-trash"></i></a> |
                        <a href="purchase.php?id_penjualan=<?= $k['id_penjualan']?>" title="Lanjut Transaksi" class="text-green" onclick="return confirm('Lanjut Transaksi?')"><i class="fa fa-shopping-cart"></i></a>
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