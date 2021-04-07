<?php 
session_start();
include('koneksi/koneksi.php');
if(isset($_SESSION['id_konten'])){
    $id_konten = $_SESSION['id_konten'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
 
    if(empty($judul)){
        header("Location:index.php?include=edit-konten&data=$id_konten&notif=editkosong&jenis=judul");
    }else if(empty($judul)){
        header("Location:index.php?include=edit-konten&data=$id_konten&notif=editkosong&jenis=isi");
    }else{
        $sql = "UPDATE `konten` SET `judul`='$judul',`isi`='$isi' WHERE `id_konten`='$id_konten'";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=konten&notif=editberhasil");
    }
}
?>