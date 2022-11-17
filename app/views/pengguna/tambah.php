<div class="card mb-5">
    <div class="card-body">
        <h3 class="fw-bold text-center text-decoration-underline text-uppercase">Tambah Pengguna</h3>
        <form class="row" action="" method="POST">
            <div class="mt-3">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="">Pilih Role</option>
                    <option value="Masyarakat">Masyarakat</option>
                    <option value="Administrator">Administrator</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="id">ID</label>
                <input class="form-control" type="text" name="id" id="id" placeholder="Masukan Disini">
            </div>
            <div class="mt-3">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Disini">
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>