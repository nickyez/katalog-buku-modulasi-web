<?php 
    $kategori_buku = $_POST['kategori_buku'];
    if(empty($kategori_buku)){
        header("Location:index.php?include=tambah-kategori-buku&notif=tambahkosong");
    }else{
        $sql = "INSERT INTO `kategori_buku` (`kategori_buku`) values ('$kategori_buku')";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=kategori-buku&notif=tambahberhasil");
    }
?>