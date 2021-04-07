<?php 
    $id_kategori_buku = $_POST['kategori_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $id_penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $tag = $_POST['tag'];
    $lokasi_file = $_FILES['cover']['tmp_name'];
    $nama_file = $_FILES['cover']['name'];
    $direktori = 'cover/'.$nama_file;
    if(empty($id_kategori_buku)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=kategoribuku");
    }else if(empty($judul)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=judul");
    }else if(empty($pengarang)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=pengarang");
    }else if(empty($id_penerbit)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=penerbit");
    }else if(empty($tahun_terbit)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=tahunterbit");
    }else if(empty($tag)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=tag");
    }else if(!move_uploaded_file($lokasi_file,$direktori)){
        header("Location:index.php?include=tambah-buku&notif=tambahkosong&jenis=cover");
    }else{
        $sql = "INSERT INTO `buku` 
        (`id_kategori_buku`,`judul`,`pengarang`,`id_penerbit`,`tahun_terbit`,`sinopsis`,`cover`) VALUES ('$id_kategori_buku','$judul','$pengarang','$id_penerbit','$tahun_terbit','$sinopsis','$nama_file')";
        mysqli_query($koneksi, $sql);
        $id_buku = mysqli_insert_id($koneksi);
        if(!empty($_POST['tag'])){
            foreach($_POST['tag'] as $id_tag){
                $sql_i = "INSERT INTO `tag_buku` (`id_buku`,`id_tag`) VALUES ('$id_buku','$id_tag')";
                mysqli_query($koneksi, $sql_i);
            } 
        }
        header("Location:index.php?include=buku&notif=tambahberhasil");
    }
?>