<div class="table-responsive mt-4">
    <table class="table table-bordered border-danger">
        <thead class="bg-danger text-light">
            <tr class="text-center">
                <th scope="col">Pengirim</th>
                <th scope="col">Judul Tugas</th>
                <th scope="col">Kode Tugas</th>
                <th class="text-center" scope="col">Nilai Tugas</th>
            </tr>
        </thead>
        <tbody>
            <?php $nilai = 0; ?>
            <?php $i = 1; ?>
            <?php foreach ($data['nilai'] as $n) : ?>
                <tr class="text-center">
                    <?php $tugas_id = $n['judul'] ?>
                    <?php $user_id = Database::query("SELECT * FROM tugas WHERE id = '$tugas_id'")->fetch_object()->pengirim; ?>
                    <td><?= Database::query("SELECT * FROM users WHERE kode = '$user_id'")->fetch_object()->nama; ?></td>
                    <td><?= Database::query("SELECT * FROM tugas WHERE id = '$tugas_id'")->fetch_object()->judul; ?></td>
                    <td><?= $n['judul']; ?></td>
                    <?php $nilai = $nilai + $n['nilai']; ?>
                    <?php $jumlah = $i++ ?>
                    <td><?= $n['nilai']; ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td class="text-end" colspan="3">NILAI RATA-RATA : </td>
                <td class="text-center">
                    <?php if (isset($jumlah)) : ?>
                        <?php $rata = $nilai / $jumlah; ?>
                        <?= (int)$rata; ?>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>