<div class="row">
    <div class="col-12">
        <h3>Data Kelas</h3>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered border-danger">
                <thead class="bg-danger text-light">
                    <tr>
                        <th class="text-center" scope="col">NAMA KELAS</th>
                        <th class="text-center" scope="col">KODE KELAS</th>
                        <th class="text-center" scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <form method="POST">
                                <input required type="text" class="form-control text-uppercase text-center" style="min-width: 200px;" name="nama" placeholder="Masukan Nama Kelas">
                        </td>
                        <td class="text-center"><input required type="text" class="form-control text-uppercase text-center" style="min-width: 200px;" name="kode" placeholder="Masukan Kode Kelas"></td>
                        <td class="text-center">
                            <button name="add" class="btn btn-primary btn-sm mx-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah Pengguna Baru"><i class="fa fa-add"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php foreach (Database::FindAll('kelas') as $kelas) : ?>
                        <tr>
                            <td class="text-center">
                                <form method="POST">
                                    <input value="<?= $kelas['nama']; ?>" required type="text" class="form-control text-uppercase text-center" style="min-width: 200px;" name="nama" placeholder="Masukan Nama Kelas">
                            </td>
                            <td class="text-center">
                                <input value="<?= $kelas['kode']; ?>" type="hidden" class="form-control text-uppercase text-center" style="min-width: 160px;" name="kode_old" placeholder="Masukan Kode Kelas">
                                <input value="<?= $kelas['kode']; ?>" required type="text" class="form-control text-uppercase text-center" style="min-width: 160px;" name="kode" placeholder="Masukan Kode Kelas">
                            </td>
                            <td class="text-center d-flex justify-content-evenly">
                                <button name="edit" class="btn btn-primary btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Simpan Perubahan"><i class="fa fa-save"></i></button>
                                <button name="hapus" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')" class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus Kelas ini"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="" class="btn btn-success btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Kelas"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<a href="<?= BASEURL; ?>" class="row position-fixed bottom-0 w-100 bg-danger text-light text-decoration-none" style="height: 50px;">
    <div class="border border-3 action_button col-12 text-center d-flex align-items-center justify-content-center" style="cursor: pointer;">
        KEMBALI
    </div>
</a>