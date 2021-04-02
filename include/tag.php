<?php
    $batas = 1;
    if(!isset($_GET['halaman'])){
        $posisi = 0;
        $halaman = 1;
    }else{
        $halaman = $_GET['halaman'];
        $posisi = ($halaman-1) * $batas;
    }
    $sql_b = "SELECT `b`.`id_buku`, `b`.`judul`, `b`.`cover`, `p`.`penerbit` FROM `buku` `b` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit` INNER JOIN `tag_buku` `tb` ON `b`.`id_buku` = `tb`.`id_buku` WHERE `tb`.`id_tag` = $data ORDER BY `b`.`judul`";                   
    $query_b = mysqli_query($koneksi,$sql_b);
    while($data_b = mysqli_fetch_row($query_b)){
        $id_buku = $data_b[0];
        $judul_buku = $data_b[1];
        $cover = $data_b[2];
        $penerbit = $data_b[3];
?>
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="admin/cover/<?php echo $cover; ?>" class="img-fluid" alt="<?php echo $judul_buku; ?>"
            title="<?php echo $judul_buku; ?>">
        <div class="card-body bg-warning">
            <p class="card-text"><?php echo $judul_buku; ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="index.php?include=detail-buku" class="btn btn-primary stretched-link">Detail</a>
                </div>
                <small class="text-muted"><?php echo $penerbit; ?></small>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="col-sm-12">
    <nav aria-label="Page navigation">
        <?php 
                                    $sql_b = "SELECT `b`.`id_buku`, `b`.`judul`, `b`.`cover`, `p`.`penerbit` FROM `buku` `b` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit` INNER JOIN `tag_buku` `tb` ON `b`.`id_buku` = `tb`.`id_buku` WHERE `tb`.`id_tag` = $data ORDER BY `b`.`judul`";
                                    $query_jum = mysqli_query($koneksi, $sql_b);
                                    $jum_data = mysqli_num_rows($query_jum);
                                    $jum_halaman = ceil($jum_data/$batas);
                                ?>
        <ul class="pagination">
            <?php
                                if($jum_halaman==0){
                                    // tidak ada halaman
                                }else if($jum_halaman==1){
                                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                }else{
                                    $sebelum = $halaman - 1;
                                    $setelah = $halaman + 1;
                                    if($halaman!=1){
                                        echo "
                                            <li class='page-item'>
                                               <a class='page-link'href='index.php?include=daftar-buku-tag&halaman=1'>First</a>
                                            </li>
                                            ";
                                            echo "
                                                <li class='page-item'>
                                                    <a class='page-link'href='index.php?include=daftar-buku-tag&halaman=$sebelum'>«</a>
                                                 </li>
                                            ";
                                    }
                                    for($i=1; $i<=$jum_halaman; $i++){
                                            if($i > $halaman - 5 and $i < $halaman + 5){
                                                if($i!=$halaman){
                                                    echo "
                                                        <li class='page-item'>
                                                            <a class='page-link' href='index.php?include=daftar-buku-tag&halaman=$i'>$i</a>
                                                        </li>
                                                    ";
                                                }else{
                                                    echo "
                                                        <li class='page-item'>
                                                            <a class='page-link'>$i</a>
                                                        </li>
                                                    ";
                                                }
                                            }
                                        }
                                        if($halaman!=$jum_halaman){
                                            echo "
                                            <li class='page-item'>
                                            <a class='page-link' href='index.php?include=daftar-buku-tag&halaman=$setelah'>
                                            »</a></li>
                                            ";
                                            echo "
                                            <li class='page-item'><a class='page-link' href='index.php?include=daftar-buku-tag&halaman=$jum_halaman'>Last</a></li>
                                            ";
                                        }
                                    }
                                
                            ?>
        </ul>
    </nav>
</div>