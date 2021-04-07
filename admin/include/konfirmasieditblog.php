<?php 
    $id_user = $_SESSION['id_user'];
    $id_blog = $_SESSION['id_blog'];
    $id_kategori_blog = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    if(empty($id_kategori_blog)){
        header("Location:index.php?include=edit-blog&notif=editkosong&jenis=kategoriblog");
    }else if(empty($judul)){
        header("Location:index.php?include=edit-blog&notif=editkosong&jenis=judul");
    }else if(empty($isi)){
        header("Location:index.php?include=edit-blog&notif=editkosong&jenis=isi");
    }else{
        // $id_blog = mysqli_insert_id($koneksi);
        $sql = "UPDATE `blog` SET `id_kategori_blog`='$id_kategori_blog',`id_user`='$id_user',`judul`='$judul', `isi`='$isi',`tanggal`=DATE_FORMAT(CURRENT_TIMESTAMP(), '%Y-%c-%d') WHERE `id_blog` = '$id_blog'";
        unset($_SESSION['sql']);
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=blog&notif=editberhasil");
    }
?>