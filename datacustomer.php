

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/customer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/customer.php";

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
                        <h4 class="mb-sm-0 font-size-18">Data Desa Kucur</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Desa Kucur</a></li>
                                <li class="breadcrumb-item active">Data Agama</li>
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
                            <h4 class="card-title">Data Customer</h4>
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
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("customer");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idcustomer = $j->id_customer;
                                                $namacustomer = $j->nama_customer;
                                                $notelp = $j->no_telp;
                                                $alamat = $j->alamat;
                                                $password = $j->password;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namacustomer ?></td>
                                                    <td><?= $notelp ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td><?= $password ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#updateModalCustomer"
                                                        data-idcs="<?= $idcustomer ?>" data-nmcustomer="<?= $namacustomer ?>"
                                                        data-notelpcs="<?= $notelp ?>" data-alamatcs="<?= $alamat ?>"
                                                        data-passwordcs="<?= $password ?>"  >Update</button>
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
                var varidcustomer = $(this).data('idcs');
                var varcustomer = $(this).data('nmcustomer');
                var varnotelp = $(this).data('notelpcs');
                var varalamat = $(this).data('alamatcs');
                var varpassword = $(this).data('passwordcs');
                

                $('#id_customer').val(varidcustomer);
                $('#nama_customer').val(varcustomer);
                $('#no_telp').val(varnotelp);
                $('#alamat').val(varalamat);
                $('#password').val(varpassword);
                
                
            })
        })
    </script>