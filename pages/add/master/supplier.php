<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page -->
            <div class="card">
                <div class="card-header card-title">
                    <h4 class="card-title">Tambah Data Supplier</h4>
                </div>
                <div class="card-body">
                    <form action="webservices/insert.php" enctype="multipart/form-data" method="post" onsubmit="return showAlert()">
                       
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_supplier" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama_toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Nomor_telepon</label>
                            <input type="number" class="form-control" name="no_telp" id="notelp">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="notelp">
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <button name="insert_supplier" type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showAlert() {
        alert("Data berhasil disimpan!");
        return true;
    }
</script>
