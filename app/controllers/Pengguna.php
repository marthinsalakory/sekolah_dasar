<?php

class Pengguna extends Controller
{
    public function __construct()
    {
        Auth::is_login();
        Auth::must_role_guru();
    }

    public function index()
    {
        if (isset($_POST['add_user'])) {
            if (Database::insert('users', [
                'kode' => $_POST['kode'],
                'role' => strtolower($_POST['role']),
                'nama' => strtolower($_POST['nama']),
                'kelas' => strtolower($_POST['kelas']),
                'password' => password_hash($_POST['kode'], PASSWORD_DEFAULT),
            ])) {
                Flasher::setFlash('Berhasil menambahkan data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            } else {
                Flasher::setError('Gagal menambahkan data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            }
        }

        if (isset($_POST['save_user'])) {
            if (Database::update('users', ['kode' => $_POST['kode_lama']], [
                'kode' => $_POST['kode'],
                'role' => strtolower($_POST['role']),
                'nama' => strtolower($_POST['nama']),
                'kelas' => strtolower($_POST['kelas']),
                'password' => password_hash($_POST['kode'], PASSWORD_DEFAULT),
            ])) {
                Flasher::setFlash('Berhasil mengubah data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            } else {
                Flasher::setError('Gagal mengubah data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            }
        }

        if (isset($_POST['delete_user'])) {
            if (Database::delete('users', 'kode', $_POST['kode_lama'])) {
                Flasher::setFlash('Berhasil menghapus data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            } else {
                Flasher::setError('Gagal menghapus data pengguna');
                header("Location:" . BASEURL . '/Pengguna');
                exit;
            }
        }

        $data = [
            'title' => 'Pengguna',
            'users' => Database::FindAll('users')
        ];
        $this->view('templates/header2', $data);
        $this->view('pengguna/index', $data);
        $this->view('templates/footer');
    }
}
