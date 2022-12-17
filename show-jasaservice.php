<?php include 'header-pengguna.php' ?>


        <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Service
                    </div>
                    <div class="box-body">

                    <form action="">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Cari Service">
                            <button type="submit">Cari</button>
                        </div>
                    </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $where="WHERE 1=1";

                                if(isset($_GET['key'])){
                                    $where .= " AND nama_service LIKE '%".$_GET['key']."%' ";
                                }


                                 $service = mysqli_query($conn,"SELECT * FROM 9400_service $where ORDER BY id_service DESC");
                                 if(mysqli_num_rows($service) > 0) {
                                    while($k = mysqli_fetch_array($service)){
                                ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k['nama_service'] ?></td>
                                <td><?= $k['harga_service'] ?></td>
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


<?php include 'footer-pengguna.php' ?>