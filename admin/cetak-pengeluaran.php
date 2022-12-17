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
                            <th>Nama Supplier</th>
                            <th>Lokasi Pengadaan</th>
                            <th>Jumlah Pengadaan</th>
                            <th>Total Pengeluaran</th>
                            <th>Tanggal Pengadaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $where="WHERE 1=1";

                        if(isset($_GET['key'])){
                            $where .= " AND tanggal_pengadaan LIKE '%".$_GET['key']."%' ";
                        }


                         $penjualan = mysqli_query($conn,"SELECT * FROM 9400_transaksi_pengadaan $where ORDER BY id_pengadaan DESC");
                         if(mysqli_num_rows($penjualan) > 0) {
                            while($k = mysqli_fetch_array($penjualan)){
                        ?>
                        <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k['nama_supplier'] ?></td>
                        <td><?= $k['lokasi_pengadaan'] ?></td>
                        <td><?= $k['jumlah_pengadaan'] ?></td>
                        <td><?= $k['total_pengeluaran_pengadaan'] ?></td>
                        <td><?= $k['tanggal_pengadaan'] ?></td>
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