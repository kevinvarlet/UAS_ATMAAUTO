<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Karyawan
                    </div>
                    <div class="box-body">

                    <button type="button" class="btn" onclick="window.location = 'tambah-karyawan.php'"><i class="fa fa-plus"></i> Tambah Karyawan</button>

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Nama Karyawan">
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
                                    $where .= " AND nama_karyawan LIKE '%".$_GET['key']."%' ";
                                }


                                 $karyawan = mysqli_query($conn,"SELECT * FROM 9400_karyawan $where ORDER BY id_karyawan DESC");
                                 if(mysqli_num_rows($karyawan) > 0) {
                                    while($k = mysqli_fetch_array($karyawan)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama_karyawan'] ?></td>
                                <td><?= $k['alamat_karyawan'] ?></td>
                                <td><?= $k['no_telepon_karyawan'] ?></td>
                                <td>
                                <a href="edit-karyawan.php?id_karyawan=<?= $k['id_karyawan']?>" title="Edit Data" ><i class="fa fa-edit"></i></a> |
                                <a href="hapus.php?id_karyawan=<?= $k['id_karyawan']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i></a>
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