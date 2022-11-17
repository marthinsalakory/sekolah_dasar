<div class="text-center" style="color: #E52525;">
    <div class="w-100">
        <img class="mt-1" width="200" height="200" src="<?= BASEURL; ?>/assets/img/sd.jpg" alt="logo sd">
    </div>
    <span class="text-center fw-bold display-3 d-block">SD NEGERI TOISAPU</span>
    <?php if ($data['error']) : ?>
        <span class="fw-bold mt-2 text-light d-inline-block p-2" style="background-color: #E52525;border-radius: 10px;width: 200px;">GAGAL LOGIN</span>
    <?php endif; ?>
    <form method="POST">
        <div class="col-12 mt-2">
            <input class="form-control" type="text" placeholder="Username" name="kode">
        </div>
        <div class="col-12 mt-2">
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
        <button name="login" class="btn mt-2 w-100 text-light" style="background-color: #E52525;">LOGIN</button>
    </form>
</div>