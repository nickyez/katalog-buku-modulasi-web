
    <?php
        if((isset($_GET['aksi'])) && (isset($_GET['data']))){
            if($_GET['aksi']=='hapus'){
                $id_penerbit = $_GET['data'];
                $sql_dh = "DELETE FROM `penerbit` WHERE `id_penerbit`=$id_penerbit";
                mysqli_query($koneksi, $sql_dh);
            }
        }
    ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3><i class="fas fa-book-reader"></i> Penerbit</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"> Penerbit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Penerbit
                        </h3>
                        <div class="card-tools">
                            <a href="index.php?include=tambah-penerbit" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-plus"></i> Tambah Penerbit</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <form method="post" action="index.php?include=penerbit">
                                <div class="row">
                                    <div class="col-md-4 bottom-10">
                                        <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                                    </div>
                                    <div class="col-md-5 bottom-10">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i>&nbsp; Search</button>
                                    </div>
                                </div><!-- .row -->
                            </form>
                        </div><br>
                        <div class="col-sm-12">
                            <?php if(!empty($_GET['notif'])){?>
                            <?php if($_GET['notif']=="tambahberhasil"){ ?>
                            <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                            <?php } ?>
                            <?php if($_GET['notif']=="editberhasil"){ ?>
                            <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                            <?php } ?>
                            <?php if($_GET['notif']=="hapusberhasil"){ ?>
                            <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Penerbit</th>
                                    <th width="50%">Alamat</th>
                                    <th width="15%">
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $batas = 5;
                                  if(!isset($_GET['halaman'])){
                                      $posisi = 0;
                                      $halaman = 1;
                                  }else{
                                      $halaman = $_GET['halaman'];
                                      $posisi = ($halaman-1) * $batas;
                                  }  
                                  if(isset($_POST['katakunci'])){
                                      $katakunci_penerbit = $_POST['katakunci'];
                                      $_SESSION['katakunci_penerbit'] = $katakunci_penerbit;
                                  }
                                  if(isset($_SESSION['katakunci_penerbit'])){
                                    $katakunci_penerbit = $_SESSION['katakunci_penerbit'];
                                  }
                                  $sql_p = "SELECT `id_penerbit`, `penerbit`,`alamat` FROM `penerbit`";
                                  if(!empty($katakunci_penerbit)){
                                    $sql_p .= " WHERE `penerbit` LIKE '%$katakunci_penerbit%'";
                                  }
                                  $sql_p .= "ORDER BY `penerbit` LIMIT $posisi, $batas";
                                  $query_p = mysqli_query($koneksi, $sql_p);
                                  $no = $posisi+1;
                                  while($data_p = mysqli_fetch_row($query_p)){
                                      $id_penerbit = $data_p[0];
                                      $penerbit = $data_p[1];
                                      $alamat = $data_p[2];
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $penerbit;?></td>
                                    <td><?php echo $alamat;?></td>
                                    <td align="center">
                                        <a href="index.php?include=edit-penerbit&data=<?php echo $id_penerbit;?>"
                                            class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $penerbit; ?>?'))window.location.href='index.php?include=penerbit&aksi=hapus&data=<?php echo $id_penerbit;?>&notif=hapusberhasil'"
                                            class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>
                                            Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++;?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <?php 
                            $sql_jum = "SELECT `id_penerbit`, `penerbit`,`alamat` FROM `penerbit`";
                            if(isset($_GET['katakunci'])){
                                $katakunci_penerbit = $_GET['katakunci'];
                                $sql_jum .= " WHERE `penerbit` LIKE '%$katakunci_penerbit%'";
                            }
                            $sql_jum .= "ORDER BY `penerbit`";
                            $query_jum = mysqli_query($koneksi, $sql_jum);
                            $jum_data = mysqli_num_rows($query_jum);
                            $jum_halaman = ceil($jum_data/$batas);
                        ?>
                        <ul class="pagination pagination-sm m-0 float-right">
                            <?php
                                if($jum_halaman==0){
                                    // tidak ada halaman
                                }else if($jum_halaman==1){
                                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                }else{
                                    $sebelum = $halaman - 1;
                                    $setelah = $halaman + 1;
                                    
                                    if($halaman!=1){
                                        echo "
                                            <li class='page-item'>
                                                <a class='page-link'href='index.php?include=penerbit&halaman=1'>First</a>
                                            </li>
                                        ";
                                        echo "
                                            <li class='page-item'>
                                                <a class='page-link'href='index.php?include=penerbit&halaman=$sebelum'>«</a>
                                             </li>
                                        ";
                                    }
                                    for($i=1; $i<=$jum_halaman; $i++){
                                        if($i > $halaman - 5 and $i < $halaman + 5){
                                            if($i!=$halaman){
                                                echo "
                                                    <li class='page-item'>
                                                        <a class='page-link' href='index.php?include=penerbit&halaman=$i'>$i</a>
                                                    </li>
                                                ";
                                             }else{
                                                echo "
                                                        <li class='page-item'>
                                                        <a class='page-link'>$i</a>
                                                    </li>
                                                ";
                                            }
                                        }
                                    }
                                    if($halaman!=$jum_halaman){
                                        echo "
                                        <li class='page-item'>
                                        <a class='page-link' href='index.php?include=penerbit&halaman=$setelah'>
                                        »</a></li>
                                        ";
                                        echo "
                                         <li class='page-item'><a class='page-link' href='index.php?include=penerbit&halaman=$jum_halaman'>Last</a></li>
                                        ";
                                    } 
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->