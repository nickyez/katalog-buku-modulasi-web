    <?php 
      if(isset($_GET['data'])){
        $id_tag = $_GET['data'];
        $_SESSION['id_tag']=$id_tag;

        $sql_d = "SELECT `tag` FROM `tag` WHERE `id_tag` = '$id_tag'";
        $query_d = mysqli_query($koneksi, $sql_d);
        while($data_d = mysqli_fetch_row($query_d)){
          $tag = $data_d[0];
        }
      }
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><i class="fas fa-edit"></i> Edit Tag</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?include=tag">Tag</a></li>
                        <li class="breadcrumb-item active">Edit Tag</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Tag
                </h3>
                <div class="card-tools">
                    <a href="index.php?include=tag" class="btn btn-sm btn-warning float-right"><i
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
            <form class="form-horizontal" action="index.php?include=konfirmasi-edit-tag" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="Tag" class="col-sm-3 col-form-label">Tag</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tag" id="Tag" value="<?php echo $tag;?>">
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