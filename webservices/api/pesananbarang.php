<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM transaksi_pesanan_barang
LEFT JOIN master_customer ON master_customer.id_customer = transaksi_pesanan_barang.id_customer
LEFT JOIN master_pengiriman ON master_pengiriman.id_pengiriman = transaksi_pesanan_barang.id_pengiriman
LEFT JOIN master_barang ON master_barang.id_barang = transaksi_pesanan_barang.id_barang
LEFT JOIN master_status ON master_status.id_status = transaksi_pesanan_barang.id_status
LEFT JOIN master_akun ON master_akun.no_akun = transaksi_pesanan_barang.no_akun_d");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>