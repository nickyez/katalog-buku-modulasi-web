<?php 
        $sql_k = "SELECT `judul`,`isi`, DATE_FORMAT(`tanggal`, '%d-%c-%Y') FROM `konten` WHERE `id_konten`='1'";
        $query_k = mysqli_query($koneksi,$sql_k);
        while($data_k = mysqli_fetch_row($query_k)){
            $judul_konten = $data_k[0];
            $isi_konten = $data_k[1];
            $tanggal = $data_k[2];
        }
    ?>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">ABOUT US</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $judul_konten; ?></h2>
              <p class="blog-post-meta"> <?php echo TanggalIndo($tanggal); ?></p>
              <?php echo $isi_konten; ?>
            </div><br><br><!-- /.blog-post -->
          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 blog-sidebar">
      
            <div class="p-4">
              <h4 class="font-italic">Social Media</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
              </ol>
            </div>
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>