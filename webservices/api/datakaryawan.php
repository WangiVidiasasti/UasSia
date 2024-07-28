<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM master_karyawan LEFT JOIN master_jabatan ON master_jabatan.id_jabatan = master_karyawan.id_jabatan");

$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
