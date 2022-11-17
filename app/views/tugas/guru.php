<div class="w-100 mt-3 text-center">
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#tambah_tugas"><i class="fa fa-add"></i> Tambah Tugas</button>
</div>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">KODE TUGAS</th>
                <th scope="col">PENGIRIM</th>
                <th scope="col">JUDUL TUGAS</th>
                <th scope="col">DESKRIPSI</th>
                <th scope="col">FILE</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['tugas'] as $t) : ?>
                <tr class="text-center">
                    <th><?= $t['id'] ?></th>
                    <?php $pengirim = $t['pengirim']; ?>
                    <td><?= strtoupper(Database::query("SELECT * FROM users WHERE kode = '$pengirim'")->fetch_object()->nama); ?></td>
                    <td><?= $t['judul']; ?></td>
                    <td><?= $t['deskripsi']; ?></td>
                    <td><a onclick="return confirm('Download Tugas Ini?')" target="_blank" href="<?= BASEURL; ?>/files/tugas/<?= $t['file']; ?>"><i class="fa fa-file-download"></i></a></td>
                    <td>
                        <a href="<?= BASEURL; ?>/Tugas/terkumpul/<?= $t['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                        <button onclick="$('#edit_tugas #id').val('<?= $t['id'] ?>');$('#edit_tugas #judul').val('<?= $t['judul'] ?>');$('#edit_tugas #fileold').val('<?= $t['file'] ?>');$('#edit_tugas #deskripsi').val('<?= $t['deskripsi'] ?>');" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_tugas"><i class="fa fa-edit"></i></button>
                        <a onclick="return confirm('Hapus Tugas Ini?')" href="<?= BASEURL; ?>/Tugas/hapus/<?= $t['id']; ?>/<?= $t['file']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal ADD -->
<div class="modal fade" id="edit_tugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">EDIT TUGAS</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="hidden" name="id" id="id">
                            <input class="form-control" type="text" name="judul" id="judul" placeholder="MASUKAN JUDUL TUGAS">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="hidden" name="fileold" id="fileold">
                            <input class="form-control" type="file" name="file" id="file" placeholder="MASUKAN JUDUL TUGAS">
                        </div>
                        <div class="col-12 mt-3">
                            <textarea placeholder="MASUKAN DESKRIPSI TUGAS" class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KEMBALI</button>
                <button name="ubah_tugas" class="btn btn-primary">UBAH</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal UPDATE -->
<div class="modal fade" id="tambah_tugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH TUGAS</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="col-12">
                            <input class="form-control" type="text" name="judul" id="judul" placeholder="MASUKAN JUDUL TUGAS">
                        </div>
                        <div class="col-12 mt-3">
                            <input class="form-control" type="file" name="file" id="file" placeholder="MASUKAN JUDUL TUGAS">
                        </div>
                        <div class="col-12 mt-3">
                            <textarea placeholder="MASUKAN DESKRIPSI TUGAS" class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KEMBALI</button>
                <button name="add_tugas" class="btn btn-primary">KIRIM</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="<?= BASEURL; ?>" class="row position-fixed bottom-0 w-100 bg-danger text-light text-decoration-none" style="height: 50px;">
    <div class="border border-3 action_button col-12 text-center d-flex align-items-center justify-content-center" style="cursor: pointer;">
        KEMBALI
    </div>
</a>