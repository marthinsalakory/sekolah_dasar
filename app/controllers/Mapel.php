<?php

class Mapel extends Controller
{
    public function __construct()
    {
        header("Location: " . BASEURL);
        exit;
    }

    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'nav' => 'mapel'
        ];

        $this->view('templates/header', $data);
        $this->view('mapel/index', $data);
        $this->view('templates/footer');
    }

    public function Kelas()
    {
        // Add
        if (isset($_POST['add'])) {
            if (Database::insert('kelas', [
                'kode' => $_POST['kode'],
                'nama' => $_POST['nama']
            ])) {
            } else {
                Flasher::setFlash('Gagal', 'Menambahkan Kelas', 'danger');
                header("Location:" . BASEURL . '/Mapel/Kelas');
                exit;
            }
        }

        // Update
        if (isset($_POST['update'])) {
            if (Database::insert('kelas', [
                'kode' => $_POST['kode'],
                'nama' => $_POST['nama']
            ])) {
            } else {
                Flasher::setFlash('Gagal', 'Menambahkan Kelas', 'danger');
                header("Location:" . BASEURL . '/Mapel/Kelas');
                exit;
            }
        }

        // Delete
        if (isset($_POST['hapus'])) {
            if (Database::delete('kelas', 'kode', $_POST['kode_old'])) {
                Flasher::setFlash('Berhasil', 'Menghapus Kelas', 'primary');
                header("Location:" . BASEURL . '/Mapel/Kelas');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Menghapus Kelas', 'danger');
                header("Location:" . BASEURL . '/Mapel/Kelas');
                exit;
            }
        }

        $data = [
            'title' => 'Kelas',
            'nav' => 'mapel'
        ];

        $this->view('templates/header2', $data);
        $this->view('mapel/kelas', $data);
        $this->view('templates/footer');
    }
}
