<?php 
    // koneksi database
    include '../db/config.php';
	date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nama2 = @$_POST['nama2'];
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $NIP = @$_POST['NIP'];
    $id_unit = @$_POST['id_unit'];
    $id_unit2 = @$_POST['id_unit2'];
    $level = @$_POST['level'];

	$waktu = date("H:i:s");
	
    if($nama2 == '' && $id_unit2 == ''){
        // $nama;
        // $id_unit;
        $aktivitas = 'Input Data User '.$nama;
        $query = mysqli_query($conn,"SELECT nama FROM akses WHERE NIP = '$NIP'");
        $d = mysqli_fetch_array($query);
        if($d > 0){
            header("location:index.php?page=user&pesan=warning");
        } else {
            $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
            // menginput data ke database
            $sql = mysqli_query($conn,"INSERT INTO `akses`(`id_akses`, `nama`, `username`, `password`,`NIP`, `id_unit`, `level`) VALUES ('','$nama','$username','$password','$NIP','$id_unit','$level')");
            if($sql && $query_aktivitas){
                // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=user&pesan=suksesEdit");
            } else {
                header("location:index.php?page=user&pesan=gagalEdit");   
            }
        }
    } else {
        // $nama2;
        // $id_unit2;
        $aktivitas = 'Input Data User '.$nama2;
        $query = mysqli_query($conn,"SELECT nama FROM akses WHERE NIP = '$NIP'");
        $d = mysqli_fetch_array($query);
        if($d > 0){
            header("location:index.php?page=user&pesan=warning");
        } else {
            $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
            // menginput data ke database
            $sql = mysqli_query($conn,"INSERT INTO `akses`(`id_akses`, `nama`, `username`, `password`,`NIP`, `id_unit`, `level`) VALUES ('','$nama2','$username','$password','$NIP','$id_unit2','$level')");
            if($sql && $query_aktivitas){
                // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=user&pesan=suksesEdit");
            } else {
                header("location:index.php?page=user&pesan=gagalEdit");   
            }
        }
    }
    
?>