<?php 
	include '../db/config.php';
    // mengaktifkan session
    session_start();

    // menghapus semua session
    session_destroy();

    // mengalihkan halaman sambil mengirim pesan logout
    date_default_timezone_set("Asia/Jakarta");
	$tanggal = date('Y-m-d H:i:s');
    $id =$_GET['id'];
	$query_log = mysqli_query($conn,"UPDATE `log_akses` SET `logout`='$tanggal' WHERE `id_log` = '$id'");
    if($query_log){
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
    header("location: ../login/index.php?pesan=logout");

?>