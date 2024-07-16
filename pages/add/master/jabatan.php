<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page -->
            <div class="card">
                <div class="card-header card-title">
                    <h4 class="card-title">Tambah Data Jabatan</h4>
                </div>
                <div class="card-body">
                    <form action="webservices/insert.php" enctype="multipart/form-data" method="post" onsubmit="return showAlert()">
                       
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_jabatan" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Gaji Pokok</label>
                            <input type="text" class="form-control" name="gaji_pokok" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Gaji Lembur</label>
                            <input type="number" class="form-control" name="Gaji_lembur" id="notelp">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Potongan</label>
                            <input type="text" class="form-control" name="potongan" id="nama">
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
