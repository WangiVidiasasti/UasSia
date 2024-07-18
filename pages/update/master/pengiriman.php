<div>
    <div class="modal fade" id="modalpengirimanupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input name="id_pengiriman" type="hidden" class="form-control" id="id_pengiriman" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pengiriman</label>
                                    <input type="text" class="form-control" name="nama_pengiriman" id="nama_pengiriman" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jarak" class="form-label">Jarak</label>
                                    <input type="text" class="form-control" name="jarak" id="jarak" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_pengiriman" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
