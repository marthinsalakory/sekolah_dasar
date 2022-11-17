<!-- <h3 class="text-center fw-bold mt-3">ARTIKEL TERKINI</h3> -->
<hr>
<div class="card card-body">
    <div class="row">
        <div class="col-6">
            <p class="text-capitalize mt-2 text-secondary"><i class="fa-regular fa-clock"></i> 09 agustus 2022 &nbsp;&nbsp;<i class="fa fa-user"></i> administrator &nbsp;&nbsp;<i class="fa-regular fa-eye"></i> 127 kali &nbsp;&nbsp;<i class="fa-solid fa-comments"></i> 0</p>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?= BASEURL; ?>/Artikel" class="btn btn-sm mx-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kembali"><i class="fa fa-backward"></i></a>
            <a onclick="navigator.clipboard.writeText(window.location.href); alert('Link berhasil di copy');" class="btn btn-sm mx-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy Link"><i class="fa-solid fa-copy"></i></a>
            <a href="<?= BASEURL; ?>/Artikel/edit/<?= $data['artikel']->id; ?>" class="btn btn-sm mx-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fa fa-edit"></i></a>
            <a onclick="return confirm('Hapus?')" href="<?= BASEURL; ?>/Artikel/hapus/<?= $data['artikel']->id; ?>" class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    <hr>
    <h3 class="mb-3 text-center fw-bold text-decoration-underline text-uppercase"><?= $data['artikel']->judul; ?></h3>
    <?= $data['artikel']->isi; ?>
    <hr>
</div>
<div class="card mt-5 mb-5">
    <div class="card-body" style="background-color: #EEEDEA;">
        <div style="width: max-content;color: #333333; font-size: 18px; background-color: #529BF5; border: 7px solid #ffffff;margin: -30px 0 0 -30px;">
            <h3 class="fw-bold" style="padding: 5px;">Komentar</h3>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-2">
                    <label for="nama">Nama</label>
                </div>
                <div class="col-10">
                    <input type="text" name="nama" id="nama" placeholder="Ketik di sini" class="form-control border-dark">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label for="no_hp">No. Hp</label>
                </div>
                <div class="col-10">
                    <input type="number" name="no_hp" id="no_hp" placeholder="Ketik di sini" class="form-control border-dark">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-10">
                    <input type="email" name="email" id="email" placeholder="Ketik di sini" class="form-control border-dark">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label for="pesan">Isi Pesan</label>
                </div>
                <div class="col-10">
                    <textarea class="form-control border-dark" name="pesan" id="pesan" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button class="btn btn-secondary float-end btn-lg">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>