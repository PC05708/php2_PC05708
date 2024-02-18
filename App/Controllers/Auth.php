<?php
class Auth extends Controller
{
    public $data = [], $model = [];
    public function __construct()
    {
    }
    public function login()
    {
        $this->render("Auth/login");
    }
    public function register()
    {
        $this->render("Auth/register");
    }
}
