<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set("Asia/Jakarta");

    // menangkap data yang di kirim dari form
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $waktu = date("H:i:s");
    $aktivitas = 'Input Data Kategori '.$kategori;
    $aktivitas2 = 'Input Data Kategori gagal karena data '.$kategori.'sudah ada';

    $query = mysqli_query($conn,"select kategori from kategori where kategori = '$kategori'");
	$d = mysqli_fetch_array($query);
    if($d > 0){
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas2','$waktu','$id')");
        header("location:index.php?page=kategori&pesan=warning");
    } else {
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
        // menginput data ke database
        $sql = mysqli_query($conn,"INSERT INTO `kategori`(`id_kategori`, `kategori`, `deskripsi`) VALUES ('','$kategori','$deskripsi')");
        if($sql){
            // mengalihkan halaman kembali ke index.php
            header("location:index.php?page=kategori&pesan=sukses");
        } else {
            header("location:index.php?page=kategori&pesan=gagal");   
        }
    }
?>