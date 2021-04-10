<?php
    if (isset($_SESSION['id_blog'])) {
        $id_blog =  $_SESSION['id_blog'];
        $id_user = $_POST['id_user'];
        $date = $_POST['tanggal'];
        $id_kategori = $_POST['kategori_blog'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];

        if(empty($id_kategori)){
            header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=kategoriblog");
        }else if(empty($judul)){
         header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=judul");
        }else if(empty($isi)){
            header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=isi");
        }

        else {
            $sql = "UPDATE blog SET id_kategori_blog = '$id_kategori', tanggal='$date', judul= '$judul', isi= '$isi' 
            WHERE id_blog = '$id_blog'";

            mysqli_query($koneksi,$sql);
            unset($_SESSION['id_blog']);
            header("Location:index.php?include=blog&notif=tambahberhasil");

            }

    }



?>
