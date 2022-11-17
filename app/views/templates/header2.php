<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['title']; ?></title>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= BASEURL; ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= BASEURL; ?>/assets/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Import Fontawesome -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/fontawesome/js/all.min.js">

    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/all.css">
</head>

<body>
    <div class="row top_bar row text-light">
        <a href="<?= BASEURL; ?>/Mapel" class="col-7 d-flex align-items-center justify-content-center fw-bold text-decoration-none text-light">
            SD NEGERI TOISAPU
        </a>
        <div class="col-5 d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="mx-2" width="30px" src="<?= BASEURL; ?>/assets/img/user.jpg" alt="">
                GURU KELAS <?= Auth::user()->kelas; ?>
            </div>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/Auth/logout">Keluar</a></li>
            </ul>
        </div>
    </div>
    <div class="mt-5">
        <div class="row">
            <div class="col-12">
                <?= Flasher::flash(); ?>
            </div>
        </div>
    </div>