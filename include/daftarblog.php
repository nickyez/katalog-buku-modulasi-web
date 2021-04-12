<section id="blog-header">
    <div class="container">
        <h1 class="text-white">BLOG</h1>
    </div>
</section><br><br>
<section id="blog-list">
    <main role="main" class="container">
        <?php 
                function limit_text($text, $limit)
                {
                  if (str_word_count($text, 0) > $limit) {
                    $words = str_word_count($text, 2);
                    $pos   = array_keys($words);
                    $text  = substr($text, 0, $pos[$limit]) . '...';
                  }
                  return $text;
                } 
                if(isset($_GET['include'])){
                    $include = $_GET['include'];
                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        if($include=='daftar-blog-arsip'){
                            $ex = explode("-",$data);
                            $bulan = $ex[0];
                            $tahun = $ex[1];
                            $sql = "SELECT DATE_FORMAT(`tanggal`,'%c-%Y') as `tgl` FROM `blog` WHERE MONTH(`tanggal`) = $bulan AND YEAR(`tanggal`) = $tahun";
                        }elseif($include=='daftar-blog-kategori'){
                            $sql = "SELECT `kategori_blog` FROM `kategori_blog` WHERE `id_kategori_blog` = $data";
                        }elseif($include == 'daftar-blog-penulis'){
                            $sql = "SELECT `nama` FROM `user` WHERE `id_user` = $data";
                        }
                        $query = mysqli_query($koneksi, $sql);
                        while($data_b = mysqli_fetch_row($query)){
                            $nama = $data_b[0];
                        }
                    }
                }
            ?>
        <h2 class="text-dark">
            <?php if($include=='daftar-blog-arsip'){ echo "Archives : ", bulanIndo($nama);}elseif($include == 'daftar-blog-kategori'){ echo "Categories : $nama";}elseif($include == 'daftar-blog-penulis'){ echo "Penulis : $nama"; } ?>
        </h2><br><br>
        <div class="row">
            <div class="col-md-9 blog-main">
                <?php

                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        $include = $_GET['include'];
                        if($include == 'daftar-blog-arsip'){
                            include('daftarblog/arsip.php');
                        }elseif($include == 'daftar-blog-kategori'){
                            include('daftarblog/kategoriblog.php');
                        }elseif($include == 'daftar-blog-penulis'){
                            include('daftarblog/penulis.php');
                        }
                     ?>
                    <?php } ?>
            </div><!-- /.blog-main -->

            <?php include('includes/sidebarblog.php') ?>

        </div><!-- /.row -->

    </main><!-- /.container -->
</section><br><br>