<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Laundry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-3">
                                    <input name="kd_slip_gaji" type="hidden" class="form-control" id="kdslipgaji" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama karyawan" class="form-label">Nama Karyawan</label>
                                        <select data-trigger class="form-select" name="id_detail_karyawan" id="nama_karyawan" required>
                                            <option selected disabled>Pilih Nama Karyawan</option>
                                            <?php
                                            $queryGetNamaKaryawan = "SELECT * FROM detail_karyawan";
                                            $getNamaKaryawan = mysqli_query($koneksi, $queryGetNamaKaryawan);
                                            while ($namakaryawan = mysqli_fetch_assoc($getNamaKaryawan)) {
                                                ?>
                                            <option value="<?= $namakaryawan['id_detail_karyawan'] ?>">
                                                <?= $namakaryawan['id_detail_karyawan'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama jabatan" class="form-label">Jabatan</label>
                                        <select data-trigger class="form-select" name="nama_jabatan" id="nama_jabatan" required>
                                            <option selected disabled>Pilih Nama Jabatan</option>
                                            <?php
                                            $queryGetNamaJabatan = "SELECT * FROM master_jabatan";
                                            $getNamaJabatan = mysqli_query($koneksi, $queryGetNamaJabatan);
                                            while ($namajabatan = mysqli_fetch_assoc($getNamaJabatan)) {
                                                ?>
                                            <option value="<?= $namajabatan['id_jabatan'] ?>">
                                            <?= $namajabatan['nama_jabatan'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gaji pokok" class="form-label">Gaji Pokok</label>
                                        <select data-trigger class="form-select" name="gaji_pokok" id="gaji_pokok" required>
                                            <option selected disabled>Pilih Gaji Pokok</option>
                                            <?php
                                            $queryGetGajiPokok = "SELECT * FROM master_jabatan";
                                            $getGajiPokok = mysqli_query($koneksi, $queryGetGajiPokok);
                                            while ($gajipokok = mysqli_fetch_assoc($getGajiPokok)) {
                                                ?>
                                            <option value="<?= $gajipokok['id_jabatan'] ?>">
                                            <?= $gajipokok['gaji_pokok'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_kerja" class="form-label">Total Kerja</label>
                                        <input type="number" class="form-control" name="total_kerja" id="total_kerja">
                                    </div>
                                    <div class="mb-3">
                                        <label for="take_home_pay" class="form-label">Take Home Pay</label>
                                        <select data-trigger class="form-select" name="take_home_pay" id="take_home_pay" required>
                                            <option selected disabled>Take Home Pay</option>
                                            <?php
                                            $queryGetTakeHomePay = "SELECT * FROM master_jabatan";
                                            $getTakeHomePay = mysqli_query($koneksi, $queryGetTakeHomePay);
                                            while ($takehomepay = mysqli_fetch_assoc($getTakeHomePay)) {
                                                ?>
                                            <option value="<?= $takehomepay['id_jabatan'] ?>">
                                            <?= $takehomepay['gaji_pokok'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" >
                                    <label for="nama" class="form-label">Pilih Nomor Akun D</label>
                                        <select data-trigger class="form-select" name="nama_akun" id="akun">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" >
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3" >
                                        <select data-trigger class="form-select" name="nama_akun" id="akun">
                                        <label for="nama" class="form-label">Pilih Nomor Akun K</label>
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" >
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    
                                <div class="mb-3 d-flex flex-column">
                                    <button name="insert_penggajian" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
