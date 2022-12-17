<?php include 'header.php' ?>

        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Akun Terdaftar
                    </div>
                    <div class="box-body">

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Akun">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_role LIKE '%".$_GET['key']."%' ";
                                }

                                $role = mysqli_query($conn,"SELECT * FROM 9400_role $where ORDER BY id_role DESC");
                                 if(mysqli_num_rows($role) > 0) {
                                    while($k = mysqli_fetch_array($role)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['username_role'] ?></td>
                                <td><?= $k['nama_role'] ?></td>
                                <td><?= $k['level_role'] ?></td>
                                <td>
                                <a href="hapus.php?id_role=<?= $k['id_role']?>" title="Delete Data" class="text-red" onclick="return confirm('Hapus Akun?')"><i class="fa fa-trash"></i></a>
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