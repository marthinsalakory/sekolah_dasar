<?php foreach ($data['tugas'] as $t) : ?>
    <div class="row p-2 bg-light border mt-2">
        <div class="col-12">
            <h3><?= $t['judul']; ?></h3>
            <div class="row">
                <div class="col-6">
                    <a onclick="return confirm('Download Tugas Ini?')" target="_blank" href="<?= BASEURL; ?>/files/tugas/<?= $t['file']; ?>">download</a>
                </div>
                <div class="col-6">
                    <a onclick="$('#file<?= $t['id'] ?>').click();" href="#">kirim tugas</a>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $t['id']; ?>">
                        <input onchange="$(this).parent('form').submit()" style="display: none;" type="file" name="file" id="file<?= $t['id'] ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>