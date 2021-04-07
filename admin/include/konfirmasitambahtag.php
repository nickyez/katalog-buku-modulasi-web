<?php 
    include('koneksi/koneksi.php');
    $tag = $_POST['tag'];
    if(empty($tag)){
        header("Location:index.php?include=tambah-tag&notif=tambahkosong");
    }else{
        $sql = "INSERT INTO `tag` (`tag`) values ('$tag')";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=tag&notif=tambahberhasil");
    }
?>