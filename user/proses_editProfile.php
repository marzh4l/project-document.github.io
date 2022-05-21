<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_akses = $_POST['id_akses'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ekstensi_diperbolehkan    = array('jpg','jpeg','png');
    $nama_file    = "avatar_".$nm_document."v1.png";
    $x        = explode('.', $nama_file);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['file']['size'];
    $file_tmp    = $_FILES['avatar']['tmp_name']; 
    
    if($file_tmp == ''){
        // menginput data ke database
        $sql = mysqli_query($conn,"UPDATE `akses` SET `nama`='$nama',`username`='$username',`password`='$password',`avatar`='$nama_file' WHERE `id_akses` = '$id_akses'");
        if($sql){
            // mengalihkan halaman kembali ke index.php
            header("location:index.php?page=editProfile&pesan=suksesEdit");
        } else {
            header("location:index.php?page=editProfile&pesan=gagalRdit");   
        }
    } else {
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp, 'profile/'.$nama_file);
                
                // menginput data ke database
                $sql = mysqli_query($conn,"UPDATE `akses` SET `nama`='$nama',`username`='$username',`password`='$password',`avatar`='$nama_file' WHERE `id_akses` = '$id_akses'");
                if($sql){
                    // mengalihkan halaman kembali ke index.php
                    header("location:index.php?page=editProfile&pesan=suksesEdit");
                } else {
                    header("location:index.php?page=editProfile&pesan=gagalRdit");   
                }
            }
            else{
                header("location:index.php?page=editProfile&pesan=ukuran");
            }
        }
        else{
            header("location:index.php?page=editProfile&pesan=tipe");
        }
    }

?>