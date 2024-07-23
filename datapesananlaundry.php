<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/pesananlaundry.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/pesananlaundry.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('pesananlaundry');

// Debugging to ensure data fetch is correct
if ($data === null) {
    echo "Data is null.";
} else {
    echo "Data fetched successfully.";
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Laundry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Karyawan</a></li>
                                <li class="breadcrumb-item active">Data Karyawan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Agama</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Customer</th>
                                        <th>Pengiriman</th>
                                        <th>Katalog dipilih</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th>No Akun D</th>
                                        <th>No Akun K</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("pesananlaundry");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $kdpesananlaundry = $j->kd_pesanan_laundry;
                                            $namacustomer = $j->nama_customer;
                                            $namapengirim = $j->nama_pengiriman;
                                            $namakatalog = $j->nama_katalog;
                                            $namastatus = $j->nama_status;
                                            $totalharga = $j->total_harga;
                                            $noakund = $j->nama_akun;
                                            $noakunk = $j->nama_akun;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $namacustomer ?></td>
                                                <td><?= $namapengirim ?></td>
                                                <td><?= $namakatalog ?></td>
                                                <td><?= $namastatus ?></td>
                                                <td><?= $totalharga ?></td>
                                                <td><?= $noakund ?></td>
                                                <td><?= $noakunk ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="updateModal"
                                                    data-bs-toggle="modal" data-bs-target="#updateModalPesananLaundry"
                                                    data-kdpsn="<?= $kdpesananlaundry ?>"
                                                    data-custmer="<?= $namacustomer ?>" data-nmpengirim="<?= $namapengirim ?>"
                                                    data-katalog="<?= $namakatalog ?>"
                                                    data-status="<?= $namastatus ?>" data-totharga="<?= $totalharga ?>"
                                                    data-akund="<?= $noakund ?>" data-akunk="<?= $noakunk ?>" >Update</button>
                                                    <button type="button" class="btn btn-secondary" role="button"
                                                    id="deleteConfirmation" data-kdpsn="<?= $kdpesananlaundry ?>">Hapus</button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                   
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '#updateModal', function () {
            var varkdpesnan = $(this).data('kdpsn');
            var varcustmr = $(this).data('custmer');
            var varpngrm = $(this).data('nmpengirim');
            var varktlg = $(this).data('katalog');
            var varsts = $(this).data('status');
            var vartothrg = $(this).data('totharga');
            var varaknd = $(this).data('akund');
            var varaknk = $(this).data('akunk');

            $('#kdpsn').val(varkdpesnan);
            $('#customer').val(varcustmr);
            $('#pengiriman').val(varpngrm);
            $('#katalog').val(varktlg);
            $('#status').val(varsts);
            $('#harga').val(vartothrg);
            $('#akunD').val(varaknd);
            $('#akunK').val(varaknk);
        });

        $(document).on('click', '#deleteConfirmation', function() {
            var kdpesnan = $(this).data('kdpsn');
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#2ab57d",
                cancelButtonColor: "#fd625e",
                confirmButtonText: "Hapus",
                cancelButtonText: "Batalkan",
            }).then(function(result) {
                if (result.isConfirmed) {
                    location.assign("<?= $baseURL ?>/index.php?link=laundry_pesanan&aksi=delete&id=" + kdpesnan);
                }
            });
        });
    });
</script>
