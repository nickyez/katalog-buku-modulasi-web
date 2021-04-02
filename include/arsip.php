<?php 
    // pemisah bulan dan tahun
    $ex = explode("-",$data);
    $bulan = $ex[0];
    $tahun = $ex[1];
    // query SQL
    $sql_blog = "SELECT `b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y'), `b`.`isi`, `u`.`nama`,`b`.`id_blog` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user` WHERE MONTH(`b`.`tanggal`) = $bulan AND YEAR(`b`.`tanggal`) = $tahun";
    $query_blog = mysqli_query($koneksi, $sql_blog);
    // fetch data
    while($data_blog = mysqli_fetch_row($query_blog)){
        $judul = $data_blog[0];
        $tanggal = $data_blog[1];
        $isi = $data_blog[2];
        $penulis = $data_blog[3];
        $id_blog = $data_blog[4];
    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>"><?php echo $judul; ?></a></h2>
        <p class="blog-post-meta"><?php echo $tanggal; ?> by <a href="#"><?php echo $penulis; ?></a></p>
        <!--<img src="slideshow/slide-1.jpg" class="img-fluid" alt="Responsive image"><br><br>-->
        <p><?php echo $isi; ?></p>
        <a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>" class="btn btn-primary">Continue reading..</a>
    </div><!-- /.blog-post --><br>
<?php } ?>

