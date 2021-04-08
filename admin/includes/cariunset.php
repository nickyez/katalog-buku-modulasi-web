<?php
    if($include=="blog"){
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="buku"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="kategori-blog"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="kategori-buku"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="konten"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="penerbit"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_tag']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="tag"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_user']);
    }else if($include=="user"){
        unset($_SESSION['katakunci_blog']);
        unset($_SESSION['katakunci_buku']);
        unset($_SESSION['katakunci_kat_blog']);
        unset($_SESSION['katakunci_kat_buku']);
        unset($_SESSION['katakunci_konten']);
        unset($_SESSION['katakunci_penerbit']);
        unset($_SESSION['katakunci_tag']);
    }
?>