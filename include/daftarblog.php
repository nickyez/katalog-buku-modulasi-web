<section id="blog-header">
    <div class="container">
        <h1 class="text-white">BLOG</h1>
    </div>
</section><br><br>
<section id="blog-list">
    <main role="main" class="container">
        <?php 
                
                if(isset($_GET['include'])){
                    $include = $_GET['include'];
                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        if($include=='daftar-blog-arsip'){
                            $ex = explode("-",$data);
                            $bulan = $ex[0];
                            $tahun = $ex[1];
                            $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` WHERE MONTH(`tanggal`) = $bulan AND YEAR(`tanggal`) = $tahun";
                        }else{
                            $sql = "SELECT `kategori_blog` FROM `kategori_blog` WHERE `id_kategori_blog` = $data";
                        }
                        $query = mysqli_query($koneksi, $sql);
                        while($data_b = mysqli_fetch_row($query)){
                            $nama = $data_b[0];
                        }
                    }
                }
            ?>
        <h2 class="text-dark">
            <?php if($include=='daftar-blog-arsip'){ echo "Archives : ", bulanIndo($nama);}else{ echo "Categories : $nama";} ?></h2><br><br>
        <div class="row">
            <div class="col-md-9 blog-main">
                <?php
                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        $include = $_GET['include'];
                        if($include == 'daftar-blog-arsip'){
                            include('arsip.php');
                        }elseif($include == 'daftar-blog-kategori'){
                            include('kategoriblog.php');
                        }
                     ?>
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>
                <?php }else{ echo "<h3>Blog tidak tersedia</h3>"; } ?>
            </div><!-- /.blog-main -->

            <?php include('includes/sidebarblog.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->
</section><br><br>