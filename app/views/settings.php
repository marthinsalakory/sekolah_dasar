<!-- Deskripsi Desa -->
<div class="card">
    <div class="card-header">
        <h3 class="text-capitalize">Deskripsi Desa</h3>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">NAMA DESA :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="nama_desa" id="nama_desa" value="<?= Core::nama_desa(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">KECAMATAN :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="kecamatan" id="kecamatan" value="<?= Core::kecamatan(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">KABUPATEN :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="kabupaten" id="kabupaten" value="<?= Core::kabupaten(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">PROVINSI :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="provinsi" id="provinsi" value="<?= Core::provinsi(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">NEGARA :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="negara" id="negara" value="<?= Core::negara(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-sm-12 my-1 d-flex align-items-center">
                    <label for="">Link Logo :</label>
                </div>
                <div class="col-lg-10 col-sm-12 my-1 d-flex align-items-center">
                    <input required class="form-control" type="text" name="logo" id="logo" value="<?= Core::logo(); ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" name="deskripsi_desa" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Pengaturan Menu -->
<div class="card mt-5 mb-5">
    <div class="card-header">
        <h3 class="text-capitalize">Menu dan Sub Menu</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12 my-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Menu</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Urutan</th>
                                        <th class="text-center" scope="col">Nama</th>
                                        <th class="text-center" scope="col">Link</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['menu'] as $menu) : ?>
                                        <tr>
                                            <td class="d-none"><input type="hidden" name="id[]" value="<?= $menu['id']; ?>"></td>
                                            <td class="text-center"><input name="urutan[]" required placeholder="Nomor Urut" value="<?= $menu['urutan']; ?>" type="number" class="form-control"></td>
                                            <td class="text-center"><input name="nama[]" required value="<?= $menu['nama'] ?>" type="text" class="form-control"></td>
                                            <td class="text-center"><input name="link[]" required value="<?= $menu['link']; ?>" type="text" class="form-control"></td>
                                            <td class="text-center"><a onclick="return confirm('Hapus?')" href="<?= BASEURL; ?>/Pengaturan/hapus_menu/<?= $menu['id']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus Menu ini"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3" class="text-center"><button type="submit" name="edit_menu" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Simpan Perubahan"><i class="fa fa-save"></i> Simpan</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <form method="POST" class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><input name="urutan" required placeholder="Nomor Urut" type="number" class="form-control"></td>
                                        <td class="text-center"><input name="nama" required placeholder="Nama Menu" type="text" class="form-control"></td>
                                        <td class="text-center"><input name="link" required placeholder="Link Menu" type="text" class="form-control"></td>
                                        <td class="text-center"><button name="add_menu" type="submit" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah Menu"><i class="fa fa-plus"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 my-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Sub Menu</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Urutan</th>
                                        <th class="text-center" scope="col">Nama Menu</th>
                                        <th class="text-center" scope="col">Nama Sub Menu</th>
                                        <th class="text-center" scope="col">Link</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['submenu'] as $submenu) : ?>
                                        <tr>
                                            <td class="d-none"><input name="id[]" required value="<?= $submenu['id']; ?>" type="hidden" class="form-control"></td>
                                            <td class="text-center"><input name="urutan[]" required value="<?= $submenu['urutan']; ?>" type="number" class="form-control"></td>
                                            <td>
                                                <select class="form-control" name="menu_id[]" id="menu_id">
                                                    <?php foreach ($data['menu'] as $menu) : ?>
                                                        <option <?= $menu['id'] == $submenu['menu_id'] ? 'selected' : ''; ?> value="<?= $menu['id']; ?>"><?= $menu['nama']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td class="text-center"><input name="nama[]" required value="<?= $submenu['nama']; ?>" type="text" class="form-control"></td>
                                            <td class="text-center"><input name="link[]" required value="<?= $submenu['link']; ?>" type="text" class="form-control"></td>
                                            <td class="text-center"><a href="<?= BASEURL; ?>/Pengaturan/hapus_submenu/<?= $submenu['id']; ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus Sub Menu ini"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4" class="text-center"><button type="submit" name="edit_submenu" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Simpan Perubahan"><i class="fa fa-save"></i> Simpan</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <form class="table-responsive" method="POST">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><input name="urutan" required placeholder="Nomor Urut" type="number" class="form-control"></td>
                                        <td>
                                            <select name="menu_id" class="form-control">
                                                <option value="">Pilih Menu</option>
                                                <?php foreach ($data['menu'] as $menu) : ?>
                                                    <option value="<?= $menu['id']; ?>"><?= $menu['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="text-center"><input name="nama" required placeholder="Nama Sub Menu" type="text" class="form-control"></td>
                                        <td class="text-center"><input name="link" required placeholder="Link Sub Menu" type="text" class="form-control"></td>
                                        <td class="text-center"><button type="submit" name="add_submenu" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah Sub Menu"><i class="fa fa-plus"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>