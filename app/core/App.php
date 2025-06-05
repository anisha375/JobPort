<?php

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {

        $url = $this->parseUrl();

                if (!empty($url[0])) {
            $base = ucfirst($url[0]);

                        $this->controller = str_ends_with($base, 'Controller') ? $base : $base . 'Controller';

            $controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';

            if (file_exists($controllerPath)) {
                require_once $controllerPath;
                unset($url[0]);
            } else {
                require_once __DIR__ . '/../controllers/ErrorController.php';
                $this->controller = 'ErrorController';
                $url = [];
            }
        } else {
            require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        }

                $this->controller = new $this->controller;

                if (!empty($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

                $this->params = $url ? array_values($url) : [];

                call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
