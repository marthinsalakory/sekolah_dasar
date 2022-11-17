<?php

class Flasher
{
    public static function setFlash($message, $action = 'success')
    {
        $_SESSION['flash'][$action][] = [
            'message' => $message,
            'action'  => $action
        ];
    }

    public static function setError($message)
    {
        $_SESSION['flash']['error'][] = [
            'message' => $message,
            'action'  => 'error'
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            if (isset($_SESSION['flash']['success'])) {
                $pesan = '';
                foreach ($_SESSION['flash']['success'] as $err) {
                    $pesan = $pesan . '<li>' . $err['message'] . '</li>';
                }
                echo '
                <div class="text-uppercase alert alert-primary alert-dismissible fade show mt-3" role="alert">
                <strong class="text-uppercase">SUCCESS!</strong>
                <ul class="text-uppercase">
                    ' . $pesan . '
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            if (isset($_SESSION['flash']['error'])) {
                $pesan = '';
                foreach ($_SESSION['flash']['error'] as $err) {
                    $pesan = $pesan . '<li>' . $err['message'] . '</li>';
                }
                echo '
                <div class="text-uppercase alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong class="text-uppercase">FAILED!</strong>
                <ul class="text-uppercase">
                    ' . $pesan . '
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            unset($_SESSION['flash']);
        }
    }

    public static function oldValue($key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
    }
}
