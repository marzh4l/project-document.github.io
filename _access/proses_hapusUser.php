<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = @$_POST['id'];
    $waktu = date("H:i:s");
    // menangkap data yang di kirim dari form
    $id_akses = @$_POST['id_akses'];
    
    if($id_akses == ''){
        header("location:index.php?page=user&pesan=pilih");
    } else {
        for ($i=0; $i < count($id_akses); $i++){
            $query_id = mysqli_query($conn,"SELECT `nama` FROM `akses` WHERE id_akses = '$id_akses[$i]'");
            $d = mysqli_fetch_array($query_id);
            @$pilih .= $d['nama'].', ';
            // menginput data ke database
            // echo $id_document[$i];
            $query = mysqli_query($conn, "DELETE FROM `akses` WHERE id_akses = '$id_akses[$i]'"); // Buat variabel $query untuk menampung
            if($query){
            //     // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=user&pesan=suksesHapus");
            } else {
                header("location:index.php?page=user&pesan=gagalHapus");   
            }
        }
        $aktivitas = 'Hapus Data Akses User '.$pilih_kategori = substr($pilih, 0, -2);
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
    }
?>