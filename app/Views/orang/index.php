<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Orang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('orang/create') ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class=" mb-3">
                            <label for="nama" class="form-label"><b>Nama</b></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Input Your Full Name" autofocus>
                        </div>
                        <div class=" mb-3">
                            <label for="alamat" class="form-label"><b>Alamat</b></label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Input Your Address">
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

    <div class="row pt-5 mt-5">
        <?php
        if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <div class="col-6">
            <h2>Daftar Orang</h2>
            <form action="" method="POST" class="d-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" name="submit">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
        <div class="col-2">
            <p>
                <a href="#" role="button" class="btn btn-outline-primary d-inline" data-toggle="modal"
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
                        <th scope="col" class="px-3">Nama</th>
                        <th scope="col" class="px-5">Alamat</th>
                        <th scope="col" class="px-5">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($orang as $o) : ?>
                    <tr>
                        <th class="px-3 align-middle" scope="row"><?= $i++; ?></th>
                        <td class="align-middle"><?= $o['nama']; ?></td>
                        <td class="px-3 align-middle"><?= $o['alamat']; ?></td>
                        <td class="align-middle">
                            <a href="<?= base_url('orang/' . $o['id'] . '/edit') ?>" class=" btn btn-success"
                                role="button" data-target="#exampleModal<?= $o['id'] ?>" data-toggle="modal">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <form action="<?= base_url('orang/' . $o['id'] . '/delete') ?>" class="d-inline"
                                method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus <?= $o['nama']; ?>')">
                                    <i class="bi bi-trash3-fill"></i>
                                    Delete
                                </button>
                            </form>

                            <!-- <a href="<?= base_url('/list/lapang/' . $o['id'] . '/delete') ?>"
                                class="btn btn-danger" role="button"
                                onclick="return confirm('Anda Yakin Ingin Menghapus <?= $o['nama']; ?>')">
                                Delete
                            </a> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>

    <!-- Modal Edit -->
    <?php foreach ($orang as $org) : ?>
    <div class="modal fade" id="exampleModal<?= $org['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Edit Orang</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('orang/' . $org['id'] . '/update') ?>" method="POST">
                        <?= csrf_field(); ?>
                        <div class=" mb-3">
                            <label for="nama" class="form-label"><b>Nama</b></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Input Your Full Name" value="<?= $org['nama'] ?>" autofocus>
                        </div>
                        <div class=" mb-3">
                            <label for="alamat" class="form-label"><b>Alamat</b></label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Input Your Address" value="<?= $org['alamat'] ?>">
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
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>