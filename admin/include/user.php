<?php
  if((isset($_GET['aksi']))&&(isset($_GET['data']))){
    if($_GET['aksi']=='hapus'){
      $id_user = $_GET['data'];
      //hapus user
      $sql_dh = "DELETE FROM `user` WHERE `id_user` = '$id_user'";
      mysqli_query($koneksi,$sql_dh);
    }
  }
  if(isset($_POST["katakunci"])){
    $katakunci_kategori = $_POST["katakunci"];
    $_SESSION['katakunci_user'] = $katakunci_kategori;
  }
  if(isset($_SESSION['katakunci_user'])){
    $katakunci_kategori = $_SESSION['katakunci_user'];
  }else{
    unset($_SESSION['katakunci_user']);
  }
?>
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Data User</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Data User</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Data User</h3>
                    <div class="card-tools">
                      <a href="index.php?include=tambah-user" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="col-md-12">
                      <form method="POST" action="index.php?include=user">
                        <div class="row">
                            <div class="col-md-4 bottom-10">
                              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                            </div>
                            <div class="col-md-5 bottom-10">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                            </div>
                        </div><!-- .row -->
                      </form>
                    </div><br>
                    <div class="col-sm-12">
                      <?php if(!empty($_GET['notif'])){ ?>
                        <?php if($_GET['notif']=="tambahberhasil"){ ?>
                          <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan
                          </div>
                          <?php } else if($_GET['notif']=="editberhasil"){ ?>
                          <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                      <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th width="5%"><center>No</center></th>
                            <th width="25%"><center>Nama</center></th>
                            <th width="30%"><center>Email</center></th>
                            <th width="20%"><center>Level</center></th>
                            <th width="20%"><center>Aksi</center></th>
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
                            $sql_u = "SELECT `id_user`, `nama`, `email`, `level` 
                                      FROM `user`";
                            if (!empty($katakunci_kategori)){
                              $sql_u .= " WHERE `nama` LIKE '%$katakunci_kategori%'";
                            }
                            $sql_u .= " ORDER BY `nama` limit $posisi, $batas ";
                            $query_u = mysqli_query($koneksi,$sql_u);
                            $posisi=1;
                            while($data_u = mysqli_fetch_row($query_u)){
                              $id_user = $data_u[0];
                              $nama = $data_u[1];
                              $email = $data_u[2];
                              $level = $data_u[3];
                          ?>
                          <tr>
                            <td align="center"><?php echo $posisi; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $level; ?></td>
                            <td align="center">                         
                              <a href="index.php?include=detail-user&data=<?php echo $id_user; ?>"
                              class="btn btn-xs btn-success" title="Detail"><i class="fas
                              fa-eye"></i>Detail</a>
                              <a href="index.php?include=edit-user&data=<?php echo $id_user; ?>"
                              class="btn btn-xs btn-warning" title="Edit"><i class="fas
                              fa-edit"></i>Edit</a>
                              <a href="javascript:if(confirm('Anda yakin ingin menghapus data
                              <?php echo $nama; ?>?')) window.location.href =
                              'index.php?include=user&aksi=hapus&data=<?php echo $id_user; ?>¬if=hapusberhasil'"
                              class="btn btn-xs btn-danger"><i class="fas fa-trash"
                              title="Hapus"></i>Hapus</a>                         
                            </td>
                          </tr>
                          <?php $posisi++; } ?>
                        </tbody>
                      </table>  
                  </div>
                  <!-- /.card-body -->
                  <?php
                    //hitung jumlah semua data
                    $sql_jum = "SELECT `id_user`, `nama`, `email`, `level` 
                                FROM `user`";
                    if (!empty($katakunci_kategori)){
                      $sql_jum .= "WHERE `nama` LIKE '%$katakunci_kategori%'";
                    }
                    $sql_jum .= "ORDER BY `nama`";
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
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=1'>First</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$sebelum'>«</a></li>";
                        }
                        for($i=1; $i<=$jum_halaman; $i++){
                          if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                            if($i!=$halaman){
                              echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$i'>$i</a></li>";
                            }else{
                              echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                          }
                        }
                        if($halaman!=$jum_halaman){
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$setelah'>»</a></li>";
                          echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$jum_halaman'>Last</a></li>";
                        }
                      } ?>
                    </ul>
                  </div>
                </div>
                <!-- /.card -->
        </section>