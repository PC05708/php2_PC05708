<?php
class User extends Controller
{
    public $users, $data;
    public function __construct()
    {
        $this->users = $this->model('UserModel');
    }
    public function index()
    {
        $this->data = $this->users->getListUsers();
        showModules('User/list', $this->data);
    }
    public function add()
    {
        $request = new Request();
        $this->post_user();
        showModules("User/add", $this->data);
        $dataAdd = $request->getFields();
        showArr($dataAdd);
        if (!empty($dataAdd)) {
            array_splice($dataAdd, 3, 1);
        }
        if (empty($this->data)) {
            $this->users->db->insert("users", $dataAdd);
        }
    }
    public function edit()
    {
        if (!empty($_GET['id'])) {
            $_SESSION['idUserEdit'] = $_GET['id'];
        }
        $request = new Request();
        $data = $request->getFields();
        $this->post_user();
        echo $_SESSION['idUserEdit'];
        showModules("User/edit", $this->data);
        $conditional = " id = " . $_SESSION['idUserEdit'];
        echo $conditional;
        if (!empty($data)) {
            array_splice($data, 3, 1);
        }
        if (empty($this->data)) {
            $this->users->db->update('users', $data, $conditional);
        }
    }
    public function delete()
    {
        if (!empty($_GET['id'])) {
            $_SESSION['idUserDelete'] = $_GET['id'];
        }
        echo $_SESSION['idUserDelete'];
        if (isset($_SESSION['idUserDelete'])) {
            echo "vào được đây rồi!";
            $this->users->db->query("DELETE FROM `users` WHERE `users`.`id` = " . $_SESSION['idUserDelete']);
        }
        $response = new Response();
        $response->redirect('User/index');
    }
    public function get_user()
    {
        $this->data['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
    }
    public function post_user()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'name' => 'required|min:5|max:30',
                'email' => 'required|email|min:6|unique:users:email',
                'password' => 'required|min:3',
                'confirm-pass' => 'required|match:password'
            ],);

            $request->messages([
                'name.required' => 'Họ tên không được để trống!',
                'name.min' => 'Họ tên phải có độ dài lớn hơn 5!',
                'name.max' => 'Họ tên chỉ được phép chứa tối đa 30 ký tự!',
                'email.required' => 'Email không được để trống!',
                'email.unique' => 'Email đã tồn tại trong hệ thống!',
                'email.min' => "Email phải chứa nhiều hơn 6 ký tự!",
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống!',
                'password.min' => 'Độ dài mật khẩu phải lớn hơn 3!',
                'confirm-pass.required' => 'Xác nhận lại mật khẩu không được để trống!',
                'confirm-pass.match' => 'Mật khẩu chưa khớp!'
            ]);

            $validate = $request->validate();
            if (!$validate) {
                Session::flash('errors', $request->errors());
                Session::flash('msg', "Đã có lỗi, vui lòng nhập dữ liệu đúng yêu cầu!");
                Session::flash('old', $request->getFields());

                $this->data['errors'] = Session::flash('errors');
                $this->data['msg'] = Session::flash('msg');
                $this->data['old'] = Session::flash('old');
            }
        }
    }
    public function check_age($age)
    {
        if ($age >= 20) {
            return true;
        }
        return false;
    }
}
