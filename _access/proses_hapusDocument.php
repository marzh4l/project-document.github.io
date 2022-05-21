<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = @$_POST['id'];
    $waktu = date("H:i:s");
    // menangkap data yang di kirim dari form
    $id_document = $_POST['id_document'];
    if($id_document == ''){
        header("location:index.php?page=data_document&pesan=pilih");
    } else {
        for ($i=0; $i < count($id_document); $i++){
            $query_id = mysqli_query($conn,"SELECT `nm_document` FROM `documen` WHERE id_document = '$id_document[$i]'");
            $d = mysqli_fetch_array($query_id);
            @$pilih .= $d['nm_document'].', ';
        // menginput data ke database
        // echo $id_document[$i];
            $query = mysqli_query($conn, "DELETE FROM `documen` WHERE id_document = '$id_document[$i]'"); // Buat variabel $query untuk menampung
            if($query){
            //     // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=data_document&pesan=suksesHapus");
            } else {
                header("location:index.php?page=data_document&pesan=gagalHapus");   
            }
        }
        $aktivitas = 'Hapus Data Unit '.$pilih_kategori = substr($pilih, 0, -2);
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
    }
?>