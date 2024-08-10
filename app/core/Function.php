<?php

function url($path = '') {
    return 'http://localhost/siphp/'. $path;
}

function redirect($to = '') {
    header('location: ' . url($to));
    exit;
}
function redirectTo($to) {
    header('location: ' . $to);
    exit;
}

function verify($data, $expected) {
    // Ambil key dan value dari array $expected
    foreach ($expected as $key => $value) {
        // Cek apakah key ada di $data dan nilai sesuai
        if (isset($data[$key]) && $data[$key] === $value) {
            return true; // Jika cocok, kembalikan true
        }
    }
    return false; // Jika tidak cocok, kembalikan false
}

function auth($args = false) {
    if (isset($_SESSION['login'])) {
        $user = Db::read('users', ['email' => $_SESSION['email']]);
        $res = password_verify($_SESSION['password'], $user[0]['password']);
        if ($args) {
            if ($res) {
                redirect(isset($args['redirect']) ? $args['redirect'] : 'dashboard');
            } else {
                Flasher::setFlash('danger', 'Login failed', 'Your are man!');
                unset($_SESSION['login']);
                redirect('users/login');
            }
        }
        return $res;
    } else {
        redirect('users/login');
    }
}