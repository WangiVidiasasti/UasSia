<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
include "../lib/function.php"; // Pastikan file ini berisi definisi fungsi Insert_Data()

$baseURL = "http://localhost/UasSia"; // Pastikan URL ini sesuai dengan path proyek Anda
$time = date("Y-m-d H:i:s"); // Inisialisasi $time

if (isset($_POST['insert_karyawan'])) {
    $data = array(
        'nama_karyawan' => mysqli_real_escape_string($koneksi, $_POST['nama_karyawan']),
        'alamat' => mysqli_real_escape_string($koneksi, $_POST['alamat']),
        'no_telp' => mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        'email' => mysqli_real_escape_string($koneksi, $_POST['email']),
        'status_pekerjaan' => mysqli_real_escape_string($koneksi, $_POST['status_pekerjaan']),
        'tempat_lahir' => mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']),
        'tanggal_lahir' => mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']),
        'tanggal_masuk' => mysqli_real_escape_string($koneksi, $_POST['tanggal_masuk']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_karyawan", $data);
    header("Location: " . $baseURL . "/index.php?link=karyawan");
    exit();
}
?>
