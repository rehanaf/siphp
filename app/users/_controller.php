<?php 

class Users extends Controller {
    public function login()
    {
        $this->view('users/login');
    }
    public function register()
    {
        $this->view('users/register');
    }
}