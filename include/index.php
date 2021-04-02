    <section id="carousel-item">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="slideshow/slide-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="slideshow/slide-2.jpg"" class=" d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="slideshow/slide-3.jpg"" class=" d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <?php 
        $sql_k = "SELECT `judul`,`isi` FROM `konten` WHERE 
        `id_konten`='2'";
        $query_k = mysqli_query($koneksi,$sql_k);
        while($data_k = mysqli_fetch_row($query_k)){
        $judul_konten = $data_k[0];
        $isi_konten = $data_k[1];
        }
    ?>
    <section id="notes-item">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading"><span class="text-muted"><?php echo $judul_konten;?></span></h2>
                    <p class="lead"><?php echo $isi_konten; ?></p>
                </div>
                <div class="col-md-5">
                    <img src="images/undraw_book_lover_mkck.png" class="img-fluid mx-auto featurette-image">
                    <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>-->
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </section><!-- #notes-item -->

    <section id="product-item">
        <div class="container">
            <h2>Koleksi Terbaru</h2>
            <div class="row">
                <?php 
                    $sql_b = "SELECT `b`.`id_buku`, `b`.`judul`, `b`.`cover`, `p`.`penerbit` FROM `buku` `b` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit` ORDER BY `b`.`id_buku` DESC LIMIT 6";                   
                    $query_b = mysqli_query($koneksi,$sql_b);
                    while($data_b = mysqli_fetch_row($query_b)){
                        $id_buku = $data_b[0];
                        $judul_buku = $data_b[1];
                        $cover = $data_b[2];
                        $penerbit = $data_b[3];
                    
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="admin/cover/<?php echo $cover; ?>" class="img-fluid" alt="Books Collection" title="<?php echo $judul_buku;?>">
                        <div class="card-body bg-warning">
                            <p class="card-text"><?php echo $judul_buku;?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="index.php?include=detail-buku&data=<?php echo $id_buku;?>"
                                        class="btn btn-primary stretched-link">Detail</a>
                                </div>
                                <small class="text-muted"><?php echo $penerbit;?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                ?>

            </div>
        </div>
    </section><br><br><!-- #product-item -->

    <section id="quotes-item" class="bg-light" style="min-height: 80px;padding:40px 0px 0px 0px;">
        <div class="container">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                </p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite>
                </footer>
            </blockquote>
        </div>
    </section><br><br>
    <section id="blog-item" class="mb-4">
        <div class="container">
            <h2>Blog Terbaru</h2><br>
            <div class="row mb-2">
            <?php 
                $sql_l = "SELECT `b`.`id_blog`, `b`.`judul`,DATE_FORMAT(`b`.`tanggal`,'%d-%m-%Y'), `k`.`kategori_blog` FROM `blog` `b` INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` ORDER BY `b`.`id_blog` DESC";
                $query_l = mysqli_query($koneksi, $sql_l);
                while($data_l = mysqli_fetch_row($query_l)){
                    $id_blog = $data_l[0];
                    $judul_blog = $data_l[1];
                    $tanggal_blog = $data_l[2];
                    $kategori_blog = $data_l[3];
                
            ?>
                <div class="col-md-6">
                    <div
                        class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static bg-light">
                            <strong class="d-inline-block mb-2 text-success"><?php echo $kategori_blog; ?></strong>
                            <h3 class="mb-0"><a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>"><?php echo $judul_blog; ?></a></h3>
                            <div class="mb-1 text-muted"><?php echo $tanggal_blog; ?></div>
                            <!--<p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
                            <!-- <a href="#" class="stretched-link">Continue reading</a> -->
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="images/blog.jpg" class="img-fluid" title="book title here">
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>

            </div>
        </div>
    </section>