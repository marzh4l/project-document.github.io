<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    // menginput data ke database
    $sql = mysqli_query($conn,"UPDATE `kategori` SET `kategori`='$kategori',`deskripsi`='$deskripsi' WHERE id_kategori = '$id_kategori'");
    if($sql){
        // mengalihkan halaman kembali ke index.php
        header("location:index.php?page=kategori&pesan=suksesEdit");
    } else {
        header("location:index.php?page=kategori&pesan=gagalRdit");   
    }
?>