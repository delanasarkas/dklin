<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<div class="container-xl">

    <h1 class="app-page-title">Stock Opname</h1>
    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" style="width:60%" id="tanggal" name="tanggal" placeholder="Tanggal">
        </div>
        <!--//col-->
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary text-white ms-10">+ Data Orderan</button>
            <button type="button" class="btn btn-primary text-white ms-5">+ Data Transfer Kas</button>
        </div>
    </div>

    <label for="outlet" class="form-label">Outlet</label>
    <select class="form-select" id="outlet" name="outlet" style="width:20%">
        <option value="" selected>Pilih Cabang</option>
        <option value="bsd">BSD</option>
        <option value="bukit_dago">Bukit Dago</option>
        <option value="serpong_park">Serpong park</option>
        <option value="sentraland">Sentraland</option>
    </select>
    <div class="mt-4 mb-4">
        <label for="catatan" class="form-label">Catatan</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Cek pelunasan mulai dari tanggal 1 Agustus" style="width:45%"></textarea>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="cardbody mt-5 mb-5 text-center">
                    Kertas Stok Manual Disini
                </div>
            </div>
        </div>
        <!--//col-->
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary text-white ms-5">Rekam Stok</button>
            <button type="button" class="btn btn-primary text-white ms-5">Ambil Data Product</button>
        </div>
    </div>
    <div class="">
        <button type="button" class="btn btn-secondary text-white">Batal</button>
        <button type="button" class="btn btn-primary text-white ms-5">Unduh</button>
    </div>
</div>
<!--//row-->
<?= $this->endSection() ?>