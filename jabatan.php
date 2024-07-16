<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('karyawan');
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Laundry</a></li>
                                <li class="breadcrumb-item active">Data Jabatan</li>
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
                            <h4 class="card-title">Data Jabatan</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#modalagama">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Gaji Lembur</th>
                                        <th>Potongan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("jabatan");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idjabatan = $j->id_jabatan;
                                                $namajabatan = $j->nama_jabatan;
                                                $gajipokok = $j->gaji_pokok;
                                                $gajilembur = $j->gaji_lembur;
                                                $potongan = $j->potongan;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namajabatan ?></td>
                                                    <td><?= $gajipokok ?></td>
                                                    <td><?= $gajilembur ?></td>
                                                    <td><?= $potongan ?></td>
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
    var data = <?php Tampil_Data("jabatan") ?>
    console.log(data);
</script>