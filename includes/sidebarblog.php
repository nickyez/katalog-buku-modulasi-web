<aside class="col-md-3 blog-sidebar">

    <div class="p-4">
        <h4 class="font-italic">Categories</h4>
        <ol class="list-unstyled mb-0">
            <?php 
                $sql_k = "SELECT `id_kategori_blog`,`kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
                $query_k = mysqli_query($koneksi, $sql_k);
                while($data_k = mysqli_fetch_row($query_k)){
                    $id_kat = $data_k[0];
                    $nama_kat = $data_k[1];    
                ?>
            <li><a
                    href="index.php?include=daftar-blog-kategori&data=<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a>
            </li>
            <?php } ?>
    </div>
    <div class="p-4">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <?php 
                $sql_tgl = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` GROUP BY `tgl`";
                $query_tgl = mysqli_query($koneksi, $sql_tgl);
                while($data_tgl = mysqli_fetch_row($query_tgl)){
                    $tanggal = $data_tgl[0];   
                ?>
            <li><a
                    href="index.php?include=daftar-blog-arsip&data=<?php echo $tanggal; ?>"><?php echo BulanIndo($tanggal); ?></a>
            </li>
            <?php } ?>
        </ol>
    </div>
</aside><!-- /.blog-sidebar -->