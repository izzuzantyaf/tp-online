<?php

class App
{
    // default controller
    protected $controller = 'Praktikan';
    // default method
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // catch controller, method, and params from URL
        $url = $this->parseURL();

        // jika belum ada user yang login tidak boleh masuk ke beranda
        if (empty($_SESSION["user_logged"])) {
            if ($url[0] === "asisten" || $url[0] === "admin") {
                # code...
            } else {
                $url[0] = $this->controller;
            }
            $url[1] = "login";
        }
        // jika sudah ada user yang login tidak boleh masuk halaman login
        else {
            if (isset($url[0])) {
                if ((($url[0] === "praktikan" || $url[0] === "asisten" || $url[0] === "admin"))) {
                    $url[0] = $_SESSION["user_logged"]->role;
                    if (isset($url[1])) {
                        if ($url[1] === "login") {
                            $url[1] = $this->method;
                        }
                    }
                } else {
                    $url[0] = $_SESSION["user_logged"]->role;
                }
            } else {
                $url[0] = $_SESSION["user_logged"]->role;
            }
        }

        // if controller exists
        if (file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            // if method exists
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // function for retrieving controller, method, and params from URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // remove the slash in the end of the URL
            $url = rtrim($_GET['url'], '/');
            // sanitize URL from undesired characters
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // explode URL based on slash char
            $url = explode('/', $url);

            // this return is array
            return $url;
        }
    }
}
