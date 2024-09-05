<?php

class Auth extends Controller{
    public function login()
    {
        $this->model('Login_model')->getLoginUser($_POST);
    }

    public function logout()
    {
        
        $this->model('Transaksi_model')->resetCart();
        $this->model('Login_model')->logout();
    }

    
}