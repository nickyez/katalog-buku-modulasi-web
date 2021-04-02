<?php 
      if(isset($_GET['data'])){
        $id_kategori_buku = $_GET['data'];
        $_SESSION['id_kategori_buku']=$id_kategori_buku;

        $sql_d = "SELECT `kategori_buku` FROM `kategori_buku` WHERE `id_kategori_buku` = '$id_kategori_buku'";
        $query_d = mysqli_query($koneksi, $sql_d);
        while($data_d = mysqli_fetch_row($query_d)){
          $kategori_buku = $data_d[0];
        }
      }
  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><i class="fas fa-edit"></i> Edit Kategori Buku</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="katgoribuku.php">Kategori Buku</a></li>
                        <li class="breadcrumb-item active">Edit Kategori Buku</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Kategori Buku
                </h3>
                <div class="card-tools">
                    <a href="index.php?include=kategori-buku" class="btn btn-sm btn-warning float-right"><i
                            class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            </br>
            <div class="col-sm-10">
                <?php if(!empty($_GET['notif'])){ ?>
                <?php if($_GET['notif']=="editkosong"){ ?>
                <div class="alert alert-danger" role="alert">Maaf data Kategori Buku wajib di isi</div>
                <?php } ?>
                <?php } ?>
            </div>
            <form class="form-horizontal" method="post" action="index.php?include=konfirmasi-edit-kategori-buku">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="Kategori Buku" class="col-sm-3 col-form-label">Kategori Buku</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="Kategori Buku" name="kategori_buku"
                                value="<?php echo $kategori_buku;?>">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->