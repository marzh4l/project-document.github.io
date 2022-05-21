<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set('Asia/Jakarta');

    // menangkap data yang di kirim dari form
    $nm_document = $_POST['nm_document'];
    $sk = $_POST['sk'];
    $deskripsi = $_POST['deskripsi'];
    $id_kategori = $_POST['id_kategori'];
    $id_akses = $_POST['id_akses'];
    $id_unit = $_POST['id_unit'];
    $tgl_document = $_POST['tanggal_document'];
    $tanggal_document = date('Y-m-d', strtotime($tgl_document));
    $time = date("Y-m-d h:i:sa");
    $tanggal_upload = date('Y-m-d H:i:s', strtotime($time));
    $status = $_POST['status'];
    $penandatangan = $_POST['penandatangan'];
    
    $ekstensi_diperbolehkan    = array('pdf');
    $nama_file    = "file_".$nm_document.".pdf";
    $x        = explode('.', $nama_file);
    $ekstensi    = strtolower(end($x));
    echo $ukuran        = $_FILES['file']['size'];
    echo $file_tmp    = $_FILES['file']['tmp_name']; 
     
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){ 
            move_uploaded_file($file_tmp, '../_access/pdf/'.$nama_file);
            
                // menginput data ke database
                $sql = mysqli_query($conn,"INSERT INTO `documen`(`id_document`, `nm_document`, `sk`, `deskripsi`, `id_kategori`, `id_akses`, `id_unit`, `tanggal_document`,`tanggal_upload`, `status`, `file_pdf`, `penandatangan`) VALUES ('','$nm_document','$sk','$deskripsi','$id_kategori','$id_akses','$id_unit','$tanggal_document','$tanggal_upload','$status','$nama_file','$penandatangan')");
                if($sql){
                    // mengalihkan halaman kembali ke index.php
                    header("location:index.php?page=data_document&pesan=sukses");
                } else {
                    header("location:index.php?page=data_document&pesan=gagal");   
                }
            
        }
        else{
            header("location:index.php?page=data_document&pesan=ukuran");
        }
    }
    else{
        header("location:index.php?page=data_document&pesan=tipe");
    }
?>