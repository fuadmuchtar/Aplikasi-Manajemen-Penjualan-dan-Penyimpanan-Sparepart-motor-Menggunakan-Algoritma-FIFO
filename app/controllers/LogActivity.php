<?php

class LogActivity extends Controller{
    public function index()
    {
        $data['judul'] = 'Aktifitas Login';
        $data['page'] = 'logActivity';
        $this->view('templates/header', $data);
        $this->view('log_act/index');
        $this->view('templates/footer');
    }
}