<?php include 'header.php' ?>

<script>
    function printPage() {
        window.print();
    }
</script>
<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-body">
            <form action="">
                <div class="input-group">
                </div>
            </form>

                <table class="table">
                <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Masukkan Tanggal">
                            <button type="submit">Cari</button>
                        </div>
                    </form>
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
                            $where .= " AND tanggal_penjualan LIKE '%".$_GET['key']."%' ";
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
                    <button type="submit" class="btn" id="print" onclick="printPage()">Print</button>
                </table>

            </div>

        </div>
             
    </div>

</div>

<?php include 'footer.php' ?>