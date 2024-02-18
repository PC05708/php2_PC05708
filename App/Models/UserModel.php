<?php
class UserModel extends Model
{
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
        return "id";
    }
    public function getListUsers()
    {
        $data = $this->db->table("users")->select("*")->get();
        return $data;
    }

    // phướng thức update

    public function getDetailUser($condition)
    {
        $data = $this->db->table("users")->where("id", "=", $condition)->select("name, id")->get();
        return $data;
    }

    public function getUser($id)
    {
        $primaryKey = $this->primaryKey();
        $data = $this->db->table("users")->where($primaryKey, '=', $id)->get();
        return $data;
    }
}
