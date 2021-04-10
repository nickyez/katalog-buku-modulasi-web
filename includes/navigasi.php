<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Katalog Buku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
            aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" id="home">
                    <a class="nav-link"  href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="aboutus">
                    <a class="nav-link" href="index.php?include=about-us">About Us</a>
                </li>
                <li class="nav-item dropdown" id="kategori">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <?php 
                            $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                            $query_k = mysqli_query($koneksi, $sql_k);
                            while($data_k = mysqli_fetch_row($query_k)){
                                $id_kat = $data_k[0];
                                $nama_kat = $data_k[1];
                            
                        ?>
                        <a class="dropdown-item" href="index.php?include=daftar-buku-kategori&data=<?php echo $id_kat; ?>"><?php echo $nama_kat; ?></a>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item" id="blog">
                    <a class="nav-link" href="index.php?include=blog">Blog</a>
                </li>
                <li class="nav-item" id="contactus">
                    <a class="nav-link" href="index.php?include=contact-us">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" action="index.php?include=cari-buku" method="post">
                <input class="form-control mr-sm-2" type="text" name="katakunci" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>