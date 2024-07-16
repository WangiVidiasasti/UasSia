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
if (isset($_POST['insert_jabatan'])) {
    $data = array(
        'nama_jabatan' => mysqli_real_escape_string($koneksi, $_POST['nama_jabatan']),
        'gaji_pokok' => mysqli_real_escape_string($koneksi, $_POST['gaji_pokok']),
        'Gaji_lembur' => mysqli_real_escape_string($koneksi, $_POST['Gaji_lembur']),
        'potongan' => mysqli_real_escape_string($koneksi, $_POST['potongan']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_jabatan", $data);
    header("Location: " . $baseURL . "/index.php?link=data_jabatan");
    exit();
}
if (isset($_POST['insert_barang'])) {
    $data = array(
        'nama' => mysqli_real_escape_string($koneksi, $_POST['nama']),
        'harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_barang", $data);
    header("Location: " . $baseURL . "/index.php?link=data_barang");
    exit();
}
if (isset($_POST['insert_katalog'])) {
    $data = array(
        'nama_katalog' => mysqli_real_escape_string($koneksi, $_POST['nama_katalog']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_katalog_laundry", $data);
    header("Location: " . $baseURL . "/index.php?link=data_katalog");
    exit();
}
if (isset($_POST['insert_pengiriman'])) {
    $data = array(
        'nama_pengiriman' => mysqli_real_escape_string($koneksi, $_POST['nama_prngiriman']),
        'jarak' => mysqli_real_escape_string($koneksi, $_POST['jarak']),
        'harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_pengiriman", $data);
    header("Location: " . $baseURL . "/index.php?link=data_pengiriman");
    exit();
}
?>
