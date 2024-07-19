<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
include "../lib/function.php"; // Pastikan file ini berisi definisi fungsi Insert_Data()

$baseURL = "http://localhost/UasSia"; // Pastikan URL ini sesuai dengan path proyek Anda
$time = date("Y-m-d H:i:s"); // Inisialisasi $time

// update master agama
if (isset($_POST['update_karyawan'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_karyawan']),
        mysqli_real_escape_string($koneksi, $_POST['nama_karyawan']),
        mysqli_real_escape_string($koneksi, $_POST['alamat']),
        mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        mysqli_real_escape_string($koneksi, $_POST['email']),
        mysqli_real_escape_string($koneksi, $_POST['status_pekerjaan']),
        mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']),
        mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']),
        mysqli_real_escape_string($koneksi, $_POST['tanggal_masuk']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_karyawan", $data);
    header("Location: " . $baseURL . "/index.php?link=karyawan");
}

if (isset($_POST['update_pengiriman'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_pengiriman']),
        mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        mysqli_real_escape_string($koneksi, $_POST['jarak']),
        mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_pengiriman", $data);
    header("Location: " . $baseURL . "/index.php?link=data_pengiriman");
}
if (isset($_POST['update_supplier'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_supplier']),
        mysqli_real_escape_string($koneksi, $_POST['nama_supplier']),
        mysqli_real_escape_string($koneksi, $_POST['nama_toko']),
        mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        mysqli_real_escape_string($koneksi, $_POST['alamat']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_supplier", $data);
    header("Location: " . $baseURL . "/index.php?link=data_supplier");
}

?>
