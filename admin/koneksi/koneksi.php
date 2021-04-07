<?php
    $koneksi = mysqli_connect(
        'localhost', 
        'root',
        '',
        'kuliah_katalog_buku'
    );

    if(!$koneksi) {
        die('Error Koneksi: '.mysqli_connect_errno());
    }
?>