<?php

class App
{
    protected $controller = 'home';
    protected $controller_name = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (file_exists('app/' . $url[0] . '/_controller.php')) {
            $this->controller_name = $url[0];
            unset($url[0]);
        } else {
            require_once 'app/home/404.php';
            die();
        }
        
        require_once 'app/' . $this->controller_name . '/_controller.php';
        $this->controller = new $this->controller_name;
        
        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else if (method_exists($this->controller, $this->controller_name)) {
                $this->method = $this->controller_name;
                $this->params = array_values($url);
                unset($url[1]);
            } else {
                require_once 'app/home/404.php';
                unset($url[1]);
                die();
            }
        }
        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return ['home'];
        }
    }
}
