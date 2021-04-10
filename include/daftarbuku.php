    <section id="blog-header">
        <div class="container">
            <h1 class="text-white">DAFTAR BUKU</h1>
        </div>
    </section><br><br>

    <section id="katalog-item">
        <main role="main" class="container">
            <?php 
                if(isset($_GET['include'])){
                    $include = $_GET['include'];
                    if(isset($_GET['data'])){
                        $data = $_GET['data'];
                        if($include=='daftar-buku-kategori'){
                            $sql = "SELECT kategori_buku FROM kategori_buku WHERE id_kategori_buku = $data";
                        }elseif($include=='daftar-buku-tag'){
                            $sql = "SELECT tag FROM tag WHERE id_tag = $data";
                        }elseif($include=='cari-buku'){
                            if(isset($_POST['katakunci'])){
                                $katakunci_buku = $_POST['katakunci'];
                                $_SESSION['katakunci_buku'] = $katakunci_buku;
                                $nama = $katakunci_buku;
                            }
                            if(isset($_SESSION['katakunci_buku'])){
                              $katakunci_buku = $_SESSION['katakunci_buku'];
                            }
                        }
                        $query = mysqli_query($koneksi, $sql);
                        while($data_b = mysqli_fetch_row($query)){
                            $nama = $data_b[0];
                        }
                    }
                }
            ?>
            <h2 class="text-primary">
                <?php if($include=='daftar-buku-kategori'){ echo "Categories ";}elseif($include=='daftar-buku-tag'){ echo "Tag ";}elseif($include=='cari-buku'){ echo "Hasil Pencarian : "; } ?>:
                <?php echo $nama; ?></h2><br><br>
            <div class="row">
                <div class="col-md-9 katalog-main">
                    <div class="row">
                        <?php 
                          $include = $_GET['include'];
                          $data = $_GET['data'];
                          if($include=='daftar-buku-kategori'){
                              include('daftarbuku/kategori.php');
                          }elseif($include=='daftar-buku-tag'){
                              include('daftarbuku/tag.php');
                          }elseif($include=='cari-buku'){
                              include('daftarbuku/caribuku.php');
                          }
                        ?>
                    </div><!-- .row-->
                </div><!-- /.katalog-main -->

                <aside class="col-md-3 katalog-sidebar">

                    <div class="pl-4 pb-4">
                        <h4 class="font-italic">Kategori</h4>
                        <ol class="list-unstyled mb-0">
                            <?php 
                        $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        while($data_k = mysqli_fetch_row($query_k)){
                            $id_kat = $data_k[0];
                            $nama_kat = $data_k[1];
                        
                    ?>
                            <li><a
                                    href="index.php?include=daftar-buku-kategori&data=<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a>
                            </li>
                            <?php } ?>
                    </div>

                    <div class="p-4">
                        <h4 class="font-italic">Tag</h4>
                        <ol class="list-unstyled">
                            <?php 
                            $sql_t = "SELECT `id_tag`,`tag` FROM `tag` ORDER BY `tag`";
                            $query_t = mysqli_query($koneksi, $sql_t);
                            while($data_t = mysqli_fetch_row($query_t)){
                                $id_tag = $data_t[0];
                                $nama_tag = $data_t[1];
                            
                        ?>
                            <li><a
                                    href="index.php?include=daftar-buku-tag&data=<?php echo $id_tag; ?>"><?php echo $nama_tag; ?></a>
                            </li>
                            <?php } ?>
                        </ol>
                    </div>
                </aside> <!-- /.katalog-sidebar -->

            </div><!-- /.row -->
        </main><!-- /.container -->
    </section><br><br>