<?php include 'header.php' ?>


<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Histori
            </div>
            <div class="box-body">
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
                            <th>Tanggal Transaksi</th>
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
                        <td><?= $k['tanggal_penjualan'] ?></td>
                        </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan ="5">Data Kosong</td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    
                </table>
                <div>
                <button type="button" class="btn" onclick="window.location = 'cetak-pendapatan.php'"><i class="fa fa-plus"></i> Cetak Pendapatan Per Bulan</button>
                      
                <button type="button" class="btn" onclick="window.location = 'cetak-pengeluaran.php'"><i class="fa fa-minus"></i> Cetak Pengeluaran Per Bulan</button>
                        </div>
            </div>

        </div>
             
    </div>

</div>

<?php include 'footer.php' ?>