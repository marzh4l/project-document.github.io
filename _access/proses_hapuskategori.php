<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = @$_POST['id'];
    $waktu = date("H:i:s");
    $id_kategori = @$_POST['id_kategori'];
    if($id_kategori == ''){
        header("location:index.php?page=kategori&pesan=pilih");
        } else {
        for ($i=0; $i < count($id_kategori); $i++){
            $query_id = mysqli_query($conn,"SELECT `kategori` FROM `kategori` WHERE id_kategori = '$id_kategori[$i]'");
            $d = mysqli_fetch_array($query_id);
            @$pilih .= $d['kategori'].', ';      
            // menginput data ke database
            // echo $id_document[$i];
            
            $query = mysqli_query($conn, "DELETE FROM `kategori` WHERE id_kategori = '$id_kategori[$i]'"); // Buat variabel $query untuk menampung
            if($query){
            //     // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=kategori&pesan=suksesHapus");
            } else {
                header("location:index.php?page=kategori&pesan=gagalHapus");   
            }
        }
        $aktivitas = 'Hapus Data Kategori '.$pilih_kategori = substr($pilih, 0, -2);
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
    }
    
?>