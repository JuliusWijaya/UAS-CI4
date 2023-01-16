<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container pt-5">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Tambah Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('setting/menu/add') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu_id"><b>Menu ID</b></label>
                            <input type="text" class="form-control" id="menu_id" name="menu_id">
                        </div>
                        <div class="form-group">
                            <label for="title"><b>Nama Menu</b></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="link"><b>Link</b></label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        <div class="form-group">
                            <label for="icon"><b>Icon</b></label>
                            <input type="text" class="form-control" id="icon" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="menu_level"><b>Menu Level</b></label>
                            <select class="form-control" id="menu_level" name="menu_level">
                                <option value="">Pilih..</option>
                                <option value="0">Main Menu</option>
                                <option value="1">Sub Menu</option>
                                <option value="2">Sub Sub Menu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id"><b>Group Menu</b></label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Pilih..</option>
                                <?php foreach ($main as $op) : ?>
                                <option value="<?= $op['id'] ?>"><?= $op['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1"
                                checked>
                            <label class="form-check-label" for="is_active">
                                Yes
                            </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check-input " type="radio" name="is_active" id="is_active" value="0">
                            <label class="form-check-label" for="is_active">
                                No
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="contoh()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- CRUD -->
    <div class="row my-3 pt-3">
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-info" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="col-10">
            <h2 class="h2">List Menu</h5>
        </div>
        <div class="col-2 align-self-end">
            <p class="text-md-right">
                <a class="btn btn-outline-primary" href="#" role="button" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                    Add Menu
                </a>
            </p>
        </div>
    </div>
    <div class="row card">
        <?php foreach ($menu as $menus) { ?>
        <div class=" modal fade" id="exampleModal<?= $menus['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setting/menu/' . $menus['id'] . '/update') ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="menu_id"><b>Menu ID</b></label>
                                <input type="text" class="form-control" id="menu_id<?= $menus['id'] ?>" name="menu_id"
                                    value="<?= $menus['menu_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>Nama Menu</b></label>
                                <input type="text" class="form-control" id="title<?= $menus['id'] ?>" name="title"
                                    value="<?= $menus['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="link"><b>Link</b></label>
                                <input type="text" class="form-control" id="link<?= $menus['id'] ?>" name="link"
                                    value="<?= $menus['link'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon"><b>Icon</b></label>
                                <input type="text" class="form-control" id="icon<?= $menus['id'] ?>" name="icon"
                                    value="<?= $menus['icon'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="menu_level"><b>Menu Level</b></label>
                                <select class="form-control" id="menu_level<?= $menus['id'] ?>" name="menu_level">
                                    <option value="" selected>Pilih..</option>
                                    <option value="0">Main Menu</option>
                                    <option value="1">Sub Menu</option>
                                    <option value="2">Sub Sub Menu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id" value="<?= $menus['parent_id'] ?>"><b>Group Menu</b></label>
                                <select class="form-control" id="parent_id<?= $menus['id'] ?>" name="parent_id">
                                    <option>Pilih..</option>
                                    <?php foreach ($main as $opt) : ?>
                                    <option value=" <?= $opt['id'] ?>"><?= $opt['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class=" form-group form-check">
                                <input class="form-check-input" type="radio" name="is_active"
                                    id="is_active<?= $menus['id'] ?>" value="1" checked>
                                <label class="form-check-label" for="is_active">
                                    Yes
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input " type="radio" name="is_active"
                                    id="is_active<?= $menus['id'] ?>" value="0">
                                <label class="form-check-label" for="is_active<?= $menus['id'] ?>">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="bi bi-x-circle-fill"></i>
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 card">
            <div class="row mt-3">
                <div class="col-10">
                    <h5 class="h5"><?= $menus['title'] ?>
                    </h5>
                </div>
                <div class=" col-2">
                    <p class="text-md-right">
                        <a class="btn btn-secondary mx-2" href="#" role="button" data-toggle="modal"
                            data-target="#exampleModal<?= $menus['id'] ?>" onclick="getData(<?= $menus['id'] ?>)">
                            Edit
                        </a>
                        <a class="btn btn-outline-danger"
                            href="<?= base_url('setting/menu/' . $menus['id'] . '/delete') ?>" role="button"
                            onclick="return confirm('Anda Yakin Ingin Menghapus Menu <?= $menus['title'] ?>');">
                            Delete
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php if ($menus['sub']) { ?>
        <?php foreach ($menus['sub'] as $sub) { ?>
        <div class=" modal fade" id="exampleModal<?= $sub['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Dataaa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?= base_url('setting/menu/' . $sub["id"] . '/update') ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="menu_id"><b>Menu Id</b></label>
                                <input type="text" class="form-control" id="menu_id<?= $sub['id'] ?>" name="menu_id"
                                    value="<?= $sub['menu_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title"><b>Nama Menu</b></label>
                                <input type="text" class="form-control" id="title<?= $sub['id'] ?>" name="title"
                                    value="<?= $sub['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="link"><b>Link</b></label>
                                <input type="text" class="form-control" id="link<?= $sub['id'] ?>" name="link"
                                    value="<?= $sub['link'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon"><b>Icon</b></label>
                                <input type="text" class="form-control" id="icon<?= $sub['id'] ?>" name="icon"
                                    value="<?= $sub['icon'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="menu_level"><b>Menu Level</b></label>
                                <select class="form-control" id="menu_level<?= $sub['id'] ?>" name="menu_level">
                                    <option value="">Pilih..</option>
                                    <option value="0">Main Menu</option>
                                    <option value="1">Sub Menu</option>
                                    <option value="2">Sub Sub Menu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id"><b>Group Menu</b></label>
                                <select class="form-control" id="parent_id<?= $sub['id'] ?>" name="parent_id">
                                    <option value="">Pilih..</option>
                                    <?php foreach ($main as $opt) : ?>
                                    <option value="<?= $opt['id'] ?>"><?= $opt['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="radio" name="is_active"
                                    id="is_active<?= $sub['id'] ?>" value="1">
                                <label class="form-check-label" for="is_active">
                                    Yes
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-check-input " type="radio" name="is_active"
                                    id="is_active<?= $sub['id'] ?>" value="0">
                                <label class="form-check-label" for="is_active<?= $menus['id'] ?>">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="bi bi-x-circle-fill"></i>
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-10 card align-self-end">
            <div class="row mt-3">
                <div class="col-10 py-1">
                    <h5 class="h5"><?= $sub['title'] ?></h5>
                </div>
                <div class=" col-2">
                    <p class="text-md-right px-2">
                        <a class="btn btn-success px-2.5" href="<?= base_url('setting/menu' . $sub['id'] . '/edit') ?>"
                            role="button" data-toggle="modal" data-target="#exampleModal<?= $sub['id'] ?>"
                            onclick="getData(<?= $sub['id'] ?>)">
                            <b>Edit</b>
                        </a>
                        <a class="btn btn-outline-warning px-2.5"
                            href="<?= base_url('setting/menu/' . $sub['id'] . '/delete') ?>" role="button"
                            onclick="return confirm('Anda Yakin ingin menghapus menu <?= $sub['title'] ?>');">
                            <b>Delete</b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </div>
</div>
<script>
function getData(id) {
    let link = "<?= base_url('setting/menu'); ?>" + "/" + id + "/edit";
    $.ajax({
        type: 'GET',
        url: link, //Memanggil Controller Function
        async: false,
        dataType: 'json',
        success: function(data) {
            console.log('[value = ' + data['is_active'] + ']');
            $('#menu_id' + id).val(data['menu_id']);
            $('#title' + id).val(data['title']);
            $('#icon' + id).val(data['icon']);
            $('#link' + id).val(data['link']);
            $('#parent_id' + id).val(data['parent_id']).change();
            $('#menu_level' + id).val(data['menu_level']).prop('selected', true);
            $('#is_active' + id).filter('[value = ' + data['is_active'] + ']').prop('checked', true);
        }
    });
}
</script>
<?= $this->endSection(); ?>