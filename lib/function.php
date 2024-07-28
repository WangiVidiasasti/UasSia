<?php

function Insert_Data($table, $data) {
    global $koneksi;
    
    // Buat string kolom dan nilai
    $columns = implode(", ", array_keys($data));
    $escaped_values = array_map(function($value) use ($koneksi) {
        return "'" . mysqli_real_escape_string($koneksi, $value) . "'";
    }, array_values($data));
    $values = implode(", ", $escaped_values);
    
    // Buat query
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    
    // Debugging: Cetak query
    echo $sql;
    
    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
       return $koneksi->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
}




function Insert_Transaksi($table, $data) {
    global $koneksi;

    // Konversi array ke nilai SQL
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    if ($koneksi->query($sql) === TRUE) {
        return true;
    } else {
        die("Error: " . $sql . "<br>" . $koneksi->error);
    }
}




function Tampil_Data($namaApi)
{
    global $baseURL;
    // Option untuk file_get_contents disable pengecekkan ssl certificate
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    // URL API internal
    $apiURL = 'http://localhost/UASSIA/webservices/api/' . $namaApi . '.php';

    // Panggil API menggunakan file_get_contents
    $response = file_get_contents($apiURL, false, stream_context_create($arrContextOptions));

    // Lakukan sesuatu dengan respons dari API (misalnya: tampilkan atau olah data)

    return json_decode($response);
  
}
function Delete_Data($table)
{
    global $koneksi;
    $pk = Decrypt_Data($_GET['id']);
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    $fetchStruktur = mysqli_fetch_assoc($getStruktur);
    $primaryColumn = $fetchStruktur['Field'];

    $queryDelete = "DELETE FROM $table WHERE $primaryColumn = '$pk'";
    $delete = mysqli_query($koneksi, $queryDelete);

    if ($delete) {
        $_SESSION['hasil'] = "Data berhasil dihapus";

        // ACTIVITY LOG-- insert into <tabel yang relevan>: activity, (timestamp -default), username, role WIP
        // Uncomment below when finished
        // $namaLayanan = ltrim($table, "transaksi_");
        // $tabelLog = "log_activity_" . $namaLayanan;
        // $username = $_SESSION['user']['username'];
        // $role = $_SESSION['user']['role'];
        // $queryActivity = mysqli_query($koneksi, "INSERT INTO $tabelLog (activity, username, role) VALUES ('Hapus data $namaLayanan dengan Nomor $pk', $username, $role)");
    } else {
        $_SESSION['warning'] = "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
function Update_Data($table, $data, ...$custom)
{

    global $koneksi;

    // mendapatkan struktur tabel dalam bentuk array variabel array ada 2 karena variabel arrstruktur tidak akan diganti menjadi kolom + value
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    while ($fetchStruktur = mysqli_fetch_assoc($getStruktur)) {
        $arrStruktur[] = $fetchStruktur['Field'];
        $columnName[] = $fetchStruktur['Field'];
    }

    // fungsi if untuk menjalankan query apakah diupdate sesuai default kolom tabel / custom kolom
    if (is_array($custom) && empty($custom)) {
        $kolomfix = $columnName;
    } else {
        $kolomfix = $custom[0];
    }
    // print_r($kolomfix);

    // merubah variabel kolomfix dengan menambahkan value
    foreach ($kolomfix as $index => $value) {
        $kolomfix[$index] = $value . " = " . "'" . $data[$index] . "'";
    }
    // echo json_encode($kolomfix);

    // mengubah menjadi string dan menambahkan pemisah koma
    $kolomUpdate = implode(", ", $kolomfix);

    // mendefinisikan primary key untuk kondisi
    $PKColumn = $arrStruktur[0];
    $PKValue = "'" . $data[0] . "'";
    $kondisi = $PKColumn . " = " . $PKValue;


    // memberlakukan query update
    $queryUpdate = "UPDATE $table SET $kolomUpdate WHERE $kondisi";
    $updateData = mysqli_query($koneksi, $queryUpdate);
    if ($updateData) {
        $_SESSION['hasil'] = "Data berhasil diupdate";
    } else {
        $_SESSION['warning'] = "Data gagal diupdate: " . mysqli_error($koneksi);
    }
}
function Cek_PK($table, $pk)
{
    global $koneksi;
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    $fetchStruktur = mysqli_fetch_assoc($getStruktur);
    $primaryColumn = $fetchStruktur['Field'];

    $queryDelete = "SELECT * FROM $table WHERE $primaryColumn = '$pk'";
    $delete = mysqli_query($koneksi, $queryDelete);

    if ((mysqli_num_rows($delete)) > 0) {
        return true;
    } else {
        return false;
    }
}
function Update_Total_Harga($kd_pesanan_laundry, $berat_baju) {
    global $koneksi;
    
    $sql = "UPDATE transaksi_pesanan_laundry t
            JOIN detail_pesanan_laundry d ON t.kd_pesanan_laundry = d.kd_pesanan_laundry
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_katalog_laundry k ON t.id_katalog = k.id_katalog
            SET t.total_harga = (p.harga + k.harga_katalog + ($berat_baju * 5))
            WHERE t.kd_pesanan_laundry = ?";
    
    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param('s', $kd_pesanan_laundry);
        if ($stmt->execute()) {
            return true;
        } else {
            die("Error: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error: " . $koneksi->error);
    }
}
function Update_Total_Harga_Barang($kd_pesanan_barang) {
    global $koneksi;

    $sql = "UPDATE transaksi_pesanan_barang t
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_barang k ON t.id_barang = k.id_barang
            SET t.total_harga = p.harga + k.harga
            WHERE t.kd_pesanan_barang = ?";

    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param('i', $kd_pesanan_barang); // Pastikan tipe data sesuai
        if ($stmt->execute()) {
            return true;
        } else {
            die("Error execute: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error prepare: " . $koneksi->error);
    }
}
function Update_($kd_pesanan_barang) {
    global $koneksi;

    $sql = "UPDATE transaksi_pesanan_barang t
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_barang k ON t.id_barang = k.id_barang
            SET t.total_harga = p.harga + k.harga
            WHERE t.kd_pesanan_barang = ?";

    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param('i', $kd_pesanan_barang); // Pastikan tipe data sesuai
        if ($stmt->execute()) {
            return true;
        } else {
            die("Error execute: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error prepare: " . $koneksi->error);
    }
}
function Update_Data_Absen($table, $data) {
    global $koneksi;

    // Pastikan ada data untuk update
    if (empty($data)) {
        echo "No data to update.";
        return false;
    }

    // Ambil ID dan hapus dari array data untuk digunakan di WHERE clause
    $id = mysqli_real_escape_string($koneksi, array_shift($data));
    
    // Buat string untuk bagian SET dari query
    $set_parts = [];
    foreach ($data as $column => $value) {
        $set_parts[] = "`$column` = '$value'";
    }
    $set_string = implode(", ", $set_parts);

    // Buat query UPDATE
    $sql = "UPDATE `$table` SET $set_string WHERE id_detail_karyawan = '$id'";

    // Debugging: Cetak query
    echo $sql;

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
    
}

function Total_Penggajian($periode) {
    global $koneksi;

    $sql = "
        INSERT INTO transaksi_slip_penggajian (id_karyawan, tanggal, gaji_pokok, gaji_per_jam, total_kerja, THP, no_akun_d, no_akun_k)
SELECT 
    k.id_karyawan,
    ? AS tanggal,
    j.gaji_pokok,
    j.gaji_pokok / (30 * 8) AS gaji_per_jam,
    COALESCE(SUM(a.daily_hours), 0) AS total_kerja,
    COALESCE((j.gaji_pokok / (30 * 8)) * SUM(a.daily_hours), 0) AS THP,
    501 AS no_akun_d,
    101 AS no_akun_k
FROM 
    master_karyawan k
JOIN 
    master_jabatan j ON k.id_jabatan = j.id_jabatan
LEFT JOIN (
    SELECT 
        id_karyawan,
        LEAST(8, TIMESTAMPDIFF(HOUR, jam_masuk, jam_keluar)) AS daily_hours
    FROM 
        detail_karyawan
    WHERE 
        DATE_FORMAT(jam_masuk, '%Y-%m') = ?
    GROUP BY 
        id_karyawan, DATE(jam_masuk)
    HAVING 
        SUM(TIMESTAMPDIFF(HOUR, jam_masuk, jam_keluar)) >= 8
) a ON k.id_karyawan = a.id_karyawan
GROUP BY 
    k.id_karyawan, j.gaji_pokok";

    $stmt = $koneksi->prepare($sql);
    if ($stmt === false) {
        trigger_error($koneksi->error, E_USER_ERROR);
        return false;
    }

    $stmt->bind_param('ss', $periode, $periode);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }

    $stmt->close();
}

function Update_Data_Jamkel($table, $data, $id) {
    global $koneksi;

    // Buat string SET untuk kolom dan nilai yang akan diperbarui
    $set_values = [];
    foreach ($data as $column => $value) {
        $escaped_value = mysqli_real_escape_string($koneksi, $value);
        $set_values[] = "$column = '$escaped_value'";
    }
    $set_string = implode(", ", $set_values);

    // Buat query
    $sql = "UPDATE `$table` SET $set_string WHERE id_detail_karyawan = " . intval($id);

    // Debugging: Cetak query
    // echo $sql;

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
}

?>
