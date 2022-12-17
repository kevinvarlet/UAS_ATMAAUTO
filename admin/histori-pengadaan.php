<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Histori Pengadaan
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
                                    <th>Supplier</th>
                                    <th>Jumlah Pengadaan</th>
                                    <th>Tanggal Pengadaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_histori_pengadaan LIKE '%".$_GET['key']."%' ";
                                }


                                 $historipengadaan = mysqli_query($conn,"SELECT * FROM 9400_histori_pengadaan $where ORDER BY id_histori_pengadaan DESC");
                                 if(mysqli_num_rows($historipengadaan) > 0) {
                                    while($k = mysqli_fetch_array($historipengadaan)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['merk_histori_pengadaan'] ?></td>
                                <td><?= $k['nama_histori_pengadaan'] ?></td>
                                <td><?= $k['supplier_histori_pengadaan'] ?></td>
                                <td><?= $k['jumlah_histori_pengadaan'] ?></td>
                                <td><?= $k['tanggal_histori_pengadaan'] ?></td>
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