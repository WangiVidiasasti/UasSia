<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi_slip_penggajian
LEFT JOIN 
    master_karyawan ON master_karyawan.id_karyawan = transaksi_slip_penggajian.id_karyawan
LEFT JOIN 
    master_akun ON master_akun.no_akun = transaksi_slip_penggajian.no_akun_d AND transaksi_slip_penggajian.no_akun_k
LEFT JOIN 
    master_jabatan ON master_jabatan.id_jabatan = master_karyawan.id_jabatan
");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
