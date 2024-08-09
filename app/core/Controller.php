<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once 'app/' . $view . '.php';
    }

    public function views($view, $data = [])
    {
        require_once 'app/templates/header.php';
        require_once 'app/' . $view . '.php';
        require_once 'app/templates/footer.php';
    }
}
