<?php
    $id_kategori_blog = $_POST['id_kategori_blog'];
    $kategori_blog = $_POST['kategori_blog'];
    
    if(empty($kategori_blog)){
        header("Location:index.php?include=tambah-kategori-blog&data=$id_kategori_blog&notif=tambahkosong&jenis=Kategori Blog");
    }else{
        $sql = "INSERT INTO `kategori_blog` (`id_kategori_blog`, `kategori_blog`)
                VALUES ('$id_kategori_blog', '$kategori_blog')";
        mysqli_query($koneksi,$sql);
        header("Location:index.php?include=kategori-blog&notif=tambahberhasil");
    }
?>