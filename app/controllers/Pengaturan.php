<?php

class Pengaturan extends Controller
{
    public function __construct()
    {
        Auth::is_login();
    }

    public function index()
    {
        // Untuk mengubah deskripsi Desa
        if (isset($_POST['deskripsi_desa'])) {
            Database::update('aplikasi', ['id' => 1], [
                'nama' => $_POST['nama_desa'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'provinsi' => $_POST['provinsi'],
                'negara' => $_POST['negara'],
                'logo' => $_POST['logo']
            ]);

            Flasher::setFlash('Berhasil', 'Mengubah Deskripsi Desa', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }

        // Untuk menambahkan menu
        if (isset($_POST['add_menu'])) {
            Database::insert('menu', [
                'urutan' => $_POST['urutan'],
                'nama' => $_POST['nama'],
                'link' => $_POST['link']
            ]);

            Flasher::setFlash('Berhasil', 'Menambahkan Menu Baru', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }

        // Untuk mengubah menu
        if (isset($_POST['edit_menu'])) {
            for ($i = 0; $i < count($_POST['id']); $i++) {
                Database::update('menu', ['id' => $_POST['id'][$i]], [
                    'urutan' => $_POST['urutan'][$i],
                    'nama' => $_POST['nama'][$i],
                    'link' => $_POST['link'][$i]
                ]);
            }

            Flasher::setFlash('Berhasil', 'Mengubah Menu', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }


        // Untuk menambahkan add submenu
        if (isset($_POST['add_submenu'])) {
            Database::insert('submenu', [
                'menu_id' => $_POST['menu_id'],
                'urutan' => $_POST['urutan'],
                'nama' => $_POST['nama'],
                'link' => $_POST['link']
            ]);

            Flasher::setFlash('Berhasil', 'Menambahkan Sub Menu Baru', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }

        // Untuk mengubah submenu
        if (isset($_POST['edit_submenu'])) {
            for ($i = 0; $i < count($_POST['id']); $i++) {
                Database::update('submenu', ['id' => $_POST['id'][$i]], [
                    'menu_id' => $_POST['menu_id'][$i],
                    'urutan' => $_POST['urutan'][$i],
                    'nama' => $_POST['nama'][$i],
                    'link' => $_POST['link'][$i]
                ]);
            }

            Flasher::setFlash('Berhasil', 'Mengubah Sub Menu', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }

        $data = [
            'judul' => 'Pengaturan',
            'menu' => Database::query("SELECT * FROM `menu` ORDER BY `urutan` ASC"),
            'submenu' => Database::query("SELECT * FROM `submenu` ORDER BY `menu_id`, `urutan` ASC")
        ];
        $this->view('templates/header1', $data);
        $this->view('settings', $data);
        $this->view('templates/footer');
    }

    public function hapus_menu($id = null)
    {
        // Untuk Hapus Menu
        if (!empty($id)) {
            Database::delete('menu', 'id', $id);
            Database::delete('submenu', 'menu_id', $id);
            Flasher::setFlash('Berhasil', 'Menghapus Menu', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Menghapus Menu', 'danger');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }
    }

    public function hapus_submenu($id = null)
    {
        // Untuk Menghapus Sub Menu
        if (!empty($id)) {
            Database::delete('submenu', 'id', $id);
            Flasher::setFlash('Berhasil', 'Menghapus Sub Menu', 'primary');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Menghapus Sub Menu', 'danger');
            header("Location:" . BASEURL . '/Pengaturan');
            exit;
        }
    }
}
