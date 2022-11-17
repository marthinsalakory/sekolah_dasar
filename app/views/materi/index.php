<div class="row">
    <?php foreach ($data['materi'] as $m) : ?>
        <div class="col-12 text-center d-flex align-items-center">
            <a onclick="return confirm('Download Materi Ini?')" target="_blank" class="mapel-item text-decoration-none d-flex justify-content-center align-items-center w-100 border" style="height: 99px;" href="<?= BASEURL; ?>/files/materi/<?= $m['file']; ?>"><?= $m['judul']; ?></a>
        </div>
    <?php endforeach ?>
</div>