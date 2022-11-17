<?php

class Auth extends Controller
{
    public function index()
    {
        Auth::belum_login();
        $error = false;
        if (isset($_POST['login'])) {
            $kode = $_POST['kode'];
            $password = $_POST['password'];
            $result = Database::query("SELECT * FROM `users` WHERE `kode` = '$kode'");
            if (mysqli_num_rows($result)) {
                $row = mysqli_fetch_object($result);
                if (password_verify($password, $row->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $row;
                    if ($row->role == 'guru') {
                        header("Location: " . BASEURL . '/Dashboard');
                        exit;
                    } else {
                        header("Location: " . BASEURL . '/Materi');
                        exit;
                    }
                }
            }
            $error = true;
        }

        $data = [
            'judul' => 'Login',
            'error' => $error
        ];

        $this->view('templates/header_auth', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['user']);
        unset($_SESSION);
        session_destroy();
        header('Location:' . BASEURL . '/Auth');
        exit;
    }

    public static function belum_login()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['user'])) {
            header("Location:" . BASEURL . '/Dashboard');
            exit;
        }
    }

    public static function is_login()
    {
        if (!isset($_SESSION['login']) || !isset($_SESSION['user'])) {
            header("Location:" . BASEURL . '/Auth/Logout');
            exit;
        }
    }

    public static function signed_in()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function user()
    {
        Auth::is_login();
        $user_id = $_SESSION['user']->kode;
        return Database::query("SELECT * FROM `users` WHERE `kode` = '$user_id'")->fetch_object();
    }

    public static function must_role_guru()
    {
        Auth::is_login();
        if (Auth::user()->role != 'guru') {
            header("Location:" . BASEURL . '/Materi');
            exit;
        }
    }

    public static function must_role_siswa()
    {
        Auth::is_login();
        if (Auth::user()->role != 'siswa') {
            header("Location:" . BASEURL . '/Dashboard');
            exit;
        }
    }
}
