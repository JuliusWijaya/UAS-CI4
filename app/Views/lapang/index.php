<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row pt-5 mt-5">
        <?php
        if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="col-10">
            <h2>Daftar Field</h2>
        </div>
        <div class="col-2">
            <p>
                <a href="#" role="button" class="btn btn-outline-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="bi bi-file-earmark-plus-fill"></i>
                    Add
                </a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col" class="px-3">Tanggal</th>
                        <th scope="col">Jam Main</th>
                        <th scope="col">Selesai</th>
                        <th scope="col">Lapang</th>
                        <th scope="col">Nama_Tim</th>
                        <th scope="col" class="px-5">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lapang as $lp) : ?>
                    <tr>
                        <th class="px-3 align-middle" scope="row"><?= $i++; ?></th>
                        <td class="align-middle"><?= $lp['tanggal']; ?></td>
                        <td class="px-3 align-middle"><?= $lp['jam_main']; ?></td>
                        <td class="px-2 align-middle"><?= $lp['selesai']; ?></td>
                        <td class="align-middle">
                            <?php if ($lp['lapang'] == 1) {
                                    echo "Indoor";
                                } elseif ($lp['lapang'] == 2) {
                                    echo "Outdoor";
                                } else {
                                    echo "Not Found";
                                }
                                ?>
                        </td>
                        <td class="align-middle"><?= $lp['nama_tim']; ?></td>
                        <td class="align-middle">
                            <a href="<?= base_url('/list/lapang/' . $lp['id_user'] . '/edit') ?>"
                                class=" btn btn-success" role="button">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <form action="<?= base_url('/list/lapang/' . $lp['id_user'] . '/delete') ?>"
                                class="d-inline" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus <?= $lp['nama_tim']; ?>')">
                                    <i class="bi bi-trash3-fill"></i>
                                    Delete
                                </button>
                            </form>

                            <!-- <a href="<?= base_url('/list/lapang/' . $lp['id_user'] . '/delete') ?>"
                                class="btn btn-danger" role="button"
                                onclick="return confirm('Anda Yakin Ingin Menghapus <?= $lp['nama_tim']; ?>')">
                                Delete
                            </a> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Field</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('list/lapang/save') ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class=" mb-3">
                            <label for="tanggal" class="form-label"><b>Tanggal</b></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" autofocus
                                value="tanggal" required>
                        </div>
                        <div class=" mb-3">
                            <label for="jam_main" class="form-label"><b>Jam Main</b></label>
                            <input type="time" class="form-control" id="jam_main" name="jam_main" required>
                        </div>
                        <div class="mb-3">
                            <label for="selesai" class="form-label"><b>Selesai</b></label>
                            <input type="time" class="form-control" id="selesai" name="selesai" required>
                        </div>
                        <div class="mb-3">
                            <label for="lapang" class="form-label"><b>Lapang</b></label>
                            <select class="form-select" aria-label="Default select example" id="lapang" name="lapang"
                                required>
                                <option selected>Pilih...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_tim" class="form-label"><b>Nama Tim</b></label>
                            <input type="text" class="form-control" id="nama_tim" name="nama_tim" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="bi bi-x-circle"></i>
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
    </div>
</div>
<?= $this->endSection(); ?>