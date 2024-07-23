<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/dataabsensi.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/dataabsensi.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/validasilaundry.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('dataabsensi');

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
                            <h4 class="card-title">Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("dataabsensi");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $namakaryawan = $j->id_detail_karyawan;
                                            $hari = $j->hari;
                                            $tanggal = $j->tanggal;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $hari ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="updateModal"
                                                    data-bs-toggle="modal" data-bs-target="#updateModalDataAbsensi"
                                                    data-namakaryawan="<?= $namakaryawan ?>"
                                                    data-hari="<?= $hari ?>" data-hari="<?= $hari ?>"
                                                    data-tanggal="<?= $tanggal ?>" >Update</button>
                                                   

                                                    
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
            var varidkaryawan = $(this).data('namakaryawan');
            var varhari = $(this).data('hari');
            var vartanggal = $(this).data('tanggal');

            $('#namakaryawan').val(varidkaryawan);
            $('#hari').val(varhari);
            $('#tangga').val(vartanggal);
        });
    });
</script>
