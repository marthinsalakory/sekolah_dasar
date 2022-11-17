<div class="row ">
    <div class="col-12">
        <h3 onclick="mylocationstart()">Data Pengguna</h3>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered border-danger">
                <thead class="bg-danger text-light">
                    <tr>
                        <th class="text-center" scope="col">NAMA</th>
                        <th class="text-center" scope="col">NIS / NIP</th>
                        <th class="text-center" scope="col">KELAS</th>
                        <th class="text-center" scope="col">ROLE</th>
                        <th class="text-center" scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <form method="POST">
                                <input required type="text" class="form-control" style="min-width: 140px;" name="nama" placeholder="Masukan Nama">
                        </td>
                        <td class="text-center"><input required type="text" class="form-control" style="min-width: 160px;" name="kode" placeholder="Masukan NIS / NIP"></td>
                        <td class="text-center">
                            <select required class="form-select" style="min-width: 140px;" name="kelas" id="kelas">
                                <option value="">Pilih Kelas</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select required class="form-select" style="min-width: 100px;" name="role" id="role">
                                <option value="SISWA">SISWA</option>
                                <option value="GURU">GURU</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <button name="add_user" class="btn btn-primary btn-sm mx-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah Pengguna Baru"><i class="fa fa-add"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php foreach ($data['users'] as $u) : ?>
                        <tr>
                            <td class="text-center">
                                <form method="POST">
                                    <input value="<?= $u['nama']; ?>" required type="text" class="form-control" style="min-width: 140px;" name="nama" placeholder="Masukan Nama">
                            </td>
                            <td class="text-center">
                                <input value="<?= $u['kode']; ?>" required type="hidden" class="form-control" style="min-width: 160px;" name="kode_lama" placeholder="Masukan NIS / NIP">
                                <input value="<?= $u['kode']; ?>" required type="text" class="form-control" style="min-width: 160px;" name="kode" placeholder="Masukan NIS / NIP">
                            </td>
                            <td class="text-center">
                                <select required class="form-select" style="min-width: 140px;" name="kelas" id="kelas">
                                    <option value="">Pilih Kelas</option>
                                    <option <?= $u['kelas'] == '5' ? 'selected' : ''; ?> value="5">5</option>
                                    <option <?= $u['kelas'] == '6' ? 'selected' : ''; ?> value="6">6</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <select required class="form-select" style="min-width: 100px;" name="role">
                                    <option <?= $u['role'] == 'siswa' ? 'selected' : ''; ?> value="SISWA">SISWA</option>
                                    <option <?= $u['role'] == 'guru' ? 'selected' : ''; ?> value="GURU">GURU</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button name="save_user" class="btn btn-primary btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Simpan Perubahan"><i class="fa fa-save"></i></button>
                                <button name="delete_user" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')" class="btn btn-danger btn-sm m-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus Pengguna ini"><i class="fa fa-trash"></i></button>
                                </form>
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