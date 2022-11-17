<div class="card mb-5">
    <form class="card-body" method="POST" enctype="multipart/form-data">
        <h3 class="mb-4 text-center text-decoration-underline fw-bold text-uppercase">Tulis Artikel</h3>
        <div class="row mt-3">
            <div class="col-lg-1 col-sm-12">
                <label for="judul" class="form-label fw-bold">JUDUL :</label>
            </div>
            <div class="col-lg-11 col-sm-12">
                <input required placeholder="Masukan Judul Artikel" value="<?= Flasher::oldValue('judul'); ?>" name="judul" id="judul" type="text" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <textarea required class="form-control" name="isi" id="editor" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" name="add_artikel" class="btn btn-primary w-100"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </form>
</div>