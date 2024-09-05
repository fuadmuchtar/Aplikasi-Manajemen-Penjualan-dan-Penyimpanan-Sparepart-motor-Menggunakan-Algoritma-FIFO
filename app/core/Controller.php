<?php

class Controller
{
    public function view($view, $data = [])
    {
        if (isset($_SESSION['logged'])) {
            if ($_SESSION['level'] == 'admin') {
                require_once '../app/views/admin/' . $view . '.php';
            } else {
                require_once '../app/views/kasir/' . $view . '.php';
            };
        } else {
            require_once '../app/views/login/index.php';
        }
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
