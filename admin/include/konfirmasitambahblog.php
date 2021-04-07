<?php 
    $id_user = $_SESSION['id_user'];
    $id_kategori_blog = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    if(empty($id_kategori_blog)){
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=kategoriblog");
    }else if(empty($judul)){
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=judul");
    }else if(empty($isi)){
        header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=isi");
    }else{
        $sql = "INSERT INTO `blog` 
        (`id_kategori_blog`,`id_user`,`judul`,`isi`,`tanggal`) VALUES ('$id_kategori_blog','$id_user','$judul','$isi',DATE_FORMAT(CURRENT_TIMESTAMP(), '%Y-%c-%d'))";
        mysqli_query($koneksi, $sql);
        $id_blog = mysqli_insert_id($koneksi);
        header("Location:index.php?include=blog&notif=tambahberhasil");
    }
?>