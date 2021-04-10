<?php
    $id_user = $_POST['id_user'];
    $date = $_POST['tanggal'];
    $id_kategori = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (empty($id_kategori)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=blog");
    }elseif (empty($judul)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=judul");
    }elseif (empty($isi)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=isi");
    }
    else {
        $sql = "INSERT INTO blog (id_kategori_blog, id_user, tanggal, judul, isi) VALUES ('$id_kategori', '$id_user', '$date', '$judul', '$isi')";
       mysqli_query($koneksi,$sql);
       header("Location:index.php?include=blog&notif=tambahberhasil");
        }
?>
