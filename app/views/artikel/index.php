<div class="card mb-5">
    <div class="card-body">
        <h3 class="fw-bold">ARTIKEL</h3>
        <hr>
        <div class="table-responsive">
            <table class="w-100 mt-3" style="color: #666666; font-size: 11px;">
                <thead>
                    <tr>
                        <th scope="col">JUDUL</th>
                        <th scope="col">PENULIS</th>
                        <th scope="col">DATE</th>
                        <th scope="col w-100">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (Database::FindAll('artikel') as $artikel) : ?>
                        <tr>
                            <td class="clr-4 w-50"><a class="clr-4 text-decoration-none" href="<?= BASEURL; ?>/Artikel/detail/<?= $artikel['id']; ?>"><?= $artikel['judul']; ?></a></td>
                            <td>Administrator</td>
                            <td><?= Helpers::tanggal(); ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/Artikel/edit/<?= $artikel['id']; ?>" class="btn btn-warning btn-sm my-1"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Hapus?')" href="<?= BASEURL; ?>/Artikel/hapus/<?= $artikel['id']; ?>" class="btn btn-danger btn-sm my-1"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>