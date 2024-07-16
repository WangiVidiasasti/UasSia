<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page -->
            <div class="card">
                <div class="card-header card-title">
                    <h4 class="card-title">Tambah Akun</h4>
                </div>
                <div class="card-body">
                    <form action="webservices/insert.php" enctype="multipart/form-data" method="post" onsubmit="return showAlert()">
                       
                    <div class="mb-3">
                            <label for="nama" class="form-label">Nomor Akun</label>
                            <input type="number" class="form-control" name="no_akun" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" name="nama_akun" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Saldo</label>
                            <input type="number" class="form-control" name="saldo" id="nama">
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <button name="insert_akun" type="submit" class="btn btn-primary">Simpan Data</button>
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
