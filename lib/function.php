<?php

function Insert_Data($table, $data) {
    global $koneksi;

    // Convert array to SQL values
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    if ($koneksi->query($sql) === TRUE) {
        return true;
    } else {
        die("Error: " . $sql . "<br>" . $koneksi->error);
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
?>
