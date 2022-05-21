<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_akses = $_POST['id_akses'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $NIP = $_POST['NIP'];
    $id_unit = $_POST['id_unit'];
    $level = $_POST['level'];
    
    // menginput data ke database
    $sql = mysqli_query($conn,"UPDATE `akses` SET `nama`='$nama',`username`='$username',`password`='$password',`NIP`='$NIP',`id_unit`='$id_unit',`level`='$level' WHERE `id_akses` = '$id_akses'");
    if($sql){
        // mengalihkan halaman kembali ke index.php
        header("location:index.php?page=user&pesan=suksesEdit");
    } else {
        header("location:index.php?page=user&pesan=gagalRdit");   
    }

?>