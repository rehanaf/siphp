<?php 

class Dashboard extends Controller {
    public function index()
    {
        if (!auth()) {
            redirect('users/login');
        }
        $data['title'] = 'Hii, '. $_SESSION['name'];
        $data['page'] = 'dashboard';
        $data['login'] = true;
        $this->views('dashboard/index', $data);
    }
}