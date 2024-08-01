<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/updatejurnal.php";


?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Jurnal Umum</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jurnal Umum</h4>
                        </div>
                        <div class="card-body">
                            <button id="updateDataBtn" type="button" class="btn btn-primary mb-sm-2" onclick="window.location.href='updatejurnal.php'">Update Data</button>



                            <div style="overflow-x:auto;">
                                <table id="datatable-buttons"
                                        class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Akun Debit</th>
                                            <th>Akun Kredit</th>
                                            <th>Jumlah</th>
                                            <th>Id Refrensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            $data = Tampil_Data("jurnal");
                                            $no = 1;
                                            if ($data !== null) {
                                                foreach ($data as $j) {
                                                    $idjurnal = $j->id_jurnal;
                                                    $tanggal = $j->tanggal;
                                                    $keterangan = $j->keterangan;
                                                    $akundebit = $j->akun_debit;
                                                    $akunkredit = $j->akun_kredit;
                                                    $jumlah = $j->jumlah;
                                                    $refrensi = $j->referensi;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $tanggal ?></td>
                                                        <td><?= $keterangan ?></td>
                                                        <td><?= $akundebit ?></td>
                                                        <td><?= $akunkredit ?></td>
                                                        <td><?= $jumlah ?></td>
                                                        <td><?= $refrensi ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
