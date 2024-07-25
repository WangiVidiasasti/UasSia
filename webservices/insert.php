<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
include "../lib/function.php"; // Pastikan file ini berisi definisi fungsi Insert_Data()

$baseURL = "http://localhost/UasSia"; // Pastikan URL ini sesuai dengan path proyek Anda

$time = date('Y-m-d H:i:s'); // Atau format waktu lain sesuai kebutuhan Anda


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
if (isset($_POST['insert_customer'])) {
    $data = array(
        'nama_customer' => mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        'no_telp' => mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        'alamat' => mysqli_real_escape_string($koneksi, $_POST['alamat']),
        'password' => mysqli_real_escape_string($koneksi, $_POST['password']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_customer", $data);
    header("Location: " . $baseURL . "/index.php?link=customer");
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
    header("Location: " . $baseURL . "/index.php?link=jabatan");
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
        'nama_pengiriman' => mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        'jarak' => mysqli_real_escape_string($koneksi, $_POST['jarak']),
        'harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_pengiriman", $data);
    header("Location: " . $baseURL . "/index.php?link=data_pengiriman");
    exit();
}
if (isset($_POST['insert_status'])) {
    $data = array(
        'nama_status' => mysqli_real_escape_string($koneksi, $_POST['nama_status']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_status", $data);
    header("Location: " . $baseURL . "/index.php?link=status");
    exit();
}
if (isset($_POST['insert_supplier'])) {
    $data = array(
        'nama_supplier' => mysqli_real_escape_string($koneksi, $_POST['nama_supplier']),
        'nama_toko' => mysqli_real_escape_string($koneksi, $_POST['nama_toko']),
        'no_telp' => mysqli_real_escape_string($koneksi, $_POST['no_telp']),
        'alamat' => mysqli_real_escape_string($koneksi, $_POST['alamat']),
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_supplier", $data);
    header("Location: " . $baseURL . "/index.php?link=data_supplier");
    exit();
}
if (isset($_POST['insert_harga_berat'])) {
    $data = array(
        'kilogram' => mysqli_real_escape_string($koneksi, $_POST['kilogram']),
        'harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
       
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_harga_berat", $data);
    header("Location: " . $baseURL . "/index.php?link=harga_berat");
    exit();
}
if (isset($_POST['insert_akun'])) {
    $data = array(
        'no_akun' => mysqli_real_escape_string($koneksi, $_POST['no_akun']),
        'nama_akun' => mysqli_real_escape_string($koneksi, $_POST['nama_akun']),
        'saldo' => mysqli_real_escape_string($koneksi, $_POST['saldo']),
       
    );

    // Call the Insert_Data function to insert data
    Insert_Data("master_akun", $data);
    header("Location: " . $baseURL . "/index.php?link=data_akun");
    exit();
}
if (isset($_POST['insert_pesananlaundry'])) {
    
    $data = array(
        'id_customer' => mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        'id_pengiriman' => mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        'id_katalog' => mysqli_real_escape_string($koneksi, $_POST['nama_katalog']),
        'id_status' => mysqli_real_escape_string($koneksi, $_POST['nama_status']),
        'total_harga' => mysqli_real_escape_string($koneksi, $_POST['harga']),
        'no_akun_d' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        'no_akun_k' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
       

    );

        Insert_Data("transaksi_pesanan_laundry", $data);
        header("Location: " . $baseURL . "/index.php?link=laundry_pesanan");
        exit;
    }

if (isset($_POST['insert_pesananbarang'])) {
    $data = array(
        'id_customer' => mysqli_real_escape_string($koneksi, $_POST['nama_customer']),
        'id_pengiriman' => mysqli_real_escape_string($koneksi, $_POST['nama_pengiriman']),
        'id_barang' => mysqli_real_escape_string($koneksi, $_POST['nama']),
        'id_status' => mysqli_real_escape_string($koneksi, $_POST['nama_status']),
        'no_akun_d' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        'no_akun_k' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']),
    );

    // Asumsi Insert_Data mengembalikan ID pesanan barang yang baru dimasukkan
    $kd_pesanan_barang = Insert_Data("transaksi_pesanan_barang", $data);

    if ($kd_pesanan_barang) {
        Update_Total_Harga_Barang($kd_pesanan_barang);
    } else {
        die("Error: Gagal memasukkan data pesanan barang.");
    }

    header("Location: " . $baseURL . "/index.php?link=pesanan_barang");
    exit;
}


    // if (isset($_POST['insert_pengeluaran'])) {
    
    //     $data = array(
    //         'kd_supplier' => mysqli_real_escape_string($koneksi, $_POST['nama_supplier']),
    //         'total_pengeluaran' => mysqli_real_escape_string($koneksi, $_POST['total_pengeluaran']),
    //         'tanggal' => mysqli_real_escape_string($koneksi, $_POST['tanggal']),
    //         'no_akun_d' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
    //         'no_akun_k' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']),
           
    
    //     );
    
    //         Insert_Data("transaksi_pengeluaran", $data);
    //         header("Location: " . $baseURL . "/index.php?link=pengeluaran");
    //         exit;
    //     }

if (isset($_POST['insert_pengeluaran'])) {
    $kd_supplier = mysqli_real_escape_string($koneksi, $_POST['nama_supplier']);
    $total_pengeluaran = mysqli_real_escape_string($koneksi, $_POST['total_pengeluaran']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $no_akun_d = mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']);
    $no_akun_k = mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']);

    $data_pengeluaran = array(
        'kd_supplier' => $kd_supplier,
        'total_pengeluaran' => $total_pengeluaran,
        'tanggal' => $tanggal,
        'no_akun_d' => $no_akun_d,
        'no_akun_k' => $no_akun_k,
    );

    // Insert data ke transaksi_pengeluaran
    Insert_Data("transaksi_pengeluaran", $data_pengeluaran);

    // Dapatkan kode_nota dari transaksi_pengeluaran
    $kode_nota = mysqli_insert_id($koneksi);

    // Kondisi untuk memasukkan data ke transaksi_hutang
    if ($no_akun_d == 201 && $no_akun_k == 101) {
        $data_hutang = array(
            'kd_nota' => $kode_nota,
            'jumlah_hutang' => $total_pengeluaran,
            'tanggal' => $tanggal,
            'no_akun_d' => $no_akun_d,
            'no_akun_k' => $no_akun_k,
            'status' => 'Belum Lunas',
        );

        // Insert data ke transaksi_hutang
        Insert_Data("transaksi_hutang", $data_hutang);
    }

    header("Location: " . $baseURL . "/index.php?link=pengeluaran");
    exit;
}


        if (isset($_POST['insert_penggajian'])) {
    
            $data = array(
                'id_detail_karyawan' => mysqli_real_escape_string($koneksi, $_POST['id_detail_karyawan']),
                'id_jabatan' => mysqli_real_escape_string($koneksi, $_POST['nama_jabatan']),
                'tanggal' => mysqli_real_escape_string($koneksi, $_POST['tanggal']),
                'gaji_pokok' => mysqli_real_escape_string($koneksi, $_POST['gaji_pokok']),
                'total_kerja' => mysqli_real_escape_string($koneksi, $_POST['total_kerja']),
                'THP' => mysqli_real_escape_string($koneksi, $_POST['take_home_pay']),
                'no_akun' => mysqli_real_escape_string($koneksi, $_POST['nama_akun']),
               
            );
        
                Insert_Data("transaksi_slip_penggajian", $data);
                header("Location: " . $baseURL . "/index.php?link=data_penggajian");
                exit;
            }
        
    
        if (isset($_POST['insert_data_absensi'])) {
         $jam_masuk = date("H:i:s"); // waktu saat ini
        $jam_keluar = date("H:i:s", strtotime('+8 hours')); // contoh penambahan waktu 8 jam
    
    //         Insert_Data("transaksi_pesanan_barang", $data);
    //         header("Location: " . $baseURL . "/index.php?link=pesanan_barang");
    //         exit;
         }
    
if (isset($_POST['insert_data_absensi'])) {
    date_default_timezone_set('Asia/Jakarta');
    $jam_masuk = date("H:i:s"); // waktu saat ini
    $jam_keluar = date("H:i:s", strtotime('+8 hours')); // contoh penambahan waktu 8 jam
    
    $data = array(
        'id_karyawan' => $_POST['nama_karyawan'],
        'hari' => $_POST['hari'],
        'tanggal' => $_POST['tanggal'],
        'jam_masuk' => $jam_masuk,
        'jam_keluar' => $jam_keluar,
    );
    
    // Panggil fungsi Insert_Data
    Insert_Data("detail_karyawan", $data);
    header("Location: " . $baseURL . "/index.php?link=data_absensi");
    exit;
}



if (isset($_POST['insert_validasi_pesanan_laundry'])) {
    
    $data = array(
        'kd_pesanan_laundry' => mysqli_real_escape_string($koneksi, $_POST['kd_pesanan_laundry']),
        'berat_baju' => mysqli_real_escape_string($koneksi, $_POST['berat_baju']),
    );

    // Insert data into detail_pesanan_laundry
    Insert_Data("detail_pesanan_laundry", $data);

    // Update total_harga
    Update_Total_Harga($data['kd_pesanan_laundry'], $data['berat_baju']);

    // Redirect to another page
    header("Location: " . $baseURL . "/index.php?link=laundry_pesanan");
    exit;
}
if (isset($_POST['insert_dataabsensi'])) {
    $time = date('Y-m-d H:i:s'); // Format waktu sesuai kebutuhan

    $data = array(
        'id_karyawan' => mysqli_real_escape_string($koneksi, $_POST['nama_karyawan']),
        'jam_masuk' => $time,
        // Anda bisa menambahkan kolom lain di sini jika diperlukan
    );

    // Call the Insert_Data function to insert data
    Insert_Data("detail_karyawan", $data);
    header("Location: " . $baseURL . "/index.php?link=data_absensi");
    exit();
}

if (isset($_POST['insert_pengeluaran'])) {
    $data = array(
        'kd_supplier' => mysqli_real_escape_string($koneksi, $_POST['nama_supplier']),
        'total_pengeluaran' => mysqli_real_escape_string($koneksi, $_POST['total_pengeluaran']),
        'tanggal' => mysqli_real_escape_string($koneksi, $_POST['tanggal']),
        'no_akun_d' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_d']),
        'no_akun_k' => mysqli_real_escape_string($koneksi, $_POST['nama_akun_k']),
    );

        Insert_Data("transaksi_pengeluaran", $data);
        header("Location: " . $baseURL . "/index.php?link=pengeluaran");
        exit;
    }
?>