<?php 

class Home extends Controller {
    public function index()
    {
        $data = Db::read('users');
        $this->views('home/index', $data);
    }
}