<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../db/config.php';
include("../db/UserInformation.php");
date_default_timezone_set("Asia/Jakarta");

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($conn,"select id_akses,nama,id_unit,NIP,level,avatar from akses where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($cek > 0){
    // echo $data['level'];
    $_SESSION['status'] = "login";
	$_SESSION['username'] = $username;
	$_SESSION['id_akses'] = $data['id_akses'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['NIP'] = $data['NIP'];
	$_SESSION['id_unit'] = $data['id_unit'];
	$_SESSION['avatar'] = $data['avatar'];
    if($data['level'] == "Admin"){
        $_SESSION['status'] = "login";
        $_SESSION['id_akses'] = $data['id_akses'];
        $_SESSION['level'] = $data['level'];
        $id_akses = $data['id_akses'];
		$IP = UserInfo::get_ip();
        $_SESSION['ip'] = $IP;
		$OS = UserInfo::get_os();
		$Browser = UserInfo::get_browser();
		$device = UserInfo::get_device();
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		// echo "My Name Computer :".$hostname;
        $tanggal = date('Y-m-d H:i:s');
        $_SESSION['tanggal'] = $tanggal;
        $query_log = mysqli_query($conn,"INSERT INTO `log_akses`(`id_log`, `id_akses`, `ip_address`, `sistem_operasi`, `browser`, `device`, `nama_computer`, `login`, `logout`) VALUES ('','$id_akses','$IP','$OS','$Browser','$device','$hostname','$tanggal','')");
        header("location: ../_access/index.php");
    }else if($data['level'] == "User"){
        $_SESSION['level'] = $data['level'];
        header("location: ../user/index.php");
        // echo 'ini user';
    }
    
}else{
	header("location:index.php?pesan=gagal");
}
?>