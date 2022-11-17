<?php

class Materi extends Controller
{
    public function __construct()
    {
        Auth::is_login();
    }

    public function index()
    {
        Auth::must_role_siswa();
        $user_id = Auth::user()->kelas;
        $data = [
            'title' => 'Mata Pelajaran',
            'nav' => 'mapel',
            'materi' => Database::query("SELECT * FROM `tv_materi` WHERE `kelas` = '$user_id'")
        ];

        $this->view('templates/header', $data);
        $this->view('materi/index', $data);
        $this->view('templates/footer');
    }

    public function guru()
    {
        Auth::must_role_guru();
        if (isset($_POST['add_materi'])) {
            $file = $_FILES['file'];
            $ext = explode('.', $file['name']);
            $ext = end($ext);
            $filename = uniqid() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], 'files/materi/' . $filename);

            if (Database::insert('materi', [
                'id' => uniqid(),
                'pengirim' => Auth::user()->kode,
                'file' => $filename,
                'judul' => $_POST['judul']
            ])) {
                Redirect::to('Materi/guru')->setFlash('Berhasil menambahkan materi')->exit();
            } else {
                Redirect::to('Materi/guru')->setError('Gagal menambahkan materi')->exit();
            }
        }

        $user_id = Auth::user()->kode;
        $data = [
            'title' => 'Mata Pelajaran',
            'nav' => 'mapel',
            'materi' => Database::query("SELECT * FROM `materi` WHERE `pengirim` = '$user_id'")
        ];

        $this->view('templates/header2', $data);
        $this->view('materi/guru', $data);
        $this->view('templates/footer');
    }

    public function hapus($id, $file)
    {
        Auth::must_role_guru();
        if (Database::delete('materi', 'id', $id)) {
            unlink('files/materi/' . $file);
            Redirect::to('Materi/guru')->setFlash('Berhasil menghapus materi')->exit();
        } else {
            Redirect::to('Materi/guru')->setError('Gagal menghapus materi')->exit();
        }
    }
}
