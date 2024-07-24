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
if (isset($_POST['update_customer'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_customer']),
        mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        mysqli_real_escape_string($koneksi, $_POST['alamat']),
        mysqli_real_escape_string($koneksi, $_POST['password']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_customer", $data);
    header("Location: " . $baseURL . "/index.php?link=customer");
}
if (isset($_POST['update_barang'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_barang']),
        mysqli_real_escape_string($koneksi, $_POST['nama']),
        mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_barang", $data);
    header("Location: " . $baseURL . "/index.php?link=data_barang");
}
if (isset($_POST['update_jabatan'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_jabatan']),
        mysqli_real_escape_string($koneksi, $_POST['nama_jabatan']),
        mysqli_real_escape_string($koneksi, $_POST['gaji_pokok']),
        mysqli_real_escape_string($koneksi, $_POST['gaji_lembur']),
        mysqli_real_escape_string($koneksi, $_POST['potongan']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_jabatan", $data);
    header("Location: " . $baseURL . "/index.php?link=jabatan");
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
if (isset($_POST['update_status'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_status']),
        mysqli_real_escape_string($koneksi, $_POST['nama_status']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_status", $data);
    header("Location: " . $baseURL . "/index.php?link=status");
}
if (isset($_POST['update_katalog'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_katalog']),
        mysqli_real_escape_string($koneksi, $_POST['nama_katalog']),
        mysqli_real_escape_string($koneksi, $_POST['harga_katalog']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_katalog_laundry", $data);
    header("Location: " . $baseURL . "/index.php?link=data_katalog");
}

if (isset($_POST['update_harga_berat'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['id_berat']),
        mysqli_real_escape_string($koneksi, $_POST['kilogram']),
        mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_harga_berat", $data);
    header("Location: " . $baseURL . "/index.php?link=harga_berat");
}
if (isset($_POST['update_akun'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['no_akun']),
        mysqli_real_escape_string($koneksi, $_POST['nama_akun']),
        mysqli_real_escape_string($koneksi, $_POST['saldo']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("master_akun", $data);
    header("Location: " . $baseURL . "/index.php?link=data_akun");
}
if (isset($_POST['update_pesanan_laundry'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['kd_pesanan_laundry']),
        mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        mysqli_real_escape_string($koneksi, $_POST['nama_katalog']),
        mysqli_real_escape_string($koneksi, $_POST['nama_status']),
        mysqli_real_escape_string($koneksi, $_POST['total_harga']),
        mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("transaksi_pesanan_laundry", $data);
    header("Location: " . $baseURL . "/index.php?link=laundry_pesanan");
}
if (isset($_POST['update_pesanan_barang'])) {
    
    $data = array(
        'id_customer' => mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        'id_pengiriman' => mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        'id_barang' => mysqli_real_escape_string($koneksi, $_POST['nama']),
        'id_status' => mysqli_real_escape_string($koneksi, $_POST['nama_status']),
        'total_harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
        'no_akun_d' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        'no_akun_k' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
       

    );

        Insert_Data("transaksi_pesanan_barang", $data);
        header("Location: " . $baseURL . "/index.php?link=pesanan_barang");
        exit;
    }
if (isset($_POST['update_jam_keluar'])) {
    $time = date('Y-m-d H:i:s'); 

    $data = array(
        'id_detail_karyawan' => mysqli_real_escape_string($koneksi, $_POST['id_detail_karyawan']),
        'jam_keluar' => $time,
    );

    // Call the Update_Data function to update data
    Update_Data_Absen("detail_karyawan", $data);
    header("Location: " . $baseURL . "/index.php?link=data_absensi");
    exit();
}
if (isset($_POST['update_pengeluaran'])) {

    $data = array(
        mysqli_real_escape_string($koneksi, $_POST['kd_nota']),
        mysqli_real_escape_string($koneksi, $_POST['nama_supplier']),
        mysqli_real_escape_string($koneksi, $_POST['total_pengeluaran']),
        mysqli_real_escape_string($koneksi, $_POST['tanggal']),
        mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']),
    );

    // Call the Insert_Data function to insert data
    Update_Data("transaksi_pengeluaran", $data);
    header("Location: " . $baseURL . "/index.php?link=pengeluaran");
}

?>
