<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        Auth::is_login();
        Auth::must_role_guru();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->view('templates/header2', $data);
        $this->view('index', $data);
        $this->view('templates/footer');
    }
}
