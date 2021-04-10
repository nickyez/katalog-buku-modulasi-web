<?php
    if(isset($_GET['data'])){
    $id_blog = $_GET['data'];
    $_SESSION['id_blog']=$id_blog;
    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //get data kategori buku
    $sql_d = "SELECT `id_kategori_blog`,`judul`,`isi` FROM `blog` WHERE `id_blog` = '$id_blog'";
    $query_d = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query_d)){
      $id_kategori_blog = $data_d[0];
      $judul = $data_d[1];
      $isi = $data_d[2];
    }
  }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=blog">Data Blog</a></li>
              <li class="breadcrumb-item active">Edit Data Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Blog</h3>
        <div class="card-tools">
          <a href="index.php?include=blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <?php if(!empty($_GET['notif'])){?>
      <?php if($_GET['notif']=="editkosong"){?>
        <div class="alert alert-danger" role="alert">
        Maaf data kategori buku wajib di isi</div>
      <?php }?>
      <?php }?>
      <form class="form-horizontal" action="index.php?include=konfirmasi-edit-blog "method="post" enctype="multipart/form-data">
        <div class="card-body">
          
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="kategori_blog">
              <?php
                  $sql_k = "SELECT id_kategori_blog, kategori_blog FROM 
                           kategori_blog ORDER BY kategori_blog";
                  $query_k = mysqli_query($koneksi,$sql_k);
                  while ($data_k = mysqli_fetch_row($query_k)) {
                    $id_kat = $data_k[0];
                    $kat = $data_k[1];

                ?>
                 <option value="<?php echo $id_kat;?>"
                  <?php if($id_kat==$id_kategori_blog){?>
                  selected <?php }?>><?php echo $kat;?></option>
                  <?php }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="isi" id="editor1" rows="12"><?php echo $isi;?></textarea>
              <input hidden type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo $date->format('Y-m-d');?>">
              <input hidden type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
