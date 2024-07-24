<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi_pengeluaran
LEFT JOIN master_supplier ON master_supplier.id_supplier =transaksi_pengeluaran.kd_supplier
LEFT JOIN master_akun ON master_akun.no_akun = transaksi_pengeluaran.no_akun_d");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
