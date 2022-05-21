<?php 
    // koneksi database
    include '../db/config.php';
    date_default_timezone_set('Asia/Jakarta');

    // menangkap data yang di kirim dari form
    $id = $_POST['id'];
    $waktu = date("H:i:s");
    $aktivitas2 = 'Gagal Input Document, ukuran file terlalu besar';
    $aktivitas3 = 'Gagal Input Document, Ekstensi file bukan PDF';

    $nm_document = @$_POST['nm_document'];
    $no_surat = @$_POST['no_surat'];
    $aktivitas = 'Input Data document No. Surat '.$no_surat;
    $deskripsi = @$_POST['deskripsi'];
    $id_kategori = @$_POST['id_kategori'];
    $id_akses = @$_POST['id_akses'];
    $id_unit = @$_POST['id_unit'];
    $tgl = $_POST['tanggal_document'];
    // $waktu = date("h:i:sa");
    $tanggal = date('Y-m-d', strtotime($tgl));
    $tanggal_upload = date('Y-m-d H:i:s');
    $status = @$_POST['status'];
    $penandatangan = @$_POST['penandatangan'];
    
    $ekstensi_diperbolehkan    = array('pdf');
    $nama_file    = "file_".$nm_document.".pdf";
    $x        = explode('.', $nama_file);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['file']['size'];
    $file_tmp    = $_FILES['file']['tmp_name']; 
     
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){ 
            move_uploaded_file($file_tmp, 'pdf/'.$nama_file);
                $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas','$waktu','$id')");
                // menginput data ke database
                $sql = mysqli_query($conn,"INSERT INTO `documen`(`id_document`, `nm_document`, `no_surat`, `deskripsi`, `id_kategori`, `id_akses`, `id_unit`, `tanggal_document`, `tanggal_upload`, `status`, `file_pdf`, `penandatangan`) VALUES ('','$nm_document','$no_surat','$deskripsi','$id_kategori','$id_akses','$id_unit','$tanggal','$tanggal_upload','$status','$nama_file','$penandatangan')");
                if($sql && $query_aktivitas){
                    // mengalihkan halaman kembali ke index.php
                    header("location:index.php?page=data_document&pesan=sukses");
                } else {
                    header("location:index.php?page=data_document&pesan=gagal");   
                }
            
        }
        else{
            $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas2','$waktu','$id')");
            header("location:index.php?page=data_document&pesan=ukuran");
        }
    }
    else{
        $query_aktivitas = mysqli_query($conn,"INSERT INTO `aktivitas`(`id_aktivitas`, `aktivitas`, `waktu`, `id_Log`) VALUES ('','$aktivitas3','$waktu','$id')");
        header("location:index.php?page=data_document&pesan=tipe");
    }
?>