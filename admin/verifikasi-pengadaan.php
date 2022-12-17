<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Verifikasi Pengadaan
                    </div>
                    <div class="box-body">

                    <a href="cetak-pengadaan.php"><input type="Button" name="cetak-pengadaan" value="Cetak Pengadaan" class="btn btn-red"></a>

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
                                    <th>Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_verifikasi_pengadaan LIKE '%".$_GET['key']."%' ";
                                }


                                 $verifikasipengadaan = mysqli_query($conn,"SELECT * FROM 9400_verifikasi_pengadaan $where ORDER BY id_verifikasi_pengadaan DESC");
                                 if(mysqli_num_rows($verifikasipengadaan) > 0) {
                                    while($k = mysqli_fetch_array($verifikasipengadaan)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['merk_verifikasi_pengadaan'] ?></td>
                                <td><?= $k['nama_verifikasi_pengadaan'] ?></td>
                                <td><?= $k['supplier_verifikasi_pengadaan'] ?></td>
                                <td><?= $k['jumlah_verifikasi_pengadaan'] ?></td>
                                <td><?= $k['tanggal_verifikasi_pengadaan'] ?></td>
                                <td>
                                <a href="tambah-verifikasi-pengadaan.php?id_verifikasi_pengadaan=<?= $k['id_verifikasi_pengadaan']?>" title="Edit Data"><i class="fa fa-check"></i></a> |
                                <a href="hapus.php?id_verifikasi_pengadaan=<?= $k['id_verifikasi_pengadaan']?>" title="Delete Data" class="text-red" onclick="return confirm('BATALKAN pengadaan stok barang?')"><i class="fa fa-times"></i></a>
                                </td>
                                </tr>
                                <?php }} else { ?>
                                    <tr>
                                        <td colspan ="7">Data Kosong</td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            
                        </table>
                    </div>

                </div>
                     
            </div>

        </div>
<?php include 'footer.php' ?>