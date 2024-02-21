<?php

class App
{
    private $__controller, $__action, $__params, $__routes, $__db;
    static public $app;
    public function __construct()
    {
        global $routes, $config;
        self::$app = $this;
        $this->__routes = new Route();
        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = "index";
        $this->__params = [];

        if (class_exists("DB")) {
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }

        $this->handleUrl();
    }
    public function getUrl()
    {
        if (!empty($_SERVER["PATH_INFO"])) {
            $url = $_SERVER["PATH_INFO"];
        } else {
            $url = "/";
        }
        return $url;
    }
    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url);
        $this->checkLogin($url['key']);
        $urlArray = array_filter(explode("/", $url['url']));
        $urlArray = array_values($urlArray);

        // check xem cai $urlArray có chắn chắn là file không
        $checkUrl = '';
        if (!empty($urlArray)) {
            foreach ($urlArray as $key => $value) {
                $checkUrl .= $value . "/";
                $fileCheck = rtrim($checkUrl, "/");
                $fileArray = explode("/", $fileCheck);
                $fileArray[count($fileArray) - 1] = ucfirst($fileArray[count($fileArray) - 1]);
                $fileCheck = implode("/", $fileArray);
                if (!empty($urlArray[$key - 1])) {
                    unset($urlArray[$key - 1]);
                }
                if (file_exists("App/Controllers/" . ($fileCheck) . ".php")) {
                    $checkUrl = $fileCheck;
                    break;
                }
            }
            $urlArray = array_values($urlArray);
        }

        // xử lý controller
        if (!empty($urlArray[0])) {
            $this->__controller = ucfirst($urlArray[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }
        // xu ly khi $checkUrl rong
        if (empty($checkUrl)) {
            $checkUrl = $this->__controller;
        }
        if (file_exists("App/Controllers/" . ($checkUrl) . ".php")) {
            require_once("Controllers/" . ($checkUrl) . ".php");
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArray[0]);
                if (!empty($this->__db)) {
                    $this->__controller->db = $this->__db;
                }
            } else {
                $this->loadErrors();
            }
        } else {
            $this->loadErrors();
        }
        // xử lý action
        if (!empty($urlArray[1])) {
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }

        // xử lý params
        $this->__params = array_values($urlArray);
        // kiểm tra tồn tại của method trong controller
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadErrors();
        }
    }
    public function checkLogin($key)
    {
        if (!empty($key)) {
            if ($key == 'Tai-khoan/login') {
                return 0;
            }
            foreach (_APP['Login'] as $value) {

                if ($value == $key) {

                    if (empty(Session::data('user'))) {
                        $response = new Response();
                        $response->redirect('Tai-khoan/login');
                    }
                }
            }
        }
    }
    public function getCurrentController()
    {
        return $this->__controller;
    }
    public function loadErrors($name = "404", $data = [])
    {
        extract($data);
        require_once "Errors/" . $name . ".php";
    }
}
