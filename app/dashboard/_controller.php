<?php 

class Dashboard extends Controller {
    public function __construct() {
        if (!auth()) {
            redirect('users/login');
        }
    }
    public function index()
    {
        $data = Db::read('users');
        $data['login'] = true;
        $this->views('dashboard/index', $data);
    }
}