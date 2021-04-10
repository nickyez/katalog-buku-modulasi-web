<?php
  if((isset($_GET['aksi']))&&(isset($_GET['data']))){
    if($_GET['aksi']=='hapus'){
      $id_kategori_blog = $_GET['data'];
      //hapus kategori blog
      $sql_dh = "DELETE FROM `kategori_blog` WHERE `id_kategori_blog` = '$id_kategori_blog'";
      mysqli_query($koneksi,$sql_dh);
    }
  }
  if(isset($_POST["katakunci"])){
    $katakunci_kategori = $_POST["katakunci"];
    $_SESSION['katakunci_kategori_blog'] = $katakunci_kategori;
  }
  if(isset($_SESSION['katakunci_kategori_blog'])){
    $katakunci_kategori = $_SESSION['katakunci_kategori_blog'];
  }else{
    unset($_SESSION['katakunci_kategori_blog']);
  }
?>
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3><i class="fas fa-address-book"></i> Kategori Blog</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Kategori Blog</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Kategori Blog</h3>
                    <div class="card-tools">
                      <a href="index.php?include=tambah-kategori-blog" class="btn btn-sm btn-info float-right">
                      <i class="fas fa-plus"></i>Tambah Kategori Blog</a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="col-md-12">
                      <form method="POST" action="index.php?include=kategori-blog">
                        <div class="row">
                            <div class="col-md-4 bottom-10">
                              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                            </div>
                            <div class="col-md-5 bottom-10">
                              <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search"></i>&nbsp; Search</button>
                            </div>
                        </div><!-- .row -->
                      </form>
                    </div><br>
                    <div class="col-sm-12">
                      <?php if(!empty($_GET['notif'])){?>
                        <?php if($_GET['notif']=="tambahberhasil"){?>
                          <div class="alert alert-success" role="alert">
                          Data Berhasil Ditambahkan</div>
                        <?php } else if($_GET['notif']=="editberhasil"){?>
                          <div class="alert alert-success" role="alert">
                          Data Berhasil Diubah</div>
                        <?php } else if($_GET['notif']=="hapusberhasil"){?>
                          <div class="alert alert-success" role="alert">
                          Data Berhasil Dihapus</div>
                        <?php }?>
                      <?php } ?>
                    </div>
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                          <th width="5%"><center>No</center></th>
                          <th width="80%"><center>Kategori Blog</center></th>
                          <th width="15%"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $batas = 2;
                          if(!isset($_GET['halaman'])){
                            $posisi = 0;
                            $halaman = 1;
                          }else{
                            $halaman = $_GET['halaman'];
                            $posisi = ($halaman-1) * $batas;
                          }
                          $sql_l = "SELECT `id_kategori_blog`,`kategori_blog` 
                                    FROM `kategori_blog`";
                          if (!empty($katakunci_kategori)){
                            $sql_l .= " WHERE `kategori_blog` LIKE '%$katakunci_kategori%'";
                          }
                          $sql_l .= " ORDER BY `kategori_blog` limit $posisi, $batas ";
                          $query_l = mysqli_query($koneksi,$sql_l);
                          $no = $posisi+1;
                          while($data_l = mysqli_fetch_row($query_l)){
                            $id_kategori_blog = $data_l[0];
                            $kategori_blog = $data_l[1];
                        ?>
                        <tr>
                          <td align="center"><?php echo $no; ?></td>
                          <td><?php echo $kategori_blog;?></td>
                          <td align="center">
                            <a href="index.php?include=edit-kategori-blog&data=<?php echo $id_kategori_blog; ?>"
                            class="btn btn-xs btn-warning" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data
                            <?php echo $kategori_blog; ?>?'))window.location.href =
                            'index.php?include=kategori-blog&aksi=hapus&data=<?php echo
                            $id_kategori_blog; ?>&notif=hapusberhasil'"
                            class="btn btn-xs btn-danger" title="Hapus"><i class="fas fa-trash"></i>Hapus</a>
                          </td>
                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <?php
                  //hitung jumlah semua data
                  $sql_jum = "SELECT `id_kategori_blog`, `kategori_blog` 
                              FROM `kategori_blog` ";
                  if (!empty($katakunci_kategori)){
                    $sql_jum .= " WHERE `kategori_blog` LIKE '%$katakunci_kategori%'";
                  }
                  $sql_jum .= " ORDER BY `kategori_blog`";
                  $query_jum = mysqli_query($koneksi,$sql_jum);
                  $jum_data = mysqli_num_rows($query_jum);
                  $jum_halaman = ceil($jum_data/$batas);
                  ?>
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <?php
                      if($jum_halaman==0){
                      //tidak ada halaman
                      }else if($jum_halaman==1){
                        echo "<li class='page-item'><a class='page-link'>1</a></li>";
                      }else{
                        $sebelum = $halaman-1;
                        $setelah = $halaman+1;
                        if($halaman!=1){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-blog&halaman=1'>First</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-blog&halaman=$sebelum'>«</a></li>";
                        }
                        for($i=1; $i<=$jum_halaman; $i++){
                          if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                            if($i!=$halaman){
                              echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-blog&halaman=$i'>$i</a></li>";
                            }else{
                              echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                          }
                        }
                        if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-blog&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=kategori-blog&halaman=$jum_halaman'>Last</a></li>";
                        }
                      } ?>
                    </ul>
                  </div>
                </div>
              <!-- /.card -->
        </section>