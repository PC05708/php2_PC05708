<?php
class AuthModel extends Model
{

    private $_primaryKey = 'id';
    function tableFill()
    {
        return "users";
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return $this->_primaryKey;
    }
    public function getUserByEmail($data = [])
    {
        if (!empty($data)) {
            $dataGet = $this->db->table("users")->where("email", "=", $data['email'])->get();
        }
        if (!empty($data)) {
            $dataGet = reset($dataGet);
            if ($data['password'] == $dataGet['password']) {
                Session::data('user', $dataGet);
                return true;
            }
        }
        return false;
    }
}
