<div>
    <div class="modal fade" id="modalkaryawanupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-3">
                                    <input name="id_karyawan" type="hidden" class="form-control" id="id_karyawan" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_karyawan" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan_ky" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat_ky" required>
                                </div>
                                <div class="mb-3">
                                    <label for="notelp" class="form-label">No Telpon</label>
                                    <input type="number" class="form-control" name="no_telp" id="no_telp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email_ky" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir_ky" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir_ky" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pekerjaan" class="form-label">Status pekerjaan</label>
                                    <select class="form-control" name="status_pekerjaan" id="status_pekerjaan" required>
                                        <option value="" disabled selected>Pilih status pekerjaan</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk_ky" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_karyawan" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
