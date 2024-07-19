

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/karyawan.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/karyawan.php";

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
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Email</th>
                                        <th>Status Pekerjaan</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("datakaryawan");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idkaryawan = $j->id_karyawan;
                                                $namakaryawan = $j->nama_karyawan;
                                                $alamat = $j->alamat;
                                                $notelp = $j->no_telp;
                                                $email = $j->email;
                                                $status = $j->status_pekerjaan;
                                                $tempatlahir = $j->tempat_lahir;
                                                $tgllahir = $j->tanggal_lahir;
                                                $tglmasuk = $j->tanggal_masuk;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namakaryawan ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td><?= $notelp ?></td>
                                                    <td><?= $email ?></td>
                                                    <td><?= $status ?></td>
                                                    <td><?= $tempatlahir ?></td>
                                                    <td><?= $tgllahir ?></td>
                                                    <td><?= $tglmasuk ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#modalkaryawanupdate"
                                                        data-idkar="<?= $idkaryawan ?>" data-nmkaryawan="<?= $namakaryawan ?>"
                                                        data-alamatky="<?= $alamat ?>"
                                                        data-notelpky="<?= $notelp ?>" data-emailky="<?= $email ?>"
                                                        data-statusky="<?= $status ?>" data-tmptlahirky="<?= $tempatlahir ?>"
                                                        data-tgllahirky="<?= $tgllahir ?>" data-tglmasukky="<?= $tglmasuk ?>">Update</button>
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
                var varidkaryawan = $(this).data('idkar');
                var varkaryawan = $(this).data('nmkaryawan');
                var varalamat = $(this).data('alamatky');
                var varnotelp = $(this).data('notelpky');
                var varemail = $(this).data('emailky');
                var varstatus = $(this).data('statusky');
                var vartmptlahir = $(this).data('tmptlahirky');
                var vartgllahir = $(this).data('tgllahirky');
                var vartglmasuk = $(this).data('tglmasukky');

                $('#id_karyawan').val(varidkaryawan);
                $('#nama_karyawan_ky').val(varkaryawan);
                $('#alamat_ky').val(varalamat);
                $('#no_telp').val(varnotelp);
                $('#email_ky').val(varemail);
                $('#tempat_lahir_ky').val(vartmptlahir);
                $('#tanggal_lahir_ky').val(vartgllahir);
                $('#status_pekerjaan_ky').val(varstatus);
                $('#tanggal_masuk_ky').val(vartglmasuk);
                
            })
        })
    </script>