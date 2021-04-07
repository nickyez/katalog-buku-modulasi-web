<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head.php") ?>
    <?php 
    session_start();
    include("koneksi/koneksi.php");
    if(isset($_GET['include'])){
      $include = $_GET['include'];
      if($include=="konfirmasi-login"){
        include("include/konfirmasilogin.php");
      }else if($include=="signout"){
        include("include/signout.php"); 
      }else if($include=="konfirmasi-tambah-kategori-buku"){
        include("include/konfirmasitambahkategoribuku.php");
      }else if($include=="konfirmasi-edit-kategori-buku"){
        include("include/konfirmasieditkategoribuku.php");
      }else if($include=="konfirmasi-tambah-tag"){
        include("include/konfirmasitambahtag.php");
      }else if($include=="konfirmasi-edit-tag"){
        include("include/konfirmasiedittag.php");
      }else if($include=="konfirmasi-tambah-penerbit"){
        include("include/konfirmasitambahpenerbit.php");
      }else if($include=="konfirmasi-edit-penerbit"){
        include("include/konfirmasieditpenerbit.php");
      }else if($include=="konfirmasi-tambah-kategori-blog"){
        include("include/konfirmasitambahkategoriblog.php");
      }else if($include=="konfirmasi-edit-kategori-blog"){
        include("include/konfirmasieditkategoriblog.php");
      }else if($include=="konfirmasi-edit-konten"){
        include("include/konfirmasieditkonten.php");
      }else if($include=="konfirmasi-tambah-buku"){
        include("include/konfirmasitambahbuku.php");
      }else if($include=="konfirmasi-edit-buku"){
        include("include/konfirmasieditbuku.php");
      }else if($include=="konfirmasi-tambah-blog"){
        include("include/konfirmasitambahblog.php");
      }else if($include=="konfirmasi-edit-user"){
        include("include/konfirmasiedituser.php");
      }else if($include=="konfirmasi-tambah-user"){
        include("include/konfirmasitambahuser.php");
      }else if($include=="konfirmasi-edit-user"){
        include("include/konfirmasiedituser.php");
      }
    }
?>
</head>
<?php 
    if(isset($_GET['include'])){
      $include = $_GET['include'];
      if(isset($_SESSION['id_user'])){?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
            <?php 
          if($include=="kategori-buku"){
            include("include/kategoribuku.php");
          }elseif($include=='tambah-kategori-buku'){
            include("include/tambahkategoribuku.php");
          }elseif($include=='edit-kategori-buku'){
            include("include/editkategoribuku.php");
          }elseif($include=='tag'){
            include("include/tag.php");
          }elseif($include=='tambah-tag'){
            include("include/tambahtag.php");
          }elseif($include=='edit-tag'){
            include("include/edittag.php");
          }elseif($include=='penerbit'){
            include("include/penerbit.php");
          }elseif($include=='tambah-penerbit'){
            include("include/tambahpenerbit.php");
          }elseif($include=='edit-penerbit'){
            include("include/editpenerbit.php");
          }elseif($include=='kategori-blog'){
            include("include/kategoriblog.php");
          }elseif($include=='tambah-kategori-blog'){
            include("include/tambahkategoriblog.php");
          }elseif($include=='edit-kategori-blog'){
            include("include/editkategoriblog.php");
          }elseif($include=='konten'){
            include("include/konten.php");
          }elseif($include=='edit-konten'){
            include("include/editkonten.php");
          }elseif($include=='detail-konten'){
            include("include/detailkonten.php");
          }elseif($include=='buku'){
            include("include/buku.php");
          }elseif($include=='edit-buku'){
            include("include/editbuku.php");
          }elseif($include=='detail-buku'){
            include("include/detailbuku.php");
          }elseif($include=='tambah-buku'){
            include("include/tambahbuku.php");
          }elseif($include=='blog'){
            include("include/blog.php");
          }elseif($include=='edit-blog'){
            include("include/editblog.php");
          }elseif($include=='detail-blog'){
            include("include/detailblog.php");
          }elseif($include=='tambah-blog'){
            include("include/tambahblog.php");
          }elseif($include=='user'){
            include("include/user.php");
          }elseif($include=='edit-user'){
            include("include/edituser.php");
          }elseif($include=='tambah-user'){
            include("include/tambahuser.php");
          }elseif($include=='detail-user'){
            include("include/detailuser.php");
          }elseif($include=='ubah-password'){
            include("include/ubahpassword.php");
          }elseif($include=='signout'){
            include("include/signout.php");
          }else{
            include("include/profil.php");
          } ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
    </div>
    <!-- ./wrapper -->
    <?php include("includes/script.php") ?>
</body>
<?php
      }else{
          include("include/login.php");
      }
    }else{
      if(isset($_SESSION['id_user'])){ ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
            <?php
          include("include/profil.php");
          ?>
        </div>
        <!-- ./wrapper -->
        <?php include("includes/script.php") ?>
</body>
<?php
      }else{
          include("include/login.php");
      }
    }
?>

</html>