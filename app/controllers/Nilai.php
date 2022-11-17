<?php

class Nilai extends Controller
{

    public function index()
    {
        $user = Auth::user();
        Auth::must_role_siswa();
        $data = [
            'title' => 'Nilai',
            'nav' => 'nilai',
            'nilai' => Database::query("SELECT * FROM tugas WHERE jenis = 'siswa' && pengirim = '$user->kode'")
        ];

        $this->view('templates/header', $data);
        $this->view('nilai/index', $data);
        $this->view('templates/footer');
    }
}
