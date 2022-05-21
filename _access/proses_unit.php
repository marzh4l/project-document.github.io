<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = $_POST['id'];
    $unit = $_POST['unit'];
    $pejabat = $_POST['pejabat'];
    $NIP = $_POST['NIP'];
    $waktu = date("H:i:s");
    $aktivitas = 'Input Data Unit '.$unit;
    $aktivitas2 = 'Input Data Unit gagal karena data '.$unit.'sudah ada';

    $query = mysqli_query($conn,"select unit from unit where unit = '$unit'");
	$d = mysqli_fetch_array($query);
    if($d > 0){
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas2','$waktu','$id')");
        header("location:index.php?page=unit&pesan=warning");
    } else {
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
    // menginput data ke database
        $sql = mysqli_query($conn,"INSERT INTO `unit`(`id_unit`, `unit`, `pejabat`, `NIP`) VALUES ('','$unit','$pejabat','$NIP')");
        if($sql && $query_aktivitas){
            // mengalihkan halaman kembali ke index.php
            header("location:index.php?page=unit&pesan=sukses");
        } else {
            header("location:index.php?page=unit&pesan=gagal");   
        }
    }
?>