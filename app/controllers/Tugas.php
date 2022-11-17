<?php

class Tugas extends Controller
{
    public function __construct()
    {
        Auth::is_login();
    }

    public function index()
    {
        Auth::must_role_siswa();
        if (!empty($_POST)) {
            $file = $_FILES['file'];
            $ext = explode('.', $file['name']);
            $ext = end($ext);
            $filename = uniqid() . '.' . $ext;

            $id = $_POST['id'];
            $saya = Auth::user()->kode;
            if (empty(Database::query("SELECT * FROM tugas WHERE judul = '$id' && pengirim = '$saya'")->num_rows)) {
                move_uploaded_file($file['tmp_name'], 'files/tugas/' . $filename);
                if (Database::insert('tugas', [
                    'id' => uniqid(),
                    'pengirim' => Auth::user()->kode,
                    'file' => $filename,
                    'judul' => $_POST['id'],
                    'deskripsi' => $_POST['id'],
                    'jenis' => 'siswa'
                ])) {
                    Redirect::to('Tugas')->setFlash('Tugas berhasil dikumpulkan')->exit();
                } else {
                    Redirect::to('Tugas')->setError('Tugas gagal dikumpulkan')->exit();
                }
            } else {
                Redirect::to('Tugas')->setError('Tugas sudah pernah dikumpulkan')->exit();
            }
        }

        $user_id = Auth::user()->kelas;
        $data = [
            'title' => 'Tugas',
            'nav' => 'tugas',
            'tugas' => Database::query("SELECT * FROM `tv_tugas` WHERE `jenis` = 'guru' && `kelas` = '$user_id'")
        ];

        $this->view('templates/header', $data);
        $this->view('tugas/index', $data);
        $this->view('templates/footer');
    }

    public function guru()
    {
        Auth::must_role_guru();

        if (isset($_POST['add_tugas'])) {
            $file = $_FILES['file'];
            $ext = explode('.', $file['name']);
            $ext = end($ext);
            $filename = uniqid() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], 'files/tugas/' . $filename);

            if (Database::insert('tugas', [
                'id' => uniqid(),
                'pengirim' => Auth::user()->kode,
                'file' => $filename,
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'jenis' => 'guru'
            ])) {
                Redirect::to('Tugas/guru')->setFlash('Berhasil menambahkan tugas')->exit();
            } else {
                Redirect::to('Tugas/guru')->setError('Gagal menambahkan tugas')->exit();
            }
        }
        if (isset($_POST['ubah_tugas'])) {
            if (!$_FILES['file']['error']) {
                $file = $_FILES['file'];
                $ext = explode('.', $file['name']);
                $ext = end($ext);
                $filename = uniqid() . '.' . $ext;
                move_uploaded_file($file['tmp_name'], 'files/tugas/' . $filename);
                unlink(BASEURL . '/files/tugas/' . $_POST['fileold']);
            } else {
                $filename = $_POST['fileold'];
            }

            if (Database::update('tugas', ['id' => $_POST['id']], [
                'id' => uniqid(),
                'pengirim' => Auth::user()->kode,
                'file' => $filename,
                'judul' => $_POST['judul'],
                'deskripsi' => $_POST['deskripsi'],
                'jenis' => 'guru'
            ])) {
                Redirect::to('Tugas/guru')->setFlash('Berhasil mengubah tugas')->exit();
            } else {
                Redirect::to('Tugas/guru')->setError('Gagal mengubah tugas')->exit();
            }
        }


        $user_id = Auth::user()->kode;
        $data = [
            'title' => 'Tugas',
            'nav' => 'tugas',
            'tugas' => Database::query("SELECT * FROM `tugas` WHERE `jenis` = 'guru' && `pengirim` = '$user_id'")
        ];

        $this->view('templates/header2', $data);
        $this->view('tugas/guru', $data);
        $this->view('templates/footer');
    }

    public function hapus($id, $file)
    {
        Auth::must_role_guru();
        unlink('files/tugas/' . $file);
        foreach (Database::query("SELECT * FROM tugas WHERE judul = '$id'") as $t) {
            unlink('files/tugas/' . $t['file']);
        }
        Database::delete('tugas', 'judul', $id);
        if (Database::delete('tugas', 'id', $id)) {
            Redirect::to('Tugas/guru')->setFlash('Berhasil menghapus tugas')->exit();
        } else {
            Redirect::to('Tugas/guru')->setError('Gagal menghapus tugas')->exit();
        }
    }

    public function terkumpul($id, $hapus = null, $file = null)
    {
        Auth::must_role_guru();
        if ($hapus) {
            unlink('files/tugas/' . $file);
            if (Database::delete('tugas', 'id', $hapus)) {
                Redirect::to('Tugas/terkumpul/' . $id . '')->setFlash('Berhasil menghapus tugas')->exit();
            } else {
                Redirect::to('Tugas/terkumpul/' . $id . '')->setError('Gagal menghapus tugas')->exit();
            }
        }

        Auth::must_role_guru();

        $data = [
            'title' => 'Tugas',
            'nav' => 'tugas',
            'id' => $id,
            'tugas' => Database::query("SELECT * FROM `tugas` WHERE `judul` = '$id'")
        ];

        $this->view('templates/header2', $data);
        $this->view('tugas/terkumpul', $data);
        $this->view('templates/footer');
    }

    function api_nilai()
    {
        if (isset($_POST['id']) && isset($_POST['nilai'])) {
            $id = $_POST['id'];
            $nilai = $_POST['nilai'];
            echo Database::update('tugas', ['id' => $id], ['nilai' => $nilai]);
        }
        // Database::update('tugas', [''])
    }
}
