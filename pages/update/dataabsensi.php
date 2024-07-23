<div>
    <div class="modal fade" id="updateModalDataAbsensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Laundry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hari" class="form-label">Hari</label>
                                        <select data-trigger class="form-select" name="hari" id="hari" required>
                                            <option selected disabled>Pilih Hari</option>
                                            <?php
                                            $queryGetHari = "SELECT * FROM id_detail_karyawan";
                                            $getHari = mysqli_query($koneksi, $queryGetHari);
                                            while ($hari = mysqli_fetch_assoc($getHari)) {
                                                ?>
                                            <option value="<?= $hari['hari'] ?>">
                                                <?= $hari['hari'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <select data-trigger class="form-select" name="tanggal" id="tanggal">
                                            <option selected disabled>Pilih Tanggal</option>
                                            <?php
                                            $queryGetTanggal = "SELECT * FROM id_detail_karyawan";
                                            $getTanggal = mysqli_query($koneksi, $queryGetTanggal);
                                            while ($tanggal = mysqli_fetch_assoc($getTanggal)) {
                                                ?>
                                            <option value="<?= $tanggal['tanggal'] ?>">
                                            <?= $tanggal['tanggal'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_data_absensi" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
