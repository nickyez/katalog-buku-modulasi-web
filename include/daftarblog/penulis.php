<?php 
    $batas = 3;
    if(!isset($_GET['halaman'])){
        $posisi = 0;
        $halaman = 1;
    }else{
        $halaman = $_GET['halaman'];
        $posisi = ($halaman-1) * $batas;
    }
    // query SQL
    $sql_blog = "SELECT `b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y') as `tgl`, `b`.`isi`,`b`.`id_user`, `u`.`nama`,`b`.`id_blog` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user` WHERE `b`.`id_user` = $data ORDER BY `b`.`tanggal` DESC LIMIT $posisi,$batas";
    $query_blog = mysqli_query($koneksi, $sql_blog);
    $row = mysqli_num_rows($query_blog);
    if($row == 0){
        echo "<h3>Blog tidak tersedia</h3>";
    }else{
    // fetch data
    while($data_blog = mysqli_fetch_row($query_blog)){
        $judul = $data_blog[0];
        $tanggal = $data_blog[1];
        $isi = $data_blog[2];
        $id_penulis = $data_blog[3];
        $penulis = $data_blog[4];
        $id_blog = $data_blog[5];
    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="#"><?php echo $judul; ?></a></h2>
        <p class="blog-post-meta"><?php echo $tanggal; ?> by <a href="index.php?include=daftar-blog-penulis&data=<?php echo $id_penulis; ?>"><?php echo $penulis; ?></a></p>
        <!--<img src="slideshow/slide-1.jpg" class="img-fluid" alt="Responsive image"><br><br>-->
        <p><?php echo limit_text($isi,90); ?></p>
        <a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>" class="btn btn-primary">Continue reading..</a>
    </div><!-- /.blog-post --><br>
<?php } ?>
<nav aria-label="blog-pagination">
    <?php 
        $sql_blog = "SELECT `b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y') as `tgl`, `b`.`isi`,`b`.`id_user`, `u`.`nama`,`b`.`id_blog` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user` WHERE `b`.`id_user` = $data ORDER BY `tgl`";
        $query_blog = mysqli_query($koneksi, $sql_blog);
        $jum_data = mysqli_num_rows($query_blog);
        $jum_halaman = ceil($jum_data/$batas);
    ?>
    <ul class="pagination justify-content-end">
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
                                               <a class='page-link'href='index.php?include=daftar-blog-penulis&data=$data&halaman=1'>Terbaru</a>
                                            </li>
                                            ";
                                            echo "
                                                <li class='page-item'>
                                                    <a class='page-link'href='index.php?include=daftar-blog-penulis&data=$data&halaman=$sebelum'>«</a>
                                                 </li>
                                            ";
                                    }
                                    for($i=1; $i<=$jum_halaman; $i++){
                                            if($i > $halaman - 5 and $i < $halaman + 5){
                                                if($i!=$halaman){
                                                    echo "
                                                        <li class='page-item'>
                                                            <a class='page-link' href='index.php?include=daftar-blog-penulis&data=$data&halaman=$i'>$i</a>
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
                                            <a class='page-link' href='index.php?include=daftar-blog-penulis&data=$data&halaman=$setelah'>
                                            »</a></li>
                                            ";
                                            echo "
                                            <li class='page-item'><a class='page-link' href='index.php?include=daftar-blog-penulis&data=$data&halaman=$jum_halaman'>Terlama</a></li>
                                            ";
                                        }
                                    }
                                
                            ?>
    </ul>
</nav>
<?php } ?>

