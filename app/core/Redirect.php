<?php

class Redirect
{
    public static function to($url)
    {
        header('Location: ' . BASEURL . '/' . $url, true, 301);
        return new Redirect;
    }

    public static function http($url)
    {
        header('Location: http://' . $url, true, 301);
        return new Redirect;
    }

    public static function https($url)
    {
        header('Location: https://' . $url, true, 301);
        return new Redirect;
    }

    public static function setFlash($message, $action = 'success')
    {
        Flasher::setFlash($message, $action);
        return new Redirect;
    }

    public static function setError($message, $action = 'error')
    {
        Flasher::setFlash($message, $action);
        return new Redirect;
    }

    public static function exit()
    {
        return exit;
    }
}
