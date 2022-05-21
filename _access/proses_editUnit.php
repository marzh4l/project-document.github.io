<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_unit = $_POST['id_unit'];
    $unit = $_POST['unit'];
    $pejabat = $_POST['pejabat'];
    $NIP = $_POST['NIP'];
    // menginput data ke database
    $sql = mysqli_query($conn,"UPDATE `unit` SET `unit`='$unit', `pejabat`='$pejabat', `NIP`='$NIP' WHERE id_unit = '$id_unit'");
    if($sql){
        // mengalihkan halaman kembali ke index.php
        header("location:index.php?page=unit&pesan=suksesEdit");
    } else {
        header("location:index.php?page=unit&pesan=gagalRdit");   
    }
?>