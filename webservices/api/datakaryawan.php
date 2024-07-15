<?php
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM master_karyawan");

$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
