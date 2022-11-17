<div class="w-100 mt-5 text-center">
    <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#tambah_materi"><i class="fa fa-add"></i> Tambah Materi</button>
</div>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">KODE MATERI</th>
                <th scope="col">PENGIRIM</th>
                <th scope="col">JUDUL</th>
                <th scope="col">FILE</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['materi'] as $m) : ?>
                <tr class="text-center">
                    <th><?= $m['id'] ?></th>
                    <td><?php $pengirim = $m['pengirim']; ?><?= strtoupper(Database::query("SELECT * FROM users WHERE kode = '$pengirim'")->fetch_object()->nama); ?></td>
                    <td><?= $m['judul']; ?></td>
                    <td><a onclick="return confirm('Download Materi Ini?')" target="_blank" href="<?= BASEURL; ?>/files/materi/<?= $m['file']; ?>"><i class="fa fa-file-download"></i></a></td>
                    <td>
                        <a onclick="return confirm('Hapus Materi Ini?')" href="<?= BASEURL; ?>/Materi/hapus/<?= $m['id']; ?>/<?= $m['file']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Modal ADD -->
<div class="modal fade" id="tambah_materi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">TAMBAH MATERI</h1>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KEMBALI</button>
                <button name="add_materi" class="btn btn-primary">KIRIM</button>
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