<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = @$_POST['id'];
    $waktu = date("H:i:s");
    $id_unit = @$_POST['id_unit'];
    if($id_unit == ''){
        header("location:index.php?page=unit&pesan=pilih");
    } else {
        for ($i=0; $i < count($id_unit); $i++){
            $query_id = mysqli_query($conn,"SELECT `unit` FROM `unit` WHERE id_unit = '$id_unit[$i]'");
            $d = mysqli_fetch_array($query_id);
            @$pilih .= $d['unit'].', ';
            // menginput data ke database
            // echo $id_document[$i];
            $query = mysqli_query($conn, "DELETE FROM `unit` WHERE id_unit = '$id_unit[$i]'"); // Buat variabel $query untuk menampung
            if($query){
            //     // mengalihkan halaman kembali ke index.php
                header("location:index.php?page=unit&pesan=suksesHapus");
            } else {
                header("location:index.php?page=unit&pesan=gagalHapus");   
            }
        }
        $aktivitas = 'Hapus Data Unit '.$pilih_kategori = substr($pilih, 0, -2);
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
    }
?>