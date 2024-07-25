<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi_slip_penggajian
LEFT JOIN detail_karyawan ON detail_karyawan.id_detail_karyawan = transaksi_slip_penggajian.id_detail_karyawan
LEFT JOIN master_jabatan ON master_jabatan.id_jabatan = transaksi_slip_penggajian.id_jabatan
LEFT JOIN master_akun ON master_akun.no_akun = transaksi_slip_penggajian.no_akun");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
