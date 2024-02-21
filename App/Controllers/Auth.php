<?php
class Auth extends Controller
{
    public $data = [], $model;
    public function __construct()
    {
        $this->model = $this->model('AuthModel');
    }
    public function login()
    {
        $request = new Request();
        $dataLogin = $request->getFields();
        $this->render("Auth/login");
        $dataGet = $this->model->getUserByEmail($dataLogin);
        if ($dataGet) {
            $response = new Response();
            $response->redirect('home/index');
        }
    }
    public function register()
    {
        $this->render("Auth/register");
    }
}
