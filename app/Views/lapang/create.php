<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row align-items-center pt-5 mt-5">
        <div class="col-5">
            <h2>Add Field</h2>
            <form action="<?= base_url('list/lapang/save') ?>" method="POST">
                <?= csrf_field(); ?>
                <div class=" mb-3">
                    <label for="tanggal" class="form-label"><b>Tanggal</b></label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" autofocus value="tanggal">
                </div>
                <div class=" mb-3">
                    <label for="jam_main" class="form-label"><b>Jam Main</b></label>
                    <input type="time" class="form-control" id="jam_main" name="jam_main">
                </div>
                <div class="mb-3">
                    <label for="selesai" class="form-label"><b>Selesai</b></label>
                    <input type="time" class="form-control" id="selesai" name="selesai">
                </div>
                <div class=" mb-3">
                    <label for="lapang" class="form-label"><b>Lapang</b></label>
                    <select class="form-select" aria-label="Default select example" id="lapang" name="lapang">
                        <option selected>Pilih...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_tim" class="form-label"><b>Nama Tim</b></label>
                    <input type="text" class="form-control" id="nama_tim" name="nama_tim">
                </div>
                <a href="/list/lapang" role="button" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i>
                    Close
                </a>
                <button type="submit" class="btn btn-primary mx-3"><i class="bi bi-save-fill"></i>
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>