
    <section id="blog-header">
        <div class="container">
            <h1 class="text-white">BLOG</h1>
        </div>
    </section><br><br>
    <section id="blog-list">
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-9 blog-main">
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
                        $sql_blog = "SELECT `b`.`judul`, DATE_FORMAT(`b`.`tanggal`, '%M %d, %Y'), `b`.`isi`, `u`.`nama`,`b`.`id_blog` FROM `blog` `b` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user`";
                        $query_blog = mysqli_query($koneksi, $sql_blog);
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
                        <p><?php echo limit_text($isi,50); ?></p>
                        <a href="index.php?include=detail-blog&data=<?php echo $id_blog; ?>" class="btn btn-primary">Continue reading..</a>
                    </div><!-- /.blog-post --><br>
                    <?php } ?>


                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1"
                            aria-disabled="true">Newer</a>
                    </nav>

                </div><!-- /.blog-main -->

                <?php include('includes/sidebarblog.php') ?>

            </div><!-- /.row -->

        </main><!-- /.container -->
    </section><br><br>