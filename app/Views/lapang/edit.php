<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row  pt-5 mt-5">
        <div class="col-5">
            <h2 class="mb-3">Edit Field</h2>
            <form action="<?= base_url('list/lapang/' . $lapang['id_user'] . '/update') ?>" method="POST">
                <?= csrf_field(); ?>
                <div class=" mb-3">
                    <label for="tanggal" class="form-label"><b>Tanggal</b></label>
                    <input type="date" class="form-control" id="tanggal<?= $lapang['id_user'] ?>" name="tanggal"
                        value="<?= $lapang['tanggal'] ?>" autofocus>
                </div>
                <div class=" mb-3">
                    <label for="jam_main" class="form-label"><b>Jam Main</b></label>
                    <input type="time" class="form-control" id="jam_main<?= $lapang['id_user'] ?>" name="jam_main"
                        value="<?= $lapang['jam_main'] ?>">
                </div>
                <div class="mb-3">
                    <label for="selesai" class="form-label"><b>Selesai</b></label>
                    <input type="time" class="form-control" id="selesai<?= $lapang['id_user'] ?>" name="selesai"
                        value="<?= $lapang['selesai'] ?>">
                </div>
                <div class="mb-3">
                    <label for="lapang" class="form-label"><b>Lapang</b></label>
                    <select class="form-control" id="lapang<?= $lapang['id_user'] ?>" name="lapang">
                        <option value="0" selected>--Pilih Lapang--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_tim" class="form-label"><b>Nama Tim</b></label>
                    <input type="text" class="form-control" id="nama_tim<?= $lapang['id_user'] ?>" name="nama_tim"
                        value="<?= $lapang['nama_tim'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<script>
function getData(id) {
    var link = "<?= base_url('list/lapang'); ?>" + "/" + id + "/ubah";
    $.ajax({
        type: 'GET',
        url: link, //Memanggil Controller Function
        async: false,
        dataType: 'json',
        success: function(data) {
            console.log('[value = ' + data['nama_tim'] + ']');
            $('#tanggal' + id).val(data['tanggal']);
            $('#jam_main' + id).val(data['jam_main']);
            $('#selesai' + id).val(data['selesai']);
            $('#lapang' + id).val(data['lapang']).prop('selected', true);
            $('#nama_tim' + id).val(data['nama_tim']);
        }
    });
}
</script>
<?= $this->endSection(); ?>