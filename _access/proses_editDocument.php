<?php 
    // koneksi database
    include '../db/config.php';

    // menangkap data yang di kirim dari form
    $id_document = $_POST['id_document'];
    $nm_document = $_POST['nm_document'];
    $no_surat = $_POST['no_surat'];
    $deskripsi = $_POST['deskripsi'];
    $id_kategori = $_POST['id_kategori'];
    $id_akses = $_POST['id_akses'];
    $id_unit = $_POST['id_unit'];
    $tgl = $_POST['tanggal'];
    $tanggal = date('Y-m-d', strtotime($tgl));
    $status = $_POST['status'];
    $penandatangan = $_POST['penandatangan'];
    
    $ekstensi_diperbolehkan    = array('pdf');
    $nama_file    = "file_".$nm_document."v1.pdf";
    $x        = explode('.', $nama_file);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['file']['size'];
    $file_tmp    = $_FILES['file']['tmp_name']; 
    
    if($file_tmp == ''){
        
        // menginput data ke database
        $sql = mysqli_query($conn,"UPDATE `documen` SET `id_document`='$id_document',`nm_document`='$nm_document',`no_surat`='$no_surat',`deskripsi`='$deskripsi',`id_kategori`='$id_kategori',`id_akses`='$id_akses',`id_unit`='$id_unit',`tanggal`='$tanggal',`status`='$status',`penandatangan`='$penandatangan' WHERE id_document = '$id_document'");
        if($sql){
            // mengalihkan halaman kembali ke index.php
            header("location:index.php?page=data_document&pesan=suksesEdit");
        } else {
            header("location:index.php?page=data_document&pesan=gagalEdit");   
        }
    } else {
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp, 'pdf/'.$nama_file);
                
                    // menginput data ke database
                    $sql = mysqli_query($conn,"UPDATE `documen` SET `id_document`='$id_document',`nm_document`='$nm_document',`no_surat`='$no_surat',`deskripsi`='$deskripsi',`id_kategori`='$id_kategori',`id_akses`='$id_akses',`id_unit`='$id_unit',`tanggal`='$tanggal',`status`='$status',`file_pdf`='$nama_file',`penandatangan`='$penandatangan' WHERE id_document = '$id_document'");
                    if($sql){
                        // mengalihkan halaman kembali ke index.php
                        header("location:index.php?page=data_document&pesan=suksesEdit");
                    } else {
                        header("location:index.php?page=data_document&pesan=gagalEdit");   
                    }
                
            }
            else{
                header("location:index.php?page=data_document&pesan=ukuran");
            }
        }
        else{
            header("location:index.php?page=data_document&pesan=tipe");
        }
    }
?>