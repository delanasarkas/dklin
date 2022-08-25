<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">			    
    <h1 class="app-page-title">Settings</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                
                <div class="app-card-body">
                    <form class="settings-form" action="/settings-ubah/<?= $data_general[0]['id_general'] ?>" method="POST">
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nama General</label>
                            <input type="text" class="form-control" id="setting-input-1" name="nama_general" value="<?= $data_general[0]['nama_general'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Contact General</label>
                            <input type="text" class="form-control" id="setting-input-2" name="contact_general" value="<?= $data_general[0]['contact_general'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Alamat General</label>
                            <input type="text" class="form-control" id="setting-input-3" name="alamat_general" value="<?= $data_general[0]['alamat_general'] ?>">
                        </div>
                        <button type="submit" class="btn app-btn-primary">Ubah</button>
                    </form>
                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
</div><!--//container-fluid-->
<!--//container-fluid-->
<?= $this->endSection() ?>