<?php

class Users extends Controller
{
    public function index()
    {
        if (!auth()) {
            redirect('users/login');
        }
        $data['users'] = Db::read('users');
        $this->views('users/index', $data);
    }
    public function login()
    {
        $this->view('users/login');
    }
    public function register()
    {
        $this->view('users/register');
    }

    public function onlogin()
    {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        Flasher::setFlash('success', 'Login success', 'You are loggedin!');
        auth(true);
    }

    public function onregister()
    {
        if (isset($_POST['name'])) {
            Db::create('users', [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ]);
        }
        redirect('users/login');
    }

    public function logout()
    {
        session_unset(); // Menghapus semua variabel sesi
        session_destroy(); // Menghancurkan sesi
        redirect('users/login');        
    }
}
