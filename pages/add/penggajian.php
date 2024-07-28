<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Periode Gaji</h5>
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
                                    <label for="periode" class="form-label">Periode</label>
                                    <input type="month" class="form-control" name="periode" id="periode" required>
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
