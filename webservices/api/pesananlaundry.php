<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi_pesanan_laundry
LEFT JOIN master_customer ON master_customer.id_customer = transaksi_pesanan_laundry.id_customer
LEFT JOIN master_pengiriman ON master_pengiriman.id_pengiriman = transaksi_pesanan_laundry.id_pengiriman
LEFT JOIN master_katalog_laundry ON master_katalog_laundry.id_katalog = transaksi_pesanan_laundry.id_katalog
LEFT JOIN master_status ON master_status.id_status = transaksi_pesanan_laundry.id_status
LEFT JOIN master_akun ON master_akun.no_akun = transaksi_pesanan_laundry.no_akun_d & transaksi_pesanan_laundry.no_akun_k");

$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
