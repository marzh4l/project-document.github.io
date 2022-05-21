<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_document = $_POST['id_document'];
    if($id_document == ''){
        header("location:index.php?page=data_document&pesan=pilih");
    } else {
        for ($i=0; $i < count($id_document); $i++){
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
    }
?>